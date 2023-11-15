<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\SituationRequest;
use App\Models\Cart;
use Illuminate\Http\Request;

class SituationController extends Controller
{
    public function changeSituation(Cart $cart,SituationRequest $request)
    {
        $cart->update(['situation'=>$request->post('situation')]);
        return redirect()->route('seller.dashboard');
    }

    public function archive()
    {
        return view('seller.archive');
    }
}
