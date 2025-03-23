<?php

use App\Livewire\Counter;
use App\Livewire\Customer\CustomerCreate;
use App\Livewire\Customer\CustomerPage;
use App\Livewire\Customer\CustomerUpdate;
use App\Livewire\Product\ProductCreate;
use App\Livewire\Product\ProductDetail;
use App\Livewire\Product\ProductPage;
use App\Livewire\Product\ProductUpdate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/counter', Counter::class);
Route::prefix('product')->group(function () {
    Route::get('/', ProductPage::class)->name('product.page');
    Route::get('/update/{id}', ProductUpdate::class)->name('product.update');
    Route::get('/create', ProductCreate::class)->name('product.create');
    Route::get('/{id}', ProductDetail::class)->name('product.detail');
});

Route::prefix('customer')->group(function () {
    Route::get('/', CustomerPage::class)->name('customer.page');
    Route::get('/update/{id}', CustomerUpdate::class)->name('customer.update');
    Route::get('/create', CustomerCreate::class)->name('customer.create');
});
