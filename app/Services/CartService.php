<?php

namespace App\Services;


use App\Http\Requests\api\cart\CartRequest;
use App\Models\Cart;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class CartService
{
    public static function getCart($foodId)
    {
        $user = Auth::user();
        $restaurantId = Food::query()->find($foodId)->restaurant_id;
        $cart = $user->carts()->where('restaurant_id', $restaurantId)->firstOrCreate([
            'restaurant_id' => $restaurantId,
            'user_id' => Auth::id()
        ]);
        return $cart;
    }

    public static function updateCart($foodId, $count)
    {
        $user = Auth::user();
        $restaurantId = Food::query()->find($foodId)->restaurant_id;
        $cart = $user->carts()->where('restaurant_id', $restaurantId)->get()->first();
        $cart?->food()->updateExistingPivot($foodId, [
            'count' => $count
        ]);
        return $cart;
    }

    public static function checkCount($count, $foodId, $cart)
    {
        if ($count == 0)
            $cart->food()->detach($foodId);
    }

    public static function checkCartHasFood(Cart $cart)
    {
        if (($cart->food->isEmpty())) {
            $cart->delete();
            return false;
        }
        return true;
    }

    public static function updateCartForPay(Cart $cart, $discountId)
    {

        $cart->update([
            'discount_id' => $discountId,
            'address_id' => Auth::user()->getCurrentAddress()->id
        ]);
    }

    public static function upsert($validated, $cart)
    {
        $oldCount = $cart->food()->find($validated['food_id'])?->pivot->count;
        DB::table('food_carts')->updateOrInsert(['cart_id' => $cart->id, 'food_id' => $validated['food_id']], ['count' => $oldCount + $validated['count']]);
    }

    public static function updateFoodParty($cart)
    {
        $cart->food->filter(fn (Food $food) => $food->foodParty !== null)->map(fn ($food) => $food->foodParty->decreament('count',$food->pivot->count));
    }
}
