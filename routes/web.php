<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'app.home')->name('index');

Route::controller(ProductController::class)->group(function () {
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

    Route::controller(OrderController::class)->group(function () {
        Route::get('/{user:slug}/orders', 'index')->name('order.index');
        Route::get('/{order}/invoice', 'download')->name('order.invoice.download');
    });
});

Route::Post('/payment/{gateway}/callback', [PaymentController::class, 'verify'])
    ->name('payment.verified');

// Route::get('/t', function () {
// });
