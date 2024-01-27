<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\Auth\LoginController;

Route::middleware('guest:sanctum')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
});

Route::middleware('auth:admin')->get('/user', function () {
    return auth('admin')->user();
});

Route::get('auth/admin', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:admin')->group(function () {
    Route::post('logout', [LoginController::class, 'logout']);
    Route::apiResources([
        'products' => ProductController::class,
        'categories' => CategoryController::class,
    ]);

});

