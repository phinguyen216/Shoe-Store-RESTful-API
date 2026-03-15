<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function(){
    echo 'Trang Chủ';
});
// 
Route::resource('products', ProductController::class);