<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class CartSidebar extends Component
{
    public $cart = [];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }
    #[On('cartUpdated')]
    public function refreshCart()
    {
        $this->cart = session()->get('cart', []);
    }

    public function increase($id)
    {
        $this->cart[$id]['quantity']++;
        session()->put('cart', $this->cart);
    }

    public function decrease($id)
    {
        if ($this->cart[$id]['quantity'] > 1) {
            $this->cart[$id]['quantity']--;
        } else {
            unset($this->cart[$id]);
        }

        session()->put('cart', $this->cart);
    }

    public function remove($id)
    {
        unset($this->cart[$id]);
        session()->put('cart', $this->cart);
    }

    public function getSubtotalProperty()
    {
        return collect($this->cart)->sum(fn($item) => $item['mrp'] * $item['quantity']);
    }

    public function getDiscountProperty()
    {
        return $this->subtotal - $this->total;
    }

    public function getTotalProperty()
    {
        return collect($this->cart)->sum(fn($item) => $item['price'] * $item['quantity']);
    }
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.cart-sidebar');
    }
}
