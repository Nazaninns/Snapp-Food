<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\seller\FoodPartyRequest;
use App\Models\Food;
use App\Models\FoodParty;
use App\Services\PaginateService;

class FoodPartyController extends Controller
{
    public function index(PaginateRequest $request){
        $parties = FoodParty::query();
        $parties=PaginateService::paginate($request->validated('paginate'),$parties);
        return view('seller.party.index',compact('parties'));
    }

    public function create(Food $food)
    {
        return view('seller.party.create', compact('food'));
    }

    public function partyStore(Food $food, FoodPartyRequest $request)
    {
        $validated = $request->validated();
        $validated['food_id'] = $food->id;
        FoodParty::query()->create($validated);
        return redirect()->route('food.index');
    }

    public function edit(Food $food,FoodParty $foodParty)
    {
        return view('seller.party.edit',compact('food','foodParty'));
    }

    public function partyUpdate(FoodPartyRequest $request , FoodParty $foodParty)
    {
        $foodParty->update($request->validated());
        return redirect()->route('food.index');
    }
    public function delete(FoodParty $foodParty)
    {
        $foodParty->delete();
        return redirect()->route('food.index');
    }
}
