<?php

namespace App\Models;

use App\Casts\PhoneCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone', 'account_number', 'user_id'
    ];
    protected $casts = [
        'phone' => PhoneCast::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function restaurantCategories()
    {
        return $this->belongsToMany(RestaurantCategory::class, 'categories_restaurants');
    }

    public function food(): HasMany
    {
        return $this->hasMany(Food::class);
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function address():MorphOne
    {
        return $this->morphOne(Address::class,'addressable');
    }

    public function orders():HasMany
    {
        return $this->hasMany(Order::class);
    }
}

