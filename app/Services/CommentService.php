<?php

namespace App\Services;

use App\Http\Resources\comment\CommentResource;
use App\Models\Cart;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class CommentService
{
    public static function CommentSort(int $foodId)
    {
        $food = Food::query()->find($foodId);
        if (!Auth::user()->restaurant->food->contains($food)) return false;
        return $food->carts()->has('comments')->get()->pluck('comments')->flatten();
    }

    public static function getComments($validated)
    {
        if (isset($validated['restaurant_id'])) {
            $comments = Cart::query()->where('restaurant_id', $validated['restaurant_id'])->has('comments')->get()->pluck('comments')->flatten();

        }
        if (isset($validated['food_id'])) {
            $comments = Food::query()->find($validated['food_id'])->carts()->has('comments')->get()->pluck('comments')->flatten();

        }

        return $comments;
    }
}
