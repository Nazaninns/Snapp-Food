<?php

namespace App\Services;

use App\Http\Resources\comment\CommentResource;
use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;
use App\Models\Reply;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class CommentService
{
    public static function CommentSort(int $foodId)
    {
        $food = Food::query()->find($foodId);
        return $food->orders()->has('comment')->get()->pluck('comment')->flatten();
    }

    public static function reply($validated,$comment)
    {
        $validated['restaurant_id'] = Auth::user()->restaurant->id;
        $validated['comment_id'] = $comment->id;
        Reply::query()->create($validated);
        $comment->situation = 'replied';
        $comment->save();
    }
    public static function getComments($validated)
    {
        if (isset($validated['restaurant_id'])) {
            $comments = Order::query()->where('restaurant_id', $validated['restaurant_id'])->has('comment')->get()->pluck('comment')->flatten();

        }
        if (isset($validated['food_id'])) {
            $comments = Food::query()->find($validated['food_id'])->orders()->has('comment')->get()->pluck('comment')->flatten();

        }

        return $comments;
    }
}
