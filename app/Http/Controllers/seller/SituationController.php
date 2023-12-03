<?php

namespace App\Http\Controllers\seller;

use App\Events\SituationChangeEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\seller\SituationRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SituationController extends Controller
{
    public function changeSituation(Order $order,SituationRequest $request)
    {
        $order->update(['situation'=>$request->post('situation')]);
        SituationChangeEvent::dispatch($order);
        return redirect()->route('seller.dashboard');
    }
}
