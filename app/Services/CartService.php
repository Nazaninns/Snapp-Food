<?php

namespace App\Services;


use App\Http\Requests\api\cart\CartRequest;
use App\Models\Cart;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public static function upsert($validated,$cart)
    {
        $oldCount = $cart->food()->find($validated['food_id'])?->pivot->count;
        DB::table('food_carts')->updateOrInsert(['cart_id' => $cart->id, 'food_id' => $validated['food_id']], ['count' => $oldCount + $validated['count']]);
    }
}
