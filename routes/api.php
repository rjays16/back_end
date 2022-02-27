<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecretController;
Route::post('register', [App\Http\Controllers\API\AuthController::class, 'register'])->name('register');
Route::post('login', [App\Http\Controllers\API\AuthController::class, 'login'])->name('login');
Route::get('user', [\App\Http\Controllers\API\AuthController::class,'login'])->name('user');



