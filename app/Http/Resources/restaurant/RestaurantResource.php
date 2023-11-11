<?php

namespace App\Http\Resources\restaurant;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->name,
            'type'=>$this->restaurantCategories->pluck('name'),
            'address'=>$this->address,
            'is_open'=>$this->is_open,
            'image'=>$this->image,
            'score'=>$this->score,
            'comment_count'=>count($this->carts()->with('comments')->getRelation('comments')->get())
        ];
    }
}
