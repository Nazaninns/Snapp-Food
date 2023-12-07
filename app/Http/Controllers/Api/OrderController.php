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
        if (Auth::user()->orders->where('situation', '!=', 'delivered')->isEmpty()) return response()->json(['data' => ['msg' => 'not found']], 404);
        $orders = Auth::user()->orders()->where('situation', '!=', 'delivered')->get();
        return response()->json(['data' => $orders]);
    }

    public function deActive()
    {
        if (Auth::user()->orders->where('situation', '==', 'delivered')->isEmpty()) return response()->json(['data' => ['msg' => 'not found']], 404);
        $orders = Auth::user()->orders()->where('situation', 'delivered')->get();
        return response()->json(['data' => $orders]);
    }

    public function show(Order $order)
    {
        $this->authorize('show', $order);
        return response()->json(['data' => $order]);
    }
}
