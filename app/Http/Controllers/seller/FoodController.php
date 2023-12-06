<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\seller\FilterFoodRequest;
use App\Http\Requests\seller\FoodRequest;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Services\FoodService;
use App\Services\PaginateService;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->authorizeResource(Food::class, 'food');
    }

    public function index(FilterFoodRequest $foodRequest, PaginateRequest $request)
    {
        $foods = FoodService::filterFood($foodRequest);
        $foodCategories = FoodCategory::all();
        $foods = PaginateService::paginate($request->validated('paginate'), $foods);
        return view('seller.food.index', compact('foods', 'foodCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $foodCategories = FoodCategory::all();
        return view('seller.food.create', compact('foodCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodRequest $request)
    {
        $validated = $request->validated();
        $validated['restaurant_id'] = Auth::user()->restaurant->id;
        Food::query()->create($validated);
        return redirect()->route('food.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        return view('seller.food.show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        $foodCategories = FoodCategory::all();
        return view('seller.food.edit', compact('food', 'foodCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodRequest $request, Food $food)
    {
        $food->update($request->validated());
        return redirect()->route('food.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->route('food.index');
    }

    // public function partySubmit(Request $request,Food $food){}
    // public function partyDestroy(Request $request,Food $food){}
}
