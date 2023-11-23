<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    public function archive()
    {
        $carts=Auth::user()->restaurant->carts()->where('situation','delivered')->get();
        return view('seller.archive.archive',compact('carts'));
    }

    public function show(Cart $cart)
    {
        if (Auth::user()->restaurant->carts->contains($cart))
        return view('seller.archive.show',compact('cart'));
        return redirect()->route('archive');
    }
}
