<?php

namespace App\Http\Controllers\api;

use App\Events\WelcomeCustomerEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\api\address\UpdateAddressRequest;
use App\Http\Requests\api\auth\LoginRequest;
use App\Http\Requests\api\auth\RegisterRequest;
use App\Http\Requests\api\auth\UpdateInfoRequest;
use App\Models\Address;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Sanctum;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            Auth::user()->tokens()->delete();
            $token = Auth::user()->createToken('name');
            return Response()->json(['token' => $token->plainTextToken]);
        }

        return response()->json([
            'msg' => 'invalid login'
        ], 401);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::query()->create($request->validated());
        $user->assignRole('customer');
        WelcomeCustomerEvent::dispatch($user);
        $token = $user->createToken($user->name);
        return response()->json([
            'token' => $token->plainTextToken
        ]);
    }

    public function logout(Request $request)
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'msg' => 'logout successful'
        ]);
    }
    public function update(UpdateInfoRequest $request)
    {
        Auth::user()->update($request->validated());
        return response()->json([
            'msg' => 'update your information done'
        ]);
    }
}
