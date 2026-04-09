<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Profile extends Component
{
    #[Layout('layouts.user')]
    public function render()
    {
        return view('livewire.user.profile');
    }
}
