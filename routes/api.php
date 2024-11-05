<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/**
 * Create register Route
 */
Route::post('auth/register', [AuthController::class, 'register'])->name('auth.register');

/**
 * Create Login Route
 */
Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');

/**
 * Authenticated Routes
 */
Route::middleware("auth:api")->group(function () {

    /**
     * Get Current User
     */
    Route::get('auth/current', [AuthController::class, 'current'])->name('auth.current');
    
    /**
     * Logout User
     */
    Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

});