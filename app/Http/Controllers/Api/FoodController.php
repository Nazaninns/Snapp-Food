<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodCollection;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        //collection
        // return $restaurant->food()->get()->groupBy('food_category_id');
        //sql
        //return $restaurant->food()->groupBy('food_category_id')->get();
        $food = $restaurant->food()->get()->groupBy(function (Food $food) {
            return $food->foodCategory->name;
        });
        return new FoodCollection($food);

    }

}
