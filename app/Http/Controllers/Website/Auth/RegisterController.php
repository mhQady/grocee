<?php

namespace App\Http\Controllers\Website\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    // public function register(Request $request)
    // {
    //     return response()->json(['data' => $request->all()]);
    // }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'unique:users,phone'],
            'password' => ['required', 'confirmed'],
            // 'client_id' => ['required'],
            // 'client_secret' => ['required'],
        ]);

        $user = User::create($credentials);
        // $inputs = $request->all();
        // $student = $this->repo->create($inputs);
        // $client = $this->oauthClientRepo->validateClient($credentials['client_id'], $credentials['client_secret']);
        // $token = $this->generateToken($user);

        // auth()->login($user);

        return response()->json([
            'message' => __('Saved Successfully'),
            'user' => $user,
            // 'token' => $token
        ]);
    }

    protected function generateToken($user, array $abilities = ['*'])
    {
        return $this->tokens()->create([
            'name' => Str::slug("device_name device_type access_token", '_'),
            'token' => hash('sha256', $plainTextToken = Str::random(40)),
            'abilities' => $abilities,
            // 'client_id' => 5,
        ]);
    }
}
