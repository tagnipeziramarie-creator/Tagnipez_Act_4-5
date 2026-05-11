<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function token(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid email or password.'
            ], 401);
        }

        $user = $request->user();

        $token = $user->createToken('student-dashboard-token')->plainTextToken;

        return response()->json([
            'message' => 'Token created successfully.',
            'token' => $token,
            'user' => $user,
        ]);
    }
}
