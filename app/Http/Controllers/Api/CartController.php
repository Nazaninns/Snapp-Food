<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\cart\CartRequest;
use App\Http\Requests\api\cart\CartUpdateRequest;
use App\Http\Requests\api\cart\PayRequest;
use App\Http\Resources\cart\CartResource;
use App\Http\Resources\cart\ShowCartResource;
use App\Models\Cart;
use App\Models\Discount;
use App\Services\CartService;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['data' => ['carts' => CartResource::collection(Auth::user()->carts)]]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add(CartRequest $request)
    {
        $validated = $request->validated();
        $this->authorize('add', [Cart::class, $validated['food_id']]);
        $cart = CartService::getCart($validated['food_id']);
        CartService::upsert($validated, $cart);
        return \response()->json(['data' => [
            'msg' => 'food added to cart successfully',
            'cart_id' => $cart->id
        ]]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CartUpdateRequest $request)
    {

        $validated = $request->validated();
        $cart = CartService::updateCart($validated['food_id'], $validated['count']);
        CartService::checkCount($validated['count'], $validated['food_id'], $cart);
        $cart = CartService::checkCartHasFood($cart);
        if (!$cart)
            return \response()->json(['data' => ['msg' => 'please create a new cart']]);
        return response()->json(['data' => ['msg' => 'updated cart']]);
    }

    public function pay(Cart $cart, PayRequest $request)
    {
        $this->authorize('pay', $cart);
        if (Auth::user()->getCurrentAddress() === null) return \response()->json(['msg' => 'set current address first'], 404);
        $discountId = Discount::query()->where('code', $request->validated('code'))->first()?->id;
        CartService::updateCartForPay($cart, $discountId);
        //CartService::updateFoodParty($cart);
        OrderService::create($cart);
        $cart->delete();
        return \response()->json(['msg' => 'submitted']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function info(Cart $cart)
    {
        $this->authorize('show', $cart);
        return \response()->json(['data' => new ShowCartResource($cart)]);
    }
}
