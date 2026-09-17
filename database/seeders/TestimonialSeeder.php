<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['name' => 'Monica Wilber', 'role' => 'Regular Customer', 'message' => "Honestly the best burgers I've ever had. The smash burger is incredible - perfectly crispy edges, juicy inside, and those pickles! We come every Friday now.", 'rating' => 5, 'image' => 'img/testimonial/1.jpg', 'sort_order' => 1],
            ['name' => 'Cameron Fox', 'role' => 'Food Blogger', 'message' => 'Ordered delivery and the food arrived hot and fresh in 22 minutes. Portions are generous. Sarab has become my go-to comfort food spot without question.', 'rating' => 5, 'image' => 'img/testimonial/2.jpg', 'sort_order' => 2],
            ['name' => 'Priya Sharma', 'role' => 'Food Enthusiast', 'message' => "The truffle pasta blew my mind. I didn't expect that quality from a fast food place. Great ambiance, super friendly staff. Highly recommended!", 'rating' => 5, 'image' => 'img/testimonial/3.jpg', 'sort_order' => 3],
            ['name' => 'David Park', 'role' => 'Corporate Client', 'message' => 'Catered our office party of 50 people and everything was flawless. Fresh, delicious, on time and well presented. Nashville chicken was the absolute star!', 'rating' => 5, 'image' => 'img/testimonial/4.jpg', 'sort_order' => 4],
        ];

        foreach ($items as $item) {
            Testimonial::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}
