<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\Category\CategoryList;
use App\Livewire\Admin\Category\Create;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Product\Productcreate;
use App\Livewire\Public\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'isAdmin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', Dashboard::class)->name('dashboard');

        Route::get('/category/insert', Create::class)
            ->name('category.create');

        Route::get('/category/list', CategoryList::class)
            ->name('category.list');
        Route::get('/product/insert',Productcreate::class)
        ->name('product.create');
    });
require __DIR__ . '/auth.php';
