<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Website\Auth\LoginController;
use App\Http\Controllers\Website\Auth\RegisterController;

Route::middleware('guest:web')->group(function () {
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('login', [LoginController::class, 'login']);
});

Route::middleware('auth:web')->get('/user', function () {
    return auth('user')->user();
});

Route::middleware('auth:web')->group(function () {
    Route::post('logout', [LoginController::class, 'logout']);
});


Route::apiResource('files', FileController::class)->only(['store', 'show', 'destroy']);
