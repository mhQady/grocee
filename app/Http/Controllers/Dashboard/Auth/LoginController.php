<?php

namespace App\Http\Controllers\Dashboard\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:admins,email'],
            'password' => ['required'],
        ]);

        if (!Auth::guard('admin')->attempt($credentials))
            return response()->json(['message' => 'Invalid credentials'], 401);

        $request->session()->regenerate();

        return response()->json(['admin' => Auth::guard('admin')->user()]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        // Auth::guard('sanctum')->user()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logout successful']);
    }
}
