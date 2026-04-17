<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Profile extends Component
{
    public $name, $email, $mobile, $gender;

    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->mobile ?? '8227046826';
        $this->gender = $user->gender ?? 'Male';
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            // 'mobile' => 'nullable',
            // 'gender' => 'nullable'
        ]);

        auth()->user()->update([
            'name' => $this->name,
            'email' => $this->email,
            // 'mobile' => $this->mobile,
            // 'gender' => $this->gender,
        ]);

        session()->flash('success', 'Profile updated successfully!');
    }

    // public function deactivateAccount()
    // {
    //     $user = auth()->user();
    //     $user->update(['is_active' => false]);

    //     auth()->logout();
    //     return redirect('/');
    // }

    #[Layout('layouts.user')]
    public function render()
    {
        return view('livewire.user.profile');
    }
}
