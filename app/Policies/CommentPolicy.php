<?php

namespace App\Policies;

use App\Http\Requests\api\comment\AddCommentRequest;
use App\Models\Cart;
use App\Models\Food;
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

    public function create(User $user, $cart_id)
    {

        $cart = Cart::query()->find($cart_id);
        //dd($user->carts);
        return $user->carts->contains($cart) && $cart->pay !== null && $cart->situation === 'delivered';

    }

    public function reply(User $user, $comment)
    {
        return $user->restaurant->carts()->has('comments')->get()->pluck('comments')->flatten()->contains($comment);
    }

    public function show(User $user, int $foodId)
    {
        return $user->restaurant->food->contains($foodId);
    }

}
