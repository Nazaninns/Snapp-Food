<?php

namespace App\Http\Controllers\seller;

use App\Events\RestaurantCreateEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\seller\RestaurantSettingRequest;
use App\Http\Requests\seller\ResturantProfileRequest;
use App\Http\Requests\seller\SortSituationRequest;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Services\PaginateService;
use App\Services\SituationService;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function dashboard(SortSituationRequest $request,PaginateRequest $paginateRequest)
    {
        if (Auth::user()->restaurant == null)
            return redirect()->route('seller.profile');
        $situation = $request->validated('situation');
        $user = Auth::user();
        $orders=SituationService::sortOrders($situation);
        $orders=PaginateService::paginate($paginateRequest->validated('paginate'),$orders);
        return view('seller.dashboard', compact(['user', 'orders']));
    }

    public function restaurantProfile()
    {
        if (Auth::user()->restaurant !== null)
            return redirect()->route('seller.setting');
        $categories = RestaurantCategory::all();
        return view('seller.profile', compact('categories'));
    }

    public function profileStore(ResturantProfileRequest $request)
    {

        $validated = $request->validated();
        $types = $request->validated('type');
        $validated['user_id'] = Auth::id();
        $restaurant = Restaurant::query()->create($validated);
        RestaurantCreateEvent::dispatch($restaurant);
        $restaurant->address()->create($validated);
        $restaurant->restaurantCategories()->sync($types);
        return redirect()->route('seller.dashboard');
    }

    public function restaurantSetting()
    {
        $restaurant = Auth::user()->restaurant;
        $restaurantCategories = RestaurantCategory::all();
        return view('seller.setting', compact('restaurant', 'restaurantCategories'));
    }

    public function updateSetting(RestaurantSettingRequest $request, Restaurant $restaurant)
    {
        $validated = $request->validated();
        $types = $validated['type'];
        $restaurant->address()->update([
            'address' => $validated['address'],
            'latitude' => $validated['latitude'],
            'longitude' => $validated['longitude']
        ]);
        $restaurant->update($request->validated());
        $restaurant->restaurantCategories()->sync($types);
        return redirect()->route('seller.dashboard');
    }


}
