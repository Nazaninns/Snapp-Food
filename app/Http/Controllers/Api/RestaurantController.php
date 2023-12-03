<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\restaurant\RestaurantRequest;
use App\Http\Resources\restaurant\RestaurantResource;
use App\Http\Resources\RestaurantCollection;
use App\Http\Resources\hehe;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Services\RestaurantFilterService;
use http\Env\Response;

class RestaurantController extends Controller
{
    public function index(RestaurantRequest $request)
    {
        //filtering
        $restaurants = RestaurantFilterService::restaurantFilter($request->validated());
        $restaurants=RestaurantFilterService::nearRestaurants($restaurants);
        if ($restaurants->isEmpty()) return response()->json(['msg'=>'not found'],404);
        return response()->json(['data'=>RestaurantResource::collection($restaurants)]);
    }

    public function show(Restaurant $restaurant)
    {
        return \response()->json(['data'=>new RestaurantResource($restaurant)]);
    }
}
