<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::view('/basket', 'app.basket');
Route::view('/checkout ', 'app.checkout');

Route::get('/t', function () {
    // foreach(Product::all() as $product) {
    //     dump($product->title);
    // }
});
