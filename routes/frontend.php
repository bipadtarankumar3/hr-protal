<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CareerController;
use App\Http\Controllers\Frontend\JobApplyController;

// Route::get('/', [HomeController::class, 'index']);
Route::get('/', [JobApplyController::class, 'apply']);
Route::get('/careers', [CareerController::class, 'index']);
Route::get('/careers/apply/{id}', [JobApplyController::class, 'apply']);
// Authentication Routes
Route::get('/login', [\App\Http\Controllers\Auth\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');
