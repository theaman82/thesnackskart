<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Livewire\Component;

class CategoryList extends Component implements HasForms, HasActions, HasTable
{
    use InteractsWithForms;
    use InteractsWithActions;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(Category::query())
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('parent.title')
                    ->default('-'),
                TextColumn::make('description')
                    ->limit(50)
                    ->searchable(),

                TextColumn::make('created_at')
                    ->dateTime('d-m-Y')
                    ->sortable(),
            ])
            ->actions([
                EditAction::make()
                    ->label('Edit')
                    ->icon('heroicon-o-pencil-square')
                    ->color('warning')

                    ->modalHeading(' Edit Category')
                    ->modalSubheading('Update category details below')
                    ->modalWidth('sm')

                    ->modalSubmitActionLabel('Update Category')
                    ->modalCancelActionLabel('Cancel')
                    ->modalFooterActionsAlignment('end')
                    ->form([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->label('Category Title')
                            ->placeholder('Enter category name...')
                            ->helperText('This name will be visible to users')
                            ->extraAttributes(['class' => 'rounded-xl'])
                            ->columnSpan(1),

                        Select::make('parent_id')
                            ->label('parent Category')
                            ->relationship('parent', 'title')
                            ->preload()
                            ->placeholder('Select Parent Category')
                            ->columnSpan(1),



                        Textarea::make('description')
                            ->label('Description')
                            ->placeholder('Write something about this category...')
                            ->rows(4)
                            ->helperText('Optional but recommended')
                            ->extraAttributes(['class' => 'rounded-xl'])
                            ->columnSpanFull(),
                    ])

                    ->using(function (Category $record, array $data): Category {
                        $record->update($data);

                        Notification::make()
                            ->title('✅ Category updated successfully!')
                            ->success()
                            ->duration(2000)
                            ->send();

                        return $record;
                    }),

                DeleteAction::make()
                    ->label('Delete')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Delete Category')
                    ->modalDescription('Are you sure you want to delete this category? This action cannot be undone.')
                    ->using(function (Category $record): bool {
                        $record->delete();

                        Notification::make()
                            ->title('Category deleted successfully!')
                            ->success()
                            ->send();

                        return true;
                    }),
            ])
            ->bulkActions([
                \Filament\Tables\Actions\BulkActionGroup::make([
                    \Filament\Tables\Actions\DeleteBulkAction::make()
                        ->label('Delete Selected')
                        ->icon('heroicon-o-trash')
                        ->color('danger')
                        ->requiresConfirmation(),
                ]),
            ])
            ->defaultSort('id', 'desc');
    }

    public function render()
    {
        return view('livewire.admin.category.category-list')
            ->layout('layouts.admin');
    }
}