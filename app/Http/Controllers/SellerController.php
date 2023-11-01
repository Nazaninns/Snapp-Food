<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantSettingRequest;
use App\Http\Requests\ResturantProfileRequest;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->restaurant==null)
            return redirect()->route('seller.profile');

        $user=Auth::user();
        return view('seller.dashboard',compact('user'));
    }

    public function restaurantProfile()
    {
        $categories=RestaurantCategory::all();
        return view('seller.profile',compact('categories'));
    }

    public function profileStore(ResturantProfileRequest $request)
    {
        $validated=$request->validated();
        $validated['user_id']=Auth::id();
        Restaurant::query()->create($validated);
        return redirect()->route('seller.dashboard');
    }
    public function restaurantSetting()
    {
        $restaurant=Auth::user()->restaurant;
        $restaurantCategories=RestaurantCategory::all();
        return view('seller.setting',compact('restaurant','restaurantCategories'));
    }

    public function updateSetting(RestaurantSettingRequest $request,Restaurant $restaurant)
    {
        $types=$request->validated()['type'];
        $restaurant->update($request->validated());
        return redirect()->route('seller.dashboard');
    }
}
