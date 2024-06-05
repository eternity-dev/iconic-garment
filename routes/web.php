<?php

use App\Http\Controllers\Auth\GarmentRegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Garment\ProductController as GarmentProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

Route::name('auth.')->prefix('auth')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.get');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.get');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
    Route::get('/register/garment', [GarmentRegisterController::class, 'index'])->name('register-garment.get');
    Route::post('/register/garment', [GarmentRegisterController::class, 'register'])->name('register-garment.post');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout.get');
});

Route::name('garment.')->prefix('garments')->group(function () {
    Route::get('/products', [GarmentProductController::class, 'index'])->name('product.index');
});

Route::name('order.')->prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::get('/{order:code}', [OrderController::class, 'show'])->name('show');
    Route::put('/{order:code}', [OrderController::class, 'update'])->name('update');
    Route::get('/{order:code}/delete', [OrderController::class, 'destroy'])->name('destroy');
    Route::get('/create/{product}', [OrderController::class, 'create'])->name('create');
    Route::post('/create/{product}', [OrderController::class, 'store'])->name('store');
});

Route::name('payment.')->prefix('payments')->group(function () {
    Route::get('/pay/{order:code}', [PaymentController::class, 'create'])->name('pay.index');
    Route::post('/pay/{order:code}', [PaymentController::class, 'store'])->name('pay.post');
    Route::put('/pay/{payment:trx_id}', [PaymentController::class, 'put'])->name('pay.put');
});

Route::name('product.')->prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/create', [ProductController::class, 'create'])->name('store');
    Route::get('/{product}', [ProductController::class, 'show'])->name('show');
});

Route::name('user.')->prefix('user')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::name('global.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('main');
});