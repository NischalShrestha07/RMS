<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialOffer extends Model
{
    protected $fillable = ['title', 'description', 'old_price', 'new_price', 'image', 'ends_at', 'is_active'];

    protected $casts = [
        'ends_at' => 'datetime',
        'is_active' => 'boolean',
    ];
}
