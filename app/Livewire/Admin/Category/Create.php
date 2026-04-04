<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Validate('required|string|max:255')]
    public $title='';

    #[Validate('nullable|string')]
    public $description='';

#[Validate('nullable|exists:categories,id')]

    public $parent_id='';


   public function save()
{
    $this->validate();

    Category::create([
        'title'       => $this->title,
        'description' => $this->description,
        'parent_id'   => $this->parent_id,   
    ]);

    $this->reset(['title', 'description', 'parent_id']);

    session()->flash('success', 'Category Added Successfully!');
}

    public function render()
    {
        return view('livewire.admin.category.create',[
            'categories'=>Category::whereNull('parent_id')->with('children')->get()
        ])->layout('layouts.admin');
    }
}
