<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\time\CloseRequest;
use App\Http\Requests\seller\time\UpdateRequest;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeController extends Controller
{
    public function index()
    {
        $times=Auth::user()->restaurant->times;

        return view('seller.time',compact('times'));
    }

    public function update(Time $time,UpdateRequest $request)
    {
        dd($request->validated());
    }

    public function close(Time $time)
    {
        dd('bye bye hehe');
    }

    public function someDay()
    {

    }

    public function someDayClose()
    {

    }

    public function allDay()
    {

    }

    public function allDayClose()
    {

    }
}
