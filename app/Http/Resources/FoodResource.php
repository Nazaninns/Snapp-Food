<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            "name" => $this->name,
            "ingredients" => $this->ingredients,
            "price" => $this->price,
            "image" => $this->image,
            "food_party" => [
                "count" => $this->foodParty?->count,
                "percent" => $this->foodParty?->percent
            ],
            'total price'=>$this->finalPrice()
        ];
    }
}
