<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    protected $fillable = ['name', 'role', 'years_experience', 'image', 'socials', 'sort_order'];

    protected $casts = [
        'socials' => 'array',
    ];
}
