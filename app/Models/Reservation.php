<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['user_id', 'name', 'phone', 'email', 'guests', 'date', 'time', 'notes', 'status'];

    protected $casts = [
        'date' => 'date',
    ];
}
