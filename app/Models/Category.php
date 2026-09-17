<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name', 'short_name', 'slug', 'image', 'item_count', 'show_in_grid', 'sort_order'];

    protected $casts = [
        'show_in_grid' => 'boolean',
    ];

    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }

    public function getShortNameAttribute($value): string
    {
        return $value ?: $this->attributes['name'];
    }
}
