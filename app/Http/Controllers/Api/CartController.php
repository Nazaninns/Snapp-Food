<?php

namespace App\Http\Controllers\api;

use App\Events\SituationChangeEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\api\cart\CartRequest;
use App\Http\Requests\api\cart\PayRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Discount;
use App\Models\Food;
use App\Models\FoodParty;
use App\Models\Order;
use App\Models\User;
use App\Services\CartService;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Readline\Hoa\Event;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['carts' => CartResource::collection(Auth::user()->carts)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add(CartRequest $request)
    {
        $validated = $request->validated();
        $cart = CartService::getCart($validated['food_id']);
        $cart->food()->attach($validated['food_id'], [
            'count' => $validated['count']
        ]);
        return \response()->json([
            'msg' => 'food added to cart successfully',
            'cart_id' => $cart->id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CartRequest $request)
    {

        $validated = $request->validated();
        $cart = CartService::updateCart($validated['food_id']);
        $cart?->food()->updateExistingPivot($validated['food_id'], [
            'count' => $validated['count']
        ]);
        if ($cart == null)
            return \response()->json(['msg' => 'please create a new cart']);
        return response()->json(['msg' => 'updated cart']);
    }

    public function pay(Cart $cart, PayRequest $request)
    {
        if (Auth::user()->getCurrentAddress() === null) return \response()->json(['msg' => 'set current address first'], 404);
        $discountId = Discount::query()->where('code', $request->validated('code'))->first()?->id;
        $cart->update([
            'discount_id' => $discountId,
            'address_id' => Auth::user()->getCurrentAddress()->id
        ]);
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
        SituationChangeEvent::dispatch($cart);
        return \response()->json(['msg' => 'submitted']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function info(Cart $cart)
    {
        return \response()->json($cart);
    }
}
