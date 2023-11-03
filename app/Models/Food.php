<?php

namespace App\Models;

use App\Casts\ImageCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
protected $casts=[
    'image'=>ImageCast::class
];
    public function priceAfterDiscount(){
        return $this->price * (100 - $this->percent)/100 ;
    }

    public function restaurant():BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function foodParties():HasMany
    {
        return $this->hasMany(FoodParty::class);
    }
}
