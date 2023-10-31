<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())){
            session()->regenerate();
           return redirect()->route('home');
        }
        return back()->withErrors([
            'email'=>['invalid login ']
        ]);
    }

    public function register()
    {
        return view('register');
    }

    public function registerSubmit(RegisterRequest $request)
    {
        $validated=$request->validated();
        //$validated['role']=2;
        User::query()->create($validated);
        return redirect()->route('login');
    }
}
