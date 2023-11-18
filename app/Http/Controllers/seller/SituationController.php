<?php

namespace App\Http\Controllers\seller;

use App\Events\SituationChangeEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\seller\SituationRequest;
use App\Models\Cart;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SituationController extends Controller
{
    public function changeSituation(Cart $cart,SituationRequest $request)
    {
        $cart->update(['situation'=>$request->post('situation')]);
        SituationChangeEvent::dispatch($cart);
        return redirect()->route('seller.dashboard');
    }

    public function archive()
    {
        $carts=Auth::user()->restaurant->carts()->where('situation','delivered')->get();
        return view('seller.archive',compact('carts'));
    }
}
