<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __invoke()
    {
        $user=Auth::user();
        return view('admin.dashboard',compact('user'));
    }
}