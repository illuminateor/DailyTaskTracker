<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    // Route::post('/register', action: [AuthController::class, 'register'])->name('register.post');
});

Route::middleware('auth')->group(function () {
    // Route::post('/logout', [AuthController::class, 'logout'])->name(name: 'login');
    // Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard');

    Route::redirect('/', '/dashboard');
});