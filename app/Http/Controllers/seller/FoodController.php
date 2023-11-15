<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\FoodRequest;
use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (\request()->get('sort') == 'asc')
            $foods =Food::query()->where(['restaurant_id'=>Auth::user()->restaurant->id])->orderBy('name')->paginate(4);
        elseif (\request()->get('sort') == 'desc')
            $foods = Food::query()->where(['restaurant_id'=>Auth::user()->restaurant->id])->orderByDesc('name')->paginate(4);
        else
        $foods = Food::query()->where(['restaurant_id'=>Auth::user()->restaurant->id])->paginate(4);
        if (\request()->get('filter')!== null)
            $foods=Food::query()->where([
                'food_category_id'=>\request()->get('filter'),
                'restaurant_id'=>Auth::user()->restaurant->id
                ])->paginate(4);
        $foodCategories = FoodCategory::all();
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
