<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ProductController;
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

Route::get('categories/feature', [CategoryController::class, 'getFeatureCategories']);
Route::get('categories/has-newest-products', [CategoryController::class, 'getCategoriesHasNewestProducts']);

Route::get('products/latest/{category?}', [ProductController::class, 'getLatestProducts']);

Route::apiResource('files', FileController::class)->only(['store', 'show', 'destroy']);
