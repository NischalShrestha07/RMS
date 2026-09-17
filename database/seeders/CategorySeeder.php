<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Burgers', 'slug' => 'burgers', 'image' => 'img/category/2.jpg', 'item_count' => 24, 'show_in_grid' => true, 'sort_order' => 1],
            ['name' => 'Pizza', 'slug' => 'pizza', 'image' => 'img/category/3.jpg', 'item_count' => 18, 'show_in_grid' => true, 'sort_order' => 2],
            ['name' => 'Fried Chicken', 'short_name' => 'Chicken', 'slug' => 'chicken', 'image' => 'img/category/4.jpg', 'item_count' => 15, 'show_in_grid' => true, 'sort_order' => 3],
            ['name' => 'Wraps', 'slug' => 'wraps', 'image' => 'img/category/5.jpg', 'item_count' => 12, 'show_in_grid' => true, 'sort_order' => 4],
            ['name' => 'Desserts', 'slug' => 'desserts', 'image' => 'img/category/6.jpg', 'item_count' => 20, 'show_in_grid' => true, 'sort_order' => 5],
            ['name' => 'Pasta', 'slug' => 'pasta', 'image' => 'img/category/1.jpg', 'item_count' => 10, 'show_in_grid' => false, 'sort_order' => 6],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
