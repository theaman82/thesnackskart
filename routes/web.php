<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\Category\CategoryList;
use App\Livewire\Admin\Category\Create;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Order\ManageOrder;
use App\Livewire\Admin\Product\Productcreate;
use App\Livewire\Admin\Product\ProductList;
use App\Livewire\Admin\User\ManageUsers;
use App\Livewire\Public\Home;
use App\Livewire\User\ManageAddress;
use App\Livewire\User\ManageOrders;
use App\Livewire\User\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', Profile::class)->name('user.profile');
    Route::get('/profile/manage-orders', ManageOrders::class)->name('user.manage-order');
    Route::get('/profile/manage-address', ManageAddress::class)->name('user.manage-address');
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
        Route::get('/product/list',ProductList::class)
        ->name('product.list');
        Route::get('/manage/users', ManageUsers::class)->name('manage.user');
        Route::get('/manage/order', ManageOrder::class)->name('manage.order');
    });
require __DIR__ . '/auth.php';
