<?php

namespace App\Livewire\Public;

use App\Livewire\CartSidebar;
use App\Models\Product;
use App\Models\ProductVariant;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Home extends Component
{
   

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.public.home');
    }
}
