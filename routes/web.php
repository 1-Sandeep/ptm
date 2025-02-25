<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::get('/login', function () {
        return redirect()->route('login');
    });
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate')->middleware('throttle:5,1'); // Limit to 5 attempts per minute

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Route::fallback(function () {
//     return view('errors.404'); // Create a custom 404 view for better user experience
// });
