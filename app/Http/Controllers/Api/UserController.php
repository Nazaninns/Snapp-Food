<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\auth\UpdateInfoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function update(UpdateInfoRequest $request)
    {

        Auth::user()->update($request->validated());
        return response()->json([
            'msg' => 'update your information done'
        ]);
    }
}
