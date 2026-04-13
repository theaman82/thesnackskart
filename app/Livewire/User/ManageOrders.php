<?php

namespace App\Livewire\User;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ManageOrders extends Component
{
    public $userId;
    public function mount()
    {
        $user = auth()->user();
        $this->userId = $user->id;
    }
    #[Layout('layouts.user')]
    public function render()
    {
        $orders = Order::with('items')->where('user_id', $this->userId)->latest()->get();
        return view('livewire.user.manage-orders', ['orders' => $orders]);
    }
}
