<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;

class Productcreate extends Component
{
    public $title='';
    public function render()
    {
        return view('livewire.admin.product.productcreate')->layout('layouts.admin');
    }
}
