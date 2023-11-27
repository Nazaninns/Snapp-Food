<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\DateRequest;
use App\Models\Cart;
use App\Services\ArchiveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    public function archive(DateRequest $request)
    {
        $carts = ArchiveService::sortArchiveByDate($request->validated('from'), $request->validated('to'));
        return view('seller.archive.archive', compact('carts'));
    }

    public function show(Cart $cart)
    {
        if (Auth::user()->restaurant->carts->contains($cart))
            return view('seller.archive.show', compact('cart'));
        return redirect()->route('archive');
    }

    public function date(DateRequest $request)
    {
        $time = now()->toDateString();
        echo '<br>';
        echo $time;
        echo '<br>';
        if ($time < $request->validated('to')) return 'before';
        return (int)false;
    }
}
