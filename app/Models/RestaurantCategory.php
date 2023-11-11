<?php

namespace App\Models;

use App\Casts\ImageCast;
use App\Casts\PhoneCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantCategory extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','image'
    ];
protected $casts=[
    'image'=>ImageCast::class,
    'phone'=>PhoneCast::class
];
    public function restaurants(){
        return $this->belongsToMany(Restaurant::class,'categories_restaurants');
    }
}
