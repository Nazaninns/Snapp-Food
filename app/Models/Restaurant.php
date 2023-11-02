<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Restaurant extends Model
{
    use HasFactory;
 protected $fillable=[
     'name','phone','address','account_number','user_id'
 ];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function restaurant_categories(){
        return $this->belongsToMany(RestaurantCategory::class,'categories_restaurants');
    }
}
