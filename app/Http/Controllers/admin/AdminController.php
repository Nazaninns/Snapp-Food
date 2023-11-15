<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __invoke()
    {
        $user=Auth::user();
        return view('admin.dashboard',compact('user'));
    }
}
