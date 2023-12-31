<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'address', 'current_address', 'latitude', 'longitude'
    ];

    public function addressable():MorphTo
    {
        return $this->morphTo();
    }
}
