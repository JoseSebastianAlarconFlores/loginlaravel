<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->middleware(\App\Http\Middleware\AdminMiddleware::class)
        ->name('admin.dashboard');
        
    Route::post('/admin/users', [AdminController::class, 'store'])
        ->middleware(\App\Http\Middleware\AdminMiddleware::class)
        ->name('admin.users.store');
        
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])
        ->middleware(\App\Http\Middleware\AdminMiddleware::class)
        ->name('admin.users.destroy');
        
    Route::get('/profile', [UserController::class, 'index'])->name('user.profile');
});