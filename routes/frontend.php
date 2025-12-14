<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CareerController;
use App\Http\Controllers\Frontend\JobApplyController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/careers', [CareerController::class, 'index']);
Route::get('/careers/apply/{id}', [JobApplyController::class, 'apply']);
Route::get('/login', [HomeController::class, 'login']);
