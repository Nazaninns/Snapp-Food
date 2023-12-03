<?php

namespace App\Services;


use App\Http\Requests\api\cart\CartRequest;
use App\Models\Cart;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;

class CartService
{
    public static function getCart($foodId)
    {
        $user = Auth::user();
        $restaurantId = Food::query()->find($foodId)->restaurant_id;
        $cart = $user->carts()->where('restaurant_id' , $restaurantId)->firstOrCreate([
            'restaurant_id' => $restaurantId,
            'user_id' => Auth::id()
        ]);
        return $cart;
    }

    public static function updateCart($foodId)
    {
        $user = Auth::user();
        $restaurantId = Food::query()->find($foodId)->restaurant_id;
        $cart = $user->carts()->where('restaurant_id' ,$restaurantId)->get()->first();
        return $cart;
    }

    public static function updateCartForPay(Cart $cart,$discountId)
    {

        $cart->update([
            'discount_id' => $discountId,
            'address_id' => Auth::user()->getCurrentAddress()->id
        ]);
    }
}
