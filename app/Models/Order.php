<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;
protected $fillable=[
    'restaurant_id','user_id','pay','address_id','situation','total_price','discount','delivery_cost'
];
    public function food():BelongsToMany
    {
        return $this->belongsToMany(Food::class)->withPivot('count');
    }

    public function restaurant():BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
