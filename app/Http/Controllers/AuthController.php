<?php

namespace App\Http\Controllers;

use App\Events\WelcomeSellerEvent;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Banner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        $banner=Banner::query()->inRandomOrder()->first();
        return view('login',compact('banner'));
    }

    public function loginSubmit(LoginRequest $request)
    {

        if (Auth::attempt($request->validated())) {
            session()->regenerate();
            if (Auth::user()->hasRole('admin'))
                $dashboard = 'admin.dashboard';
            if (Auth::user()->hasRole('seller'))
                $dashboard = 'seller.dashboard';
            return redirect()->route($dashboard);
        }
        return back()->withErrors([
            'email' => ['invalid login ']
        ]);
    }
    public function register()
    {
        return view('register');
    }

    public function registerSubmit(RegisterRequest $request)
    {
        $validated = $request->validated();
        $user = User::query()->create($validated);
        $user->assignRole('seller');
        WelcomeSellerEvent::dispatch($user);
        return redirect()->route('login');
    }

    public function home()
    {
        return view('home');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        return redirect()->route('login');
    }
}
