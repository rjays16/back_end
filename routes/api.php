<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecretController;
Route::post('register', [App\Http\Controllers\API\AuthController::class, 'register'])->name('register');
Route::post('login', [App\Http\Controllers\API\AuthController::class, 'login'])->name('login');
Route::post('count_user', [App\Http\Controllers\API\AuthController::class, 'count_user'])->name('count_user');
Route::post('list_user', [App\Http\Controllers\API\AuthController::class, 'list_user'])->name('list_user');
Route::post('logout', [App\Http\Controllers\API\AuthController::class, 'logout'])->name('logout');

