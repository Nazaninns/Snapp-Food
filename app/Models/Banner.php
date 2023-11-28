<?php

namespace App\Models;

use App\Casts\ImageCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory;
    protected $fillable=[
        'message','image'
    ];
    protected $casts=[
        'image'=>ImageCast::class
    ];
}
