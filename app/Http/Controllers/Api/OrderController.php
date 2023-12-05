<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function active()
    {
        $orders = Auth::user()->orders()->where('situation', '!=', 'delivered')->get();
        return response()->json(['data' => $orders]);
    }

    public function deActive()
    {
        $orders = Auth::user()->orders()->where('situation', 'delivered')->get();
        return response()->json(['data' => $orders]);
    }

    public function show(Order $order)
    {
        $this->authorize('show', [Order::class, $order]);
        return response()->json(['data' => $order]);
    }
}
