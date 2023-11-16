<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\address\StoreAddressRequest;
use App\Http\Requests\api\address\UpdateAddressRequest;
use App\Http\Resources\address\AddressResource;
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
        return response()->json(
            AddressResource::collection(Auth::user()->addresses)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAddressRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->id;
        Address::query()->create($validated);
        return response()->json([
            'msg' => "address added successfully"
        ], 201);
    }

    public function current(Address $address)
    {
        Auth::user()->addresses()->update([
            'current_address' => 0
        ]);
        if ($address->user_id !== Auth::id()) {
           return response()->json([
                'msg' => 'address not found'
            ], 404);
        }
        $address->current_address = 1;
        $address->save();
        return response()->json([
            'msg' => 'current address updated successfully'
        ]);
    }
}
