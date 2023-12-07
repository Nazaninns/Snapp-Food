<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\food\FoodResource;
use App\Models\Restaurant;

class FoodController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        //collection
        // return $restaurant->food()->get()->groupBy('food_category_id');
        //sql
        //return $restaurant->food()->groupBy('food_category_id')->get();

//        $food = $restaurant->food()->with('foodParty')->get()->groupBy(function (Food $food) {
//            return $food->foodCategory->name;
//        });
//        return response()->json(new FoodCollection($food));
        $food =FoodResource::collection($restaurant->food)->collection->groupBy(function (FoodResource $food) {
            return $food->foodCategory->name;
        });
        return response()->json(['data'=>$food]);

    }

}
