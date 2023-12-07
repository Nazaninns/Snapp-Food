<?php

namespace App\Http\Resources\cart;

use App\Http\Resources\RestaurantResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowCartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'cart_id' => $this->id,
            'restaurant ' => new  RestaurantResource($this->restaurant),
                'restaurant_id' => $this->restaurant_id
            ,
            'food' => CartFoodResource::collection($this->food),
            'user' => [
                'user_id' => $this->user_id,
                'address_id' => $this->address_id,
            ],
            'discount'=>$this->totalDiscount(),
            'total_price'=>$this->totalPriceAfterDiscount()
        ];
    }
}
