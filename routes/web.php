<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('client/Home');
});

Route::get('/cart', function () {
    return inertia('client/Cart');
});
