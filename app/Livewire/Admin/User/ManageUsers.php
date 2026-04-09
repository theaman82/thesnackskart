<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use Livewire\Component;

class ManageUsers extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

     public function table(Table $table){
            return $table
            ->query(User::query())
            ->columns([
                TextColumn::make('id')
                ->sortable()
                ->searchable()
                ,
                TextColumn::make('name')
                ->sortable()
                ->searchable()
                ,
                TextColumn::make('email')
                ->sortable()
                ->searchable(),

                TextColumn::make('address.phone')
                ->sortable()
                ->searchable(),

                TextColumn::make('created_at')
                ->sortable(),

                


            ]);

        }
    public function render()
    {
        return view('livewire.admin.user.manage-users')->layout('layouts.admin');
    }
}
