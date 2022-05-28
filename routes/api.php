<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecretController;

Route::post('register', [App\Http\Controllers\API\AuthController::class, 'register'])->name('register');
Route::post('login', [App\Http\Controllers\API\AuthController::class, 'login'])->name('login');
Route::post('count_user', [App\Http\Controllers\API\AuthController::class, 'count_user'])->name('count_user');
Route::post('list_user', [App\Http\Controllers\API\AuthController::class, 'list_user'])->name('list_user');
Route::post('logout', [App\Http\Controllers\API\AuthController::class, 'logout'])->name('logout');



Route::post('store', [App\Http\Controllers\API\TaskController::class, 'store'])->name('store');
Route::post('list_task', [App\Http\Controllers\API\TaskController::class, 'list_task'])->name('list_task');
Route::delete('delete/{id}', [App\Http\Controllers\API\TaskController::class, 'delete'])->name('delete');
Route::put('update/{id}', [App\Http\Controllers\API\TaskController::class, 'update'])->name('update');
Route::post('count_task', [App\Http\Controllers\API\TaskController::class, 'count_task'])->name('count_task');
Route::get('edit_id/{id}', [App\Http\Controllers\API\TaskController::class, 'edit_id'])->name('edit_id');
Route::get('getaskinfo/{id}', [App\Http\Controllers\API\TaskController::class, 'getaskinfo'])->name('getaskinfo');
Route::post('list_user_task/{assign_to}', [App\Http\Controllers\API\TaskController::class, 'list_user_task'])->name('list_user_task');
Route::post('count_task_for_user_assign/{assign_to}', [App\Http\Controllers\API\TaskController::class, 'count_task_for_user_assign'])->name('count_task_for_user_assign');
