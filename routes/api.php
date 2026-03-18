<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Role users
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);
// Role Admin
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::post('admin/products', [ProductController::class, 'store']);
    Route::put('admin/products/{id}', [ProductController::class, 'update']);
    Route::delete('admin/products/{id}', [ProductController::class, 'destroy']);
    
    // Đăng xuất
    Route::post('logout', [AuthController::class, 'logout']);
});