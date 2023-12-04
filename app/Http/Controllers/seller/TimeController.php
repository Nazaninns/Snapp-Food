<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\time\UpdateRequest;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function index()
    {
        return view('seller.time');
    }

    public function update(UpdateRequest $request)
    {
        dd($request->validated());
    }

    public function close()
    {
        dd('bye bye hehe');
    }
}
