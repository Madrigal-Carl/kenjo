<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ProductController;


Route::get('/', [ViewController::class, 'viewHome'])->name('home');

// Authentication Routes
Route::get('/signin', [ViewController::class, 'viewSignin'])->name('signin');

Route::post('/signin', [AuthController::class, 'login']);

Route::get('/signup', [ViewController::class, 'viewSignup'])->name('signup');

Route::post('/signup', [AuthController::class, 'register']);

Route::post('/signout', [AuthController::class, 'logout'])->name('signout');

Route::get('/cart', [ViewController::class, 'viewCart'])->name('cart');

Route::get('/products', [ProductController::class, 'index'])->name('product.index');

Route::post('/products', [ProductController::class, 'store'])->name('product.store');

Route::get('/cart/data', [CartController::class, 'index'])->name('cart.index');

Route::post('/cart', [CartController::class, 'store'])->name('cart.store');

Route::delete('/cart/products/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::put('/cart/products/{id}', [CartController::class, 'update'])->name('cart.update');

Route::post('/order', [OrderController::class, 'store'])->name('order.store');

Route::get('/admin/order', [ViewController::class, 'viewAdminOrder'])->name('admin.order');
