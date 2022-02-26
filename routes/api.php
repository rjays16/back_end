<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecretController;
Route::post('login', [App\Http\Controllers\API\AuthController::class, 'login'])->name('login');




