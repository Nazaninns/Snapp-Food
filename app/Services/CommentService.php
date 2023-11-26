<?php

namespace App\Services;

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
}
