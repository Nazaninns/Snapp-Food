<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Food extends Model
{
    use HasFactory;
protected $fillable=[
    'id','name','ingredients','price','image','food_category_id','restaurant_id'
];
    public function foodCategory():BelongsTo
    {
        return $this->belongsTo(FoodCategory::class);
    }
}
