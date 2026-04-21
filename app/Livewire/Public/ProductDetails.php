<?php

namespace App\Livewire\Public;

use App\Models\Product;
use Livewire\Component;

class ProductDetails extends Component
{
    public $product;
    public $variants;
    public $selectedFlavor;
    public $selectedWeight;
    public $selectedVariant;
    public $quantity=1;

    public $images=[];
    public $mainImage;

    public $relatedProducts=[];




    public function mount($slug)
    {
        $this->product = Product::with(['variants', 'images', 'variants.images'])
            ->where('slug', $slug)
            ->first();


        $this->variants = $this->product->variants;

        // Default selection
        $first = $this->variants->first();

        $this->selectedFlavor = $first->flavor;
        $this->selectedWeight = $first->weight;

        $this->updateVariant();
        // dd($this->product);

          $this->relatedProducts = Product::with('images')
        ->where('category_id', $this->product->category_id)
        ->where('id', '!=', $this->product->id)
        ->latest()
        ->take(4)
        ->get();

                $this->loadImages();

    }
    public function updateVariant()
    {
        $variant = $this->variants
            ->where('flavor', $this->selectedFlavor)
            ->where('weight', $this->selectedWeight)
            ->first();

        if ($variant) {
            $this->selectedVariant = $variant;
        }
        $this->loadImages();
    }

    public function changeImage($image)
{
    $this->mainImage = $image;
}

    public function loadImages()
{
    // ✅ First try variant images
    if ($this->selectedVariant && $this->selectedVariant->images->isNotEmpty()) {
        $images = $this->selectedVariant->images;
    } 
    // ✅ fallback to product images
    else {
        $images = $this->product->images;
    }

    $this->images = $images;

    // ✅ set main image
    $primary = $images->where('is_primary', true)->first();

    $this->mainImage = $primary
        ? $primary->image_url
        : ($images->first()->image_url ?? null);
}
    public function selectFlavor($flavor)
    {
        $this->selectedFlavor = $flavor;

        // auto select first available weight for this flavor
        $variant = $this->variants
            ->where('flavor', $flavor)
            ->first();

        if ($variant) {
            $this->selectedWeight = $variant->weight;
            $this->selectedVariant = $variant;
        }
                $this->loadImages();

    }

    public function selectWeight($weight)
    {
        $this->selectedWeight = $weight;

        // auto select first available flavor for this weight
        $variant = $this->variants
            ->where('weight', $weight)
            ->first();

        if ($variant) {
            $this->selectedFlavor = $variant->flavor;
            $this->selectedVariant = $variant;
        }
                $this->loadImages();

    }

    public function increaseQty()
    {
        if ($this->selectedVariant && $this->quantity < $this->selectedVariant->stock) {
            $this->quantity++;
        }
    }

    public function decreaseQty()
    {
        if ($this->selectedVariant && $this->quantity < $this->selectedVariant->stock) {
            if ($this->quantity > 1) {
                $this->quantity--;
            }
        }
    }

    public function render()
    {
        return view('livewire.public.product-details')
            ->layout('layouts.app');
    }
}
