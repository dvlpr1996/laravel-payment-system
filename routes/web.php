<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'app.home');

Route::get('/t', function () {
    echo ucwords(config('app.name'));
});
