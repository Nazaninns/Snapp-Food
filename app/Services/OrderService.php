<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;

class OrderService
{
    public static function create(Cart $cart)
    {
        $order=Order::query()->create([
            'restaurant_id' => $cart->restaurant_id,
            'user_id' => $cart->user_id,
            'address_id' => $cart->address_id,
            'total_price' => $cart->totalPrice(),
            'discount' => $cart->totalDiscount(),
            'delivery_cost' => $cart->restaurant->delivery_cost
        ]);
        $cart->food->map(function (Food $food)use ($order,$cart){
            $order->food()->attach($food->id,['count'=>$food->pivot->count]);
            $cart->food()->detach($food->id);
        });
}
}
