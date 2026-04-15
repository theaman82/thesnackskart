<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductVariant;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Notifications\Notification;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;
use Filament\Tables\Actions\ActionGroup;

class ProductList extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable; 

    public function table(Table $table): Table
    {
        return $table
            ->query(Product::with('variants', 'category', 'images'))
            ->columns([

                ImageColumn::make('primary_image')
                    ->label('Image')
                    ->getStateUsing(function ($record) {

                        // 1. Variant image (priority)
                        $variant = $record->variants->first();
                        if ($variant && $variant->image) {
                            return asset('storage/' . $variant->image);
                        }

                        // 2. Product primary image
                        $image = optional(
                            $record->images->where('is_primary', true)->first()
                        )->image_url;

                        if ($image) {
                            return asset('storage/' . $image);
                        }

                        return null;
                    })
                    ->circular()
                    ->defaultImageUrl(
                        fn($record) =>
                        'https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=' . urlencode($record->title)
                    ),

                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('title')
                    ->label('Product Name')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                TextColumn::make('category.title')
                    ->label('Category')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('success'),

                TextColumn::make('variants_count')
                    ->counts('variants')
                    ->label('Variants')
                    ->sortable()
                    ->badge()
                    ->color('info'),

                IconColumn::make('status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->since()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->relationship('category', 'title')
                    ->label('Category')
                    ->placeholder('All Categories')
                    ->multiple()
                    ->preload(),

                TernaryFilter::make('status')
                    ->label('Status')
                    ->placeholder('All Products')
                    ->trueLabel('Active Only')
                    ->falseLabel('Inactive Only'),

                Filter::make('has_variants')
                    ->label('Has Variants')
                    ->query(fn(Builder $query) => $query->has('variants'))
                    ->toggle(),

                Filter::make('in_stock')
                    ->label('In Stock')
                    ->query(fn(Builder $query) => $query->whereHas('variants', fn($q) => $q->where('stock', '>', 0))),

                Filter::make('low_stock')
                    ->label('Low Stock (≤10)')
                    ->query(fn(Builder $query) => $query->whereHas('variants', fn($q) => $q->where('stock', '<=', 10)->where('stock', '>', 0))),

                Filter::make('out_of_stock')
                    ->label('Out of Stock')
                    ->query(
                        fn(Builder $query) => $query
                            ->whereDoesntHave('variants', fn($q) => $q->where('stock', '>', 0))
                            ->orWhereHas('variants', fn($q) => $q->where('stock', '<=', 0))
                    ),
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('view')
                        ->label('View')
                        ->color('success')
                        ->icon('heroicon-o-eye')
                        ->modalHeading('Product Details')
                        ->modalContent(function (Product $record): HtmlString {
                            $product = Product::with('variants', 'category')->findOrFail($record->id);
                            return $this->getViewContent($product);
                        })
                        ->modalWidth('7xl'),

                    Action::make('edit')
                        ->fillForm(function (Product $record) {
                            return [
                                'category_id' => $record->category_id,
                                'title' => $record->title,
                                'slug' => $record->slug,
                                'description' => $record->description,
                                'status' => $record->status,
                                'images' => $record->images->pluck('image_url')->toArray(),
                                'variants' => $record->variants->map(function ($variant) {
                                    return [
                                        'id' => $variant->id,
                                        'sku' => $variant->sku,
                                        'flavor' => $variant->flavor,
                                        'weight' => $variant->weight,
                                        'weight_unit' => $variant->weight_unit,
                                        'pack_type' => $variant->pack_type,
                                        'mrp' => $variant->mrp,
                                        'sale_price' => $variant->sale_price,
                                        'stock' => $variant->stock,
                                        'variant_image' => $variant->image, // Renamed to avoid confusion
                                        'status' => $variant->status,
                                    ];
                                })->toArray(),
                            ];
                        })
                        ->label('Edit')
                        ->color('warning')
                        ->icon('heroicon-o-pencil')
                        ->form(fn(Product $record) => $this->getEditFormSchema($record))
                        ->action(function (Product $record, array $data): void {
                            $record->update([
                                'category_id' => $data['category_id'],
                                'title' => $data['title'],
                                'slug' => $data['slug'],
                                'description' => $data['description'],
                                'status' => $data['status'],
                            ]);

                            // Handle Product Images (Gallery)
                            $record->images()->whereNull('variant_id')->delete();
                            if (!empty($data['images'])) {
                                $isFirst = true;
                                foreach ($data['images'] as $img) {
                                    $imagePath = is_array($img) ? ($img['path'] ?? null) : $img;
                                    if ($imagePath) {
                                        $record->images()->create([
                                            'image_url' => $imagePath,
                                            'is_primary' => $isFirst,
                                            'variant_id' => null, // Product level image
                                        ]);
                                        $isFirst = false;
                                    }
                                }
                            }

                            // Handle Variants with their own images
                            if (isset($data['variants']) && is_array($data['variants'])) {
                                $existingIds = $record->variants->pluck('id')->toArray();
                                $updatedIds = [];

                                foreach ($data['variants'] as $variantData) {
                                    $variantImage = $variantData['variant_image'] ?? null;
                                    unset($variantData['variant_image']);

                                    if (!empty($variantData['id']) && in_array($variantData['id'], $existingIds)) {
                                        $variant = ProductVariant::find($variantData['id']);
                                        if ($variant) {
                                            // Handle variant image
                                            if ($variantImage) {
                                                $imagePath = is_array($variantImage) ? ($variantImage['path'] ?? null) : $variantImage;
                                                if ($imagePath) {
                                                    $variantData['image'] = $imagePath;
                                                }
                                            }
                                            $variant->update($variantData);
                                            $updatedIds[] = $variantData['id'];
                                        }
                                    } else {
                                        unset($variantData['id']);
                                        // Handle variant image
                                        if ($variantImage) {
                                            $imagePath = is_array($variantImage) ? ($variantImage['path'] ?? null) : $variantImage;
                                            if ($imagePath) {
                                                $variantData['image'] = $imagePath;
                                            }
                                        }
                                        $newVariant = $record->variants()->create($variantData);
                                        $updatedIds[] = $newVariant->id;
                                    }
                                }

                                $toDelete = array_diff($existingIds, $updatedIds);
                                if (!empty($toDelete)) {
                                    ProductVariant::whereIn('id', $toDelete)->delete();
                                }
                            }

                            Notification::make()
                                ->success()
                                ->title('Product updated successfully')
                                ->send();
                        })
                        ->modalWidth('7xl')
                        ->modalHeading('Edit Product')
                        ->modalSubmitActionLabel('Save Changes')
                        ->modalSubmitAction(
                            fn($action) =>
                            $action
                                ->color(null)
                                ->extraAttributes([
                                    'class' => 'bg-blue-600 text-white hover:bg-blue-700'
                                ])
                        ),

                    DeleteAction::make()
                        ->requiresConfirmation()
                        ->modalDescription('This will also delete all associated variants and images.')
                        ->modalSubmitAction(fn($action) =>
                            $action
                                ->color(null)
                                ->extraAttributes([
                                    'class' => 'bg-red-600 text-white hover:bg-red-700'
                                ])),
                ])
            ])
            ->headerActions([
                Action::make('create')
                    ->label('Add New Product')
                    ->icon('heroicon-o-plus')
                    ->color('success')
                    ->extraAttributes([
                        'class' => 'bg-blue-600 text-white hover:bg-blue-700'
                    ])
                    ->form(fn() => $this->getCreateFormSchema())
                    ->action(function (array $data): void {
                        $product = Product::create([
                            'category_id' => $data['category_id'],
                            'title' => $data['title'],
                            'slug' => $data['slug'],
                            'description' => $data['description'],
                            'status' => $data['status'],
                        ]);

                        // Save product gallery images
                        if (!empty($data['images'])) {
                            $isFirst = true;
                            foreach ($data['images'] as $img) {
                                $imagePath = is_array($img) ? ($img['path'] ?? null) : $img;
                                if ($imagePath) {
                                    $product->images()->create([
                                        'image_url' => $imagePath,
                                        'is_primary' => $isFirst,
                                        'variant_id' => null,
                                    ]);
                                    $isFirst = false;
                                }
                            }
                        }

                        // Save variants with their own images
                        if (isset($data['variants']) && is_array($data['variants'])) {
                            foreach ($data['variants'] as $variantData) {
                                $variantImage = $variantData['variant_image'] ?? null;
                                unset($variantData['variant_image']);

                                if ($variantImage) {
                                    $imagePath = is_array($variantImage) ? ($variantImage['path'] ?? null) : $variantImage;
                                    if ($imagePath) {
                                        $variantData['image'] = $imagePath;
                                    }
                                }

                                unset($variantData['id']);
                                $product->variants()->create($variantData);
                            }
                        }

                        Notification::make()
                            ->success()
                            ->title('Product created successfully')
                            ->send();
                    })
                    ->modalWidth('7xl')
                    ->modalHeading('Create New Product')
                    ->modalSubmitActionLabel('Create Product')
                    ->modalSubmitAction(
                        fn($action) =>
                        $action
                            ->color(null)
                            ->extraAttributes([
                                'class' => 'bg-blue-600 text-white hover:bg-blue-700'
                            ])
                    ),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()->requiresConfirmation(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->searchPlaceholder('Search by product name or ID...')
            ->emptyStateHeading('No products found')
            ->emptyStateDescription('Create your first product to get started.')
            ->emptyStateIcon('heroicon-o-shopping-bag')
            ->paginated([10, 25, 50, 100])
            ->defaultPaginationPageOption(10);
    }

    protected function getViewContent(Product $product): HtmlString
    {
        // Get product gallery images
        $productImages = $product->images->whereNull('variant_id');
        $primaryImage = optional($productImages->where('is_primary', true)->first())->image_url;
        $imageUrl = $this->getImageUrl($primaryImage);

        $html = <<<HTML
        <div class="space-y-6">
            <div class="flex justify-center">
                <img src="{$imageUrl}" 
                     alt="{$product->title}"
                     class="h-40 w-40 object-cover rounded-lg shadow-lg">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Product Name</h4>
                    <p class="mt-1 text-sm text-gray-900">{$product->title}</p>
                </div>
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Category</h4>
                    <p class="mt-1">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            {$product->category->title}
                        </span>
                    </p>
                </div>
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Slug</h4>
                    <p class="mt-1 text-sm text-gray-900">{$product->slug}</p>
                </div>
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Status</h4>
                    <p class="mt-1">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {$this->getStatusColor($product->status)}">
                            {$this->getStatusText($product->status)}
                        </span>
                    </p>
                </div>
            </div>

            {$this->getDescriptionHtml($product->description)}

            <div>
                <h4 class="text-sm font-medium text-gray-500 mb-3">Product Variants</h4>
                {$this->getVariantsTableHtml($product->variants)}
            </div>

            <div class="grid grid-cols-3 gap-4 pt-4 border-t">
                <div class="text-center">
                    <p class="text-2xl font-bold text-gray-900">{$product->variants->count()}</p>
                    <p class="text-sm text-gray-500">Total Variants</p>
                </div>
                <div class="text-center">
                    <p class="text-2xl font-bold text-gray-900">{$product->variants->sum('stock')}</p>
                    <p class="text-sm text-gray-500">Total Stock</p>
                </div>
                <div class="text-center">
                    <p class="text-2xl font-bold text-gray-900">{$this->getPriceRangeHtml($product->variants)}</p>
                    <p class="text-sm text-gray-500">Price Range</p>
                </div>
            </div>
        </div>
        HTML;

        return new HtmlString($html);
    }

    protected function getImageUrl($path)
    {
        if ($path && Storage::disk('public')->exists($path)) {
            return Storage::url($path);
        }
        return 'https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=Product';
    }

    protected function getStatusColor($status): string
    {
        return $status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
    }

    protected function getStatusText($status): string
    {
        return $status ? 'Active' : 'Inactive';
    }

    protected function getDescriptionHtml($description): string
    {
        if (!$description)
            return '';
        return <<<HTML
        <div>
            <h4 class="text-sm font-medium text-gray-500">Description</h4>
            <div class="mt-1 prose prose-sm max-w-none">{$description}</div>
        </div>
        HTML;
    }

    protected function getVariantsTableHtml($variants): string
    {
        if (!$variants || $variants->count() === 0) {
            return '<p class="text-sm text-gray-500">No variants available for this product.</p>';
        }

        $rows = '';
        foreach ($variants as $variant) {
            $stockClass = $variant->stock <= 0 ? 'text-red-600' : ($variant->stock <= 10 ? 'text-yellow-600' : 'text-green-600');
            $stockText = $variant->stock <= 0 ? 'Out of Stock' : ($variant->stock <= 10 ? "{$variant->stock} left" : $variant->stock);

            // Get variant image
            $variantImage = $variant->image ? '<img src="' . Storage::url($variant->image) . '" class="h-8 w-8 object-cover rounded">' : '-';

            $rows .= <<<HTML
            <tr>
                <td class="px-4 py-2 text-sm">{$variantImage}</td>
                <td class="px-4 py-2 text-sm">{$variant->sku}</td>
                <td class="px-4 py-2 text-sm">{$variant->flavor}</td>
                <td class="px-4 py-2 text-sm">{$variant->weight} {$variant->weight_unit}</td>
                <td class="px-4 py-2 text-sm">₹{$variant->mrp}</td>
                <td class="px-4 py-2 text-sm">₹{$variant->sale_price}</td>
                <td class="px-4 py-2 text-sm"><span class="{$stockClass} font-medium">{$stockText}</span></td>
                <td class="px-4 py-2 text-sm">{$this->getVariantStatusText($variant->status)}</td>
            </tr>
            HTML;
        }

        return <<<HTML
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">SKU</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Flavor</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Weight</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">MRP</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Sale Price</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Stock</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">{$rows}</tbody>
            </table>
        </div>
        HTML;
    }

    protected function getVariantStatusText($status): string
    {
        return $status ? '✓ Active' : '✗ Inactive';
    }

    protected function getPriceRangeHtml($variants): string
    {
        if ($variants->count() === 0)
            return '-';
        $min = $variants->min('sale_price');
        $max = $variants->max('sale_price');
        return $min == $max
            ? '₹' . number_format($min, 2)
            : '₹' . number_format($min, 2) . ' - ₹' . number_format($max, 2);
    }

    protected function getCreateFormSchema(): array
    {
        return [
            Section::make('Product Information')
                ->schema([
                    Grid::make(2)->schema([
                        Select::make('category_id')
                            ->label('Category')
                            ->options(Category::pluck('title', 'id'))
                            ->required()
                            ->searchable()
                            ->preload()
                            ->native(false),

                        TextInput::make('title')
                            ->label('Product Name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn($state, $set) => $set('slug', Str::slug($state))),
                    ]),

                    TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(Product::class, 'slug'),

                    RichEditor::make('description')
                        ->label('Description')
                        ->columnSpanFull(),

                    FileUpload::make('images')
                        ->label('Product Gallery Images')
                        ->multiple()
                        ->image()
                        ->directory('products/gallery')
                        ->reorderable()
                        ->preserveFilenames()
                        ->helperText('Upload multiple images for product gallery. First image will be primary.')
                        ->columnSpanFull(),

                    Toggle::make('status')
                        ->label('Active')
                        ->default(true),
                ]),

            Section::make('Product Variants')
                ->schema([
                    Repeater::make('variants')
                        ->label('Variants')
                        ->schema($this->getVariantSchema())
                        ->defaultItems(1)
                        ->maxItems(10)
                        ->collapsible()
                        ->cloneable()
                        ->itemLabel(fn(array $state) => $state['flavor'] ?? 'New Variant')
                        ->columnSpanFull(),
                ])
        ];
    }

    protected function getEditFormSchema(Product $record): array
    {
        return [
            Section::make('Product Information')
                ->schema([
                    Grid::make(2)->schema([
                        Select::make('category_id')
                            ->label('Category')
                            ->options(Category::pluck('title', 'id'))
                            ->required()
                            ->searchable()
                            ->preload()
                            ->native(false),

                        TextInput::make('title')
                            ->label('Product Name')
                            ->required()
                            ->maxLength(255),
                    ]),

                    TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(Product::class, 'slug', ignorable: $record),

                    RichEditor::make('description')
                        ->label('Description')
                        ->columnSpanFull(),

                    FileUpload::make('images')
                        ->label('Product Gallery Images')
                        ->multiple()
                        ->image()
                        ->directory('products/gallery')
                        ->reorderable()
                        ->helperText('Upload multiple images for product gallery. First image will be primary. Drag to reorder.')
                        ->columnSpanFull(),

                    Toggle::make('status')
                        ->label('Active'),
                ]),

            Section::make('Product Variants')
                ->schema([
                    Repeater::make('variants')
                        ->label('Variants')
                        ->schema($this->getVariantSchema())
                        ->defaultItems(1)
                        ->maxItems(10)
                        ->collapsible()
                        ->cloneable()
                        ->itemLabel(fn(array $state) => $state['flavor'] ?? 'New Variant')
                        ->columnSpanFull(),
                ])
        ];
    }

    protected function getVariantSchema(): array
    {
        return [
            Grid::make(3)->schema([
                TextInput::make('id')->hidden(),

                TextInput::make('sku')->label('SKU')->required()->maxLength(255),
                TextInput::make('flavor')->label('Flavor')->maxLength(255),
                TextInput::make('weight')->label('Weight')->numeric()->step(0.01),

                Select::make('weight_unit')
                    ->label('Weight Unit')
                    ->options(['g' => 'Grams (g)', 'kg' => 'Kilograms (kg)', 'ml' => 'Milliliters (ml)', 'l' => 'Liters (l)'])
                    ->default('g'),

                TextInput::make('pack_type')->label('Pack Type')->placeholder('e.g., Pouch, Jar'),

                TextInput::make('mrp')
                    ->label('MRP')
                    ->required()
                    ->numeric()
                    ->prefix('₹')
                    ->step(0.01),

                TextInput::make('sale_price')
                    ->label('Sale Price')
                    ->required()
                    ->numeric()
                    ->prefix('₹')
                    ->step(0.01),

                TextInput::make('stock')
                    ->label('Stock Quantity')
                    ->required()
                    ->numeric()
                    ->minValue(0),

                FileUpload::make('variant_image')
                    ->label('Variant Image')
                    ->image()
                    ->directory('variants')
                    ->helperText('Optional: Upload specific image for this variant')
                    ->nullable(),

                Toggle::make('status')
                    ->label('Active')->default(true),
            ])
        ];
    }

    public function render()
    {
        return view('livewire.admin.product.product-list')
            ->layout('layouts.admin');
    }
}