<?php

namespace App\Http\Controllers\seller;

use App\Events\SituationChangeEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\seller\SituationRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Restaurant;
use App\Notifications\DeleteOrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class SituationController extends Controller
{
    public function changeSituation(Order $order,SituationRequest $request)
    {
        $this->authorize('update',$order);
        $order->update(['situation'=>$request->post('situation')]);
        SituationChangeEvent::dispatch($order);
        return redirect()->route('seller.dashboard');
    }

    public function delete(Order $order)
    {
        $this->authorize('delete',$order);
        $order->food()->detach();
        Notification::send($order->user,new DeleteOrderNotification($order));
        $order->delete();
        return redirect()->route('seller.dashboard');
    }
}
