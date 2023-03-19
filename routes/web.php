<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/checkout', [ProductController::class, 'index'])->name('checkout.index');
Route::get('/product/{product:slug}', [ProductController::class, 'product'])->name('product');
Route::get('/basket/add/{product:slug}', [BasketController::class, 'add'])->name('basket.add');
Route::get('/basket/remove/{product}', [BasketController::class, 'remove'])
    ->name('basket.remove');
Route::get('/basket/update/{product}', [BasketController::class, 'update'])
    ->name('basket.update');
Route::get('/basket', [BasketController::class, 'index'])->name('basket.index');

Route::view('/checkout ', 'app.checkout');

Route::get('/t', function () {
});
