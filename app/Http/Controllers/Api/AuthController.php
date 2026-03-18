<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }
    public function postLogin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => true,
                'access_token' => $token,
                'role' => $user->role, // Trả về role để biết là Admin hay User
                'user' => $user->name
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Email hoặc password sai'
        ], 401);
    }
}
