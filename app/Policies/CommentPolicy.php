<?php

namespace App\Policies;

use App\Http\Requests\api\comment\AddCommentRequest;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Food;
use App\Models\Order;
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

    public function create(User $user, $order_id)
    {

        $order = Order::query()->find($order_id);
        return $user->orders->contains($order)  && $order->situation === 'delivered' && $order->comment === null;

    }

    public function reply(User $user, $comment)
    {
        return $user->restaurant->orders()->has('comment')->get()->pluck('comment')->flatten()->contains($comment);
    }

    public function show(User $user, int $foodId)
    {
        return $user->restaurant->food->contains($foodId);
    }

    public function update(User $user,Comment $comment)
    {
        return ($user->restaurant->orders()->has('comment')->get()->pluck('comment')->flatten()->contains($comment));
    }

}
