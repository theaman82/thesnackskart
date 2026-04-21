<?php

namespace App\Livewire\Public;

use App\Livewire\CartSidebar;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Home extends Component
{
    public function mount()
    {

    }

    #[Layout('layouts.app')]
    public function render()
    {
        $categories = Category::all();
        return view('livewire.public.home', [
            'categories' => $categories,
        ]);
    }
}
