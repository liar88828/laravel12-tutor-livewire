<?php

use App\Livewire\Counter;
use App\Livewire\Product\ProductCreate;
use App\Livewire\Product\ProductDetail;
use App\Livewire\Product\ProductPage;
use App\Livewire\Product\ProductUpdate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/counter',Counter::class);
Route::get('/product',ProductPage::class)->name('product.page');
Route::get('/product/update/{id}',ProductUpdate::class)->name('product.update');
Route::get('/product/create',ProductCreate::class)->name('product.create');
Route::get('/product/{id}',ProductDetail::class)->name('product.detail');
