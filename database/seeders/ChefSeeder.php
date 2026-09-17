<?php

namespace Database\Seeders;

use App\Models\Chef;
use Illuminate\Database\Seeder;

class ChefSeeder extends Seeder
{
    public function run(): void
    {
        $chefs = [
            ['name' => 'Alice Mortal', 'role' => 'Head Chef', 'years_experience' => 12, 'image' => 'img/chefs/1.jpg', 'sort_order' => 1],
            ['name' => 'Michael Corn', 'role' => 'Grill Master', 'years_experience' => 8, 'image' => 'img/chefs/2.jpg', 'sort_order' => 2],
            ['name' => 'Faz Chowdel', 'role' => 'Pastry Chef', 'years_experience' => 10, 'image' => 'img/chefs/3.jpg', 'sort_order' => 3],
            ['name' => 'William Latnum', 'role' => 'Pizza Artisan', 'years_experience' => 9, 'image' => 'img/chefs/4.jpg', 'sort_order' => 4],
        ];

        foreach ($chefs as $chef) {
            Chef::updateOrCreate(['name' => $chef['name']], $chef + [
                'socials' => ['instagram' => '#', 'facebook' => '#', 'twitter' => '#'],
            ]);
        }
    }
}
