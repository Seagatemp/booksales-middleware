<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * LOGIN — Generate JWT token
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // pakai guard jwt (api)
        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return response()->json(['message' => 'Invalid email or password'], 401);
        }

        // karena guard JWT kadang belum bisa akses factory() di beberapa versi Laravel
        // kita atur expired time manual (default tymon/jwt-auth = 60 menit)
        $ttl = config('jwt.ttl', 60);

        return response()->json([
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $ttl * 60,
            'user' => Auth::guard('api')->user(),
        ]);
    }

    /**
     * LOGOUT
     */
    public function logout()
    {
        Auth::guard('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * GET USER INFO
     */
    public function me()
    {
        return response()->json(Auth::guard('api')->user());
    }
}
