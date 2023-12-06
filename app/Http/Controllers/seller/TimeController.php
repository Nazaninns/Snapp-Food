<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\time\CloseRequest;
use App\Http\Requests\seller\time\UpdateRequest;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TimeController extends Controller
{
    public function index()
    {
        $times = Auth::user()->restaurant->times;

        return view('seller.time', compact('times'));
    }

    public function update(Time $time, UpdateRequest $request)
    {
        $this->authorize('update',  $time);
        $time->update($request->validated());
        return redirect()->route('time.index');
    }

    public function close(Time $time)
    {
        $this->authorize('close',  $time);
        $time->update([
            'start_time' => null,
            'end_time' => null
        ]);
        return redirect()->route('time.index');
    }

    public function someDay(UpdateRequest $request)
    {
        Auth::user()->restaurant->times()->where([
            ['day', '!=', 'thursday'],
            ['day', '!=', 'friday'],
        ])->update($request->validated());
        return redirect()->route('time.index');
    }

    public function someDayClose()
    {
        Auth::user()->restaurant->times()->where([
            ['day', '!=', 'thursday'],
            ['day', '!=', 'friday'],
        ])->update([
            'start_time' => null,
            'end_time' => null
        ]);
        return redirect()->route('time.index');
    }

    public function allDay(UpdateRequest $request)
    {
        Auth::user()->restaurant->times()->update($request->validated());
        return redirect()->route('time.index');
    }

    public function allDayClose()
    {
        Auth::user()->restaurant->times()->update([
            'start_time' => null,
            'end_time' => null
        ]);
        return redirect()->route('time.index');
    }
}
