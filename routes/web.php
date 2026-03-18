<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ProductController;

Route::get('/', function(){
    echo 'Trang Chủ';
});
// 
Route::resource('products', ProductController::class);

Route::post('login', [AuthController::class, 'postLogin']);
Route::middleware('auth:sanctum')->group(function () {
    
    // Chỉ những người đã đăng nhập (có Token) mới vào được đây
    Route::post('products', [ProductController::class, 'store']);
    Route::put('products/{id}', [ProductController::class, 'update']);
    Route::delete('products/{id}', [ProductController::class, 'destroy']);
    
    // Route đăng xuất để hủy Token
    Route::post('logout', function () {
        auth()->user()->tokens()->delete();
        return response()->json(['message' => 'Đã đăng xuất và hủy Token']);
    });
});
