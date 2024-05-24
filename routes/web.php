<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

Route::name('auth.')->prefix('auth')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.get');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.get');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout.get');
});

Route::name('user.')->prefix('user')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::name('global.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('main');
});