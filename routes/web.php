<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestItemsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::resource("/test-items", TestItemsController::class);
    Route::resource("/customer", CustomerController::class);
    Route::get('/', function () {
        return view('welcome');
    });
});
