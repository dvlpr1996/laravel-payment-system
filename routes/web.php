<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckOutController;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::controller(ProductController::class)->group(function () {
    Route::get('/checkout', 'index')->name('checkout.index');
    Route::get('/product/{product:slug}', 'product')->name('product');
});

Route::controller(BasketController::class)->group(function () {
    Route::get('/basket', 'index')->name('basket.index');
    Route::get('/basket/add/{product:slug}', 'add')->name('basket.add');
    Route::get('/basket/update/{product}', 'update')->name('basket.update');
    Route::get('/basket/remove/{product}', 'remove')->name('basket.remove');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(CheckOutController::class)->group(function () {
        Route::get('/checkout', 'index')->name('checkout.index');
        Route::post('basket/checkout', 'checkOut')->name('basket.checkOut');
    });
});

Route::get('/t', function () {
});
