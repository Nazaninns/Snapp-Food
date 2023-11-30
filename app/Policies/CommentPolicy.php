<?php

namespace App\Policies;

use App\Http\Requests\api\comment\AddCommentRequest;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {

    }

    public function create(User $user,$cart_id)
    {

        $cart=Cart::query()->find($cart_id);
        //dd($user->carts);
        return $user->carts->contains($cart)&&$cart->pay!==null;

    }
}
