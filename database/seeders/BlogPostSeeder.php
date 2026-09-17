<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            ['title' => 'Healthy Fast Food: A Myth or Beautiful Reality', 'tag' => 'Food & Health', 'author' => 'James Writer', 'image' => 'img/blog/1.jpg', 'published_at' => '2026-03-14', 'comments_count' => 24],
            ['title' => "Is Fast Food Getting Healthier? Here's What We Found", 'tag' => 'Food Science', 'author' => 'Sarah Grain', 'image' => 'img/blog/2.jpg', 'published_at' => '2026-02-28', 'comments_count' => 18],
            ['title' => "Innovative Hot Chickpeas Flake Crackin' Recipe at Home", 'tag' => 'Recipes', 'author' => 'Chef Marcus', 'image' => 'img/blog/3.jpg', 'published_at' => '2026-01-05', 'comments_count' => 32],
        ];

        foreach ($posts as $post) {
            BlogPost::updateOrCreate(['title' => $post['title']], $post + [
                'slug' => Str::slug($post['title']),
                'excerpt' => $post['title'],
            ]);
        }
    }
}
