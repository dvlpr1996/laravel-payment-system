<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/product/{product:slug}', [ProductController::class, 'product'])->name('product');
Route::view('/basket/{product:slug}', 'app.basket')->name('basket.add');
Route::view('/basket', 'app.basket');
Route::view('/checkout ', 'app.checkout');

Route::get('/t', function () {
    dd(number_format('15000', 0, ''));
});
