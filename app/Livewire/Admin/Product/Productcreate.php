<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Productcreate extends Component
{
    use WithFileUploads;

    public $categoryId;
    public $title = '';
    public $slug = '';
    public $description = '';
    public $status = true;

    public $variants = [];

    // Temporary image holders for variants
    public $variantImages = [];

    public function mount()
    {
        $this->initVariants();
    }

    public function initVariants()
    {
        $this->variants = [
            [
                'sku' => '',
                'flavor' => '',
                'weight' => '',
                'weight_unit' => 'g',
                'pack_type' => '',
                'mrp' => '',
                'sale_price' => '',
                'stock' => 0,
                'image' => null,
            ]
        ];
    }

    public function updateTitle($value)
    {
        $this->slug = Str::slug($value);
    }

    public function updatedSlug($value)
    {
        $this->slug = Str::slug($value);
    }

    public function addVariant()
    {
        $this->variants[] = [
            'sku' => '',
            'flavor' => '',
            'weight' => '',
            'weight_unit' => 'g',
            'pack_type' => '',
            'mrp' => '',
            'sale_price' => '',
            'stock' => 0,
            'image' => null,
        ];
    }

    public function removeVariant($index)
    {
        unset($this->variants[$index]);
        $this->variants = array_values($this->variants);
        
        // Also remove any temporary image for this variant
        if (isset($this->variantImages[$index])) {
            unset($this->variantImages[$index]);
            $this->variantImages = array_values($this->variantImages);
        }
    }

    public function save()
    {
        // First validate product data
        $this->validate([
            'categoryId' => 'required|exists:categories,id',
            'title' => 'required|string|min:3|max:255',
            'slug' => 'required|string|unique:products,slug|regex:/^[a-z0-9-]+$/',
            'description' => 'nullable|string',
            'status' => 'boolean',
        ]);

        // Validate variants with custom rule for unique SKU
        foreach ($this->variants as $index => $variant) {
            $this->validate([
                "variants.{$index}.sku" => 'required|string|unique:product_variants,sku',
                "variants.{$index}.flavor" => 'nullable|string|max:100',
                "variants.{$index}.weight" => 'nullable|numeric|min:0',
                "variants.{$index}.weight_unit" => 'in:g,kg,ml,l',
                "variants.{$index}.pack_type" => 'nullable|string|max:50',
                "variants.{$index}.mrp" => 'required|numeric|min:0',
                "variants.{$index}.sale_price" => 'required|numeric|min:0|lte:variants.' . $index . '.mrp',
                "variants.{$index}.stock" => 'required|integer|min:0',
            ]);
        }

        // Validate images separately
        foreach ($this->variantImages as $index => $image) {
            $this->validate([
                "variantImages.{$index}" => 'nullable|image|max:2048',
            ]);
        }

        
            // Create product
            $product = Product::create([
                'category_id' => $this->categoryId,
                'title' => $this->title,
                'slug' => $this->slug,
                'description' => $this->description,
                'status' => $this->status,
            ]);

            // Create variants
            foreach ($this->variants as $index => $variantData) {
                $imagePath = null;
                
                // Handle image upload if present
                if (isset($this->variantImages[$index]) && $this->variantImages[$index]) {
                    $imagePath = $this->variantImages[$index]->store('product-variants', 'public');
                }

                ProductVariant::create([
                    'product_id' => $product->id,
                    'sku' => $variantData['sku'],
                    'flavor' => $variantData['flavor'],
                    'weight' => $variantData['weight'] ?: null,
                    'weight_unit' => $variantData['weight_unit'],
                    'pack_type' => $variantData['pack_type'],
                    'mrp' => $variantData['mrp'],
                    'sale_price' => $variantData['sale_price'],
                    'stock' => $variantData['stock'],
                    'image' => $imagePath, // Changed from 'image_path' to 'image' to match migration
                    'status' => true,
                ]);
            }

            session()->flash('message', 'Product and variants created successfully!');
            
            // Reset form
            $this->reset(['title', 'slug', 'description', 'categoryId', 'variantImages']);
            $this->status = true;
            $this->initVariants();
            
            // Optional: redirect to product list
            // return redirect()->route('admin.products.index');
            
        
    }

    public function render()
    {
        return view('livewire.admin.product.productcreate', [
            'categories' => Category::all()
        ])->layout('layouts.admin');
    }
}