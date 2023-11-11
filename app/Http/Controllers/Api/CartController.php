<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\cart\CartRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Food;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $validated = $request->validated();
        $restaurantId = Food::query()->find($validated['food_id'])->restaurant_id;
        $cart = $user->carts()->where(['restaurant_id' => $restaurantId, 'pay' => null])->get()->first();
        $cartExist = $cart?->toArray();
        if (empty($cartExist)) {
            $cart = Cart::query()->create([
                'restaurant_id' => $restaurantId,
                'user_id' => Auth::id()
            ]);
        }
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
        $user = Auth::user();
        $validated = $request->validated();
        $restaurantId = Food::query()->find($validated['food_id'])->restaurant_id;
        $cart = $user->carts()->where(['restaurant_id' => $restaurantId, 'pay' => null])->get()->first();
        $cart?->food()->updateExistingPivot($validated['food_id'], [
            'count' => $validated['count']
        ]);
        if ($cart == null)
            return \response()->json(['msg' => 'please create a new cart']);
        return response()->json(['msg' => 'updated cart']);
    }

    public function pay(Cart $cart)
    {
        Cart::query()->update(['pay' => now()->toDateTimeString()]);
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
