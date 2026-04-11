<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $TotalUser;
    public $TotalOrder;
    public $TotalAmout;
    public $TotalActiveProduct;
    public $Orderpanding;
    public $TotalProduct;
    public $RecentOrder;
    public $orderCompleted;

    public function mount()
    {
        $this->TotalUser = User::count();
        $this->TotalOrder = Order::count();
        $this->TotalAmout = Order::where('status', 'completed')->sum('total_amount');
        $this->TotalProduct = Product::count();
        $this->TotalActiveProduct = Product::where('status', 'true')->count();

        //order section
        $this->Orderpanding = Order::where('status', 'pending')->count();
        $this->RecentOrder = Order::latest()->take(5)->get();
        $this->orderCompleted = Order::where('status', 'completed')->count();





    }

    public function render()
    {
        return view('livewire.admin.dashboard')->layout('layouts.admin');
    }
}
