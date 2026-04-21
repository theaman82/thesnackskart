<?php

namespace App\Livewire\Public;

use App\Livewire\CartSidebar;
use App\Models\Product;
use App\Models\ProductVariant;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Home extends Component
{
    public function addToCart($variantId)
    {
        $variant = ProductVariant::with('product')->findOrFail($variantId);

        $cart = session()->get('cart', []);

        if (isset($cart[$variantId])) {
            $cart[$variantId]['quantity']++;
        } else {
            $cart[$variantId] = [
                'variant_id' => $variant->id,
                'product_name' => $variant->product->title,
                'flavor' => $variant->flavor,
                'weight' => $variant->weight . ' ' . $variant->weight_unit,
                'price' => $variant->sale_price,
                'mrp' => $variant->mrp,
                'image' => $variant->image ?? $variant->product->featured_image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        $this->dispatch('cartUpdated')->to(CartSidebar::class);
        $this->dispatch('openCart');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.public.home');
    }
}
