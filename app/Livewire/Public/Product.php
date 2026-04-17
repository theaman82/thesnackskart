<?php

namespace App\Livewire\Public;

use Livewire\Component;
use App\Models\Product as ModelsProduct;

class Product extends Component
{
    public $products;
    
     public function  mount(){
       $this->products = ModelsProduct::latest()->take(4)->get();
       
     }

    public function render()
    {
        return view('livewire.public.product');
    }
}
