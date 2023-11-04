<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\auth\LoginRequest;
use App\Http\Requests\api\auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Sanctum;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $token = Auth::user()->createToken('hehe');
            return ['token' => $token->plainTextToken];
        }
        return 'invalid login';
    }

    public function register(RegisterRequest $request)
    {
        $user = User::query()->create($request->validated());
        $token = $user->createToken($user->name);
        return [
            'token' => $token->plainTextToken
        ];
    }

    public function logout(Request $request)
    {
        Auth::user()->currentAccessToken()->delete();
        return 'logout successful';
    }
}
