<?php

namespace App\Livewire\Public;

use App\Livewire\CartSidebar;
use App\Models\ProductVariant;
use Livewire\Component;
use App\Models\Product as ModelsProduct;

class Product extends Component
{
    public $products;

    public function mount()
    {
        $this->products = ModelsProduct::latest()->take(4)->get();
    }
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
        return $this->redirect(route('cart.page'), navigate: true);
    }

    public function render()
    {
        return view('livewire.public.product');
    }
}
