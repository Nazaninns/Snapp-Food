<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\address\StoreAddressRequest;
use App\Http\Requests\api\address\UpdateAddressRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Auth::user()->addresses;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAddressRequest $request)
    {
        $validated=$request->validated();
        $validated['user_id']=Auth::user()->id;
        Address::query()->create($validated);
        return "address added successfully";
    }

    public function current(Address $address)
    {
        $addresses = Auth::user()->addresses;
        foreach ($addresses as $value){
            $value->current_address=0;
            $value->save();
        }
        $address->current_address=1;
        $address->save();
        return 'current address updated successfully';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
    $address->update($request->validated());
    return 'update your address done';
    }
}