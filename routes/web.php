<?php

use App\Livewire\Admin\Category\Create;
use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/shop', function () {
    return view('pages.shop');
});

Route::get('/product/{id}', function ($id) {
    return view('pages.product-detail', ['productId' => $id]);
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/cart', function () {
    return view('pages.cart');
});

  Route::get('/admin', Dashboard::class)->name('dashboard');  
Route::get('/category/insert', Create::class)->name('category.create');

