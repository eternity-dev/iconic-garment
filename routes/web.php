<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::name('auth.')->prefix('auth')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.get');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.get');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout.get');
});

Route::get('/', function () {
    dd(auth()->user(), auth()->guard('garment')->user());
});
