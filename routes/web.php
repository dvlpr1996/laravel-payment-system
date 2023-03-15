<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/checkout', [ProductController::class, 'index'])->name('checkout.index');
Route::get('/product/{product:slug}', [ProductController::class, 'product'])->name('product');


Route::get('/basket/add/{product:slug}', [BasketController::class, 'add'])->name('basket.add');
Route::view('/basket', 'app.basket');
Route::view('/checkout ', 'app.checkout');

Route::get('/t', function () {

});
