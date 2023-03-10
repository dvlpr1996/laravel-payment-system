<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'app.home');
Route::view('/basket', 'app.basket');
Route::view('/checkout ', 'app.checkout');

Route::get('/t', function () {
    echo ucwords(config('app.name'));
});
