<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\AuthController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Role users
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);
// Role Admin
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    // Lấy danh sách
    Route::get('admin/products', [ProductController::class, 'index']);
    // Tạo mới
    Route::post('admin/products', [ProductController::class, 'store']);
    // Sửa
    Route::put('admin/products/{id}', [ProductController::class, 'update']);
    // Xóa
    Route::delete('admin/products/{id}', [ProductController::class, 'destroy']);
    // Đăng xuất
    Route::post('logout', [AuthController::class, 'logout']);
    //  Thùng rác
    Route::get('admin/products/trash', [ProductController::class, 'trash']);
    // Khôi phục
    Route::post('admin/products/restore/{id}', [ProductController::class, 'restore']);
    // Xóa 
    Route::delete('admin/products/force-delete/{id}', [ProductController::class, 'forceDelete']);
});
