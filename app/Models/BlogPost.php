<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'title', 'slug', 'tag', 'author', 'image',
        'published_at', 'comments_count', 'excerpt', 'body',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];
}
