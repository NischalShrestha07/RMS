<?php

namespace Database\Seeders;

use App\Models\GalleryItem;
use Illuminate\Database\Seeder;

class GalleryItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['title' => 'Gourmet Burgers', 'description' => 'Our award-winning smash burgers, hand-crafted with 100% premium beef, aged cheddar and house-made sauces.', 'image' => 'img/portfolio/work1.jpg', 'sort_order' => 1],
            ['title' => 'Wood-Fired Pizza', 'description' => 'Authentic Neapolitan-style pizzas fired at 900deg F in our wood-burning stone oven for the perfect char.', 'image' => 'img/portfolio/work2.jpg', 'sort_order' => 2],
            ['title' => 'Crispy Fried Chicken', 'description' => 'Double-brined, hand-battered chicken fried to golden perfection using our 15-spice secret blend.', 'image' => 'img/portfolio/work3.jpg', 'sort_order' => 3],
            ['title' => 'Sweet Desserts', 'description' => 'Handcrafted desserts - from molten lava cakes to artisan ice cream sundaes and seasonal pastries.', 'image' => 'img/portfolio/work4.jpg', 'sort_order' => 4],
            ['title' => 'Fresh Wraps & Rolls', 'description' => 'Loaded fresh wraps packed with grilled proteins, crunchy vegetables and our house-made sauces.', 'image' => 'img/portfolio/work5.jpg', 'sort_order' => 5],
        ];

        foreach ($items as $item) {
            GalleryItem::updateOrCreate(['title' => $item['title']], $item);
        }
    }
}
