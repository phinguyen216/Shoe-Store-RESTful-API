<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Đổi tên thành login cho khớp với routes/api.php
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Tạo token bằng Sanctum
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => true,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'role' => $user->role,
                'user' => $user->name
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Email hoặc password sai'
        ], 401);
    }
}
