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
        $this->authorize('create',[FoodParty::class,$food]);
        return view('seller.party.create', compact('food'));
    }

    public function partyStore(Food $food, FoodPartyRequest $request)
    {
        $this->authorize('create',[FoodParty::class,$food]);
        $validated = $request->validated();
        $validated['food_id'] = $food->id;
        FoodParty::query()->create($validated);
        return redirect()->route('food.index');
    }

    public function edit(FoodParty $foodParty)
    {
        $food=$foodParty->food;
        $this->authorize('update',$foodParty);
        return view('seller.party.edit',compact('food','foodParty'));
    }

    public function partyUpdate(FoodPartyRequest $request , FoodParty $foodParty)
    {
        $this->authorize('update',$foodParty);
        $foodParty->update($request->validated());
        return redirect()->route('food.index');
    }
    public function delete(FoodParty $foodParty)
    {
        $this->authorize('delete',$foodParty);
        $foodParty->delete();
        return redirect()->route('food.index');
    }
}
