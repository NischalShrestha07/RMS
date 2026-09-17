<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'category' => 'burgers',
                'title' => 'Classic Smash Burger',
                'short_description' => 'Double smashed patty, cheddar, caramelized onions, pickles & special sauce',
                'description' => 'Double smashed patty, cheddar cheese, caramelized onions, house pickles and our legendary special sauce. Made fresh to order on a toasted brioche bun.',
                'price' => 14.99, 'old_price' => 18.99,
                'rating' => 4.9, 'reviews_count' => 128,
                'calories' => 620, 'prep_time_minutes' => 12,
                'image' => 'img/menu/1.jpg',
                'badge_type' => 'hot', 'badge_label' => 'Hot',
                'tags' => ['Spicy', 'Bestseller', 'Beef'],
                'sort_order' => 1,
            ],
            [
                'category' => 'pizza',
                'title' => 'Margherita Royale',
                'short_description' => 'San Marzano tomatoes, buffalo mozzarella, basil & truffle oil on sourdough',
                'description' => 'San Marzano tomatoes, fresh buffalo mozzarella, fragrant basil leaves, drizzled with Italian truffle oil on a hand-stretched sourdough base.',
                'price' => 19.99, 'old_price' => 24.99,
                'rating' => 4.8, 'reviews_count' => 95,
                'calories' => 480, 'prep_time_minutes' => 18,
                'image' => 'img/menu/2.jpg',
                'badge_type' => 'new', 'badge_label' => 'New',
                'tags' => ['Vegetarian', 'New', 'Italian'],
                'sort_order' => 2,
            ],
            [
                'category' => 'chicken',
                'title' => 'Nashville Hot Chicken',
                'short_description' => 'Crispy fried chicken in fiery Nashville spice blend with honey drizzle',
                'description' => 'Extra-crispy fried chicken tossed in our signature fiery Nashville spice blend, served with honey drizzle and house pickles on a toasted brioche bun.',
                'price' => 12.99, 'old_price' => 16.99,
                'rating' => 5.0, 'reviews_count' => 210,
                'calories' => 710, 'prep_time_minutes' => 15,
                'image' => 'img/menu/3.jpg',
                'badge_type' => null, 'badge_label' => 'Best Seller',
                'tags' => ['Spicy', 'Bestseller', 'Crispy'],
                'sort_order' => 3,
            ],
            [
                'category' => 'wraps',
                'title' => 'Loaded Fajita Wrap',
                'short_description' => 'Grilled chicken, peppers, sour cream & guacamole in a warm tortilla',
                'description' => 'Grilled chicken strips, sautéed bell peppers and onions, sour cream, fresh guacamole and salsa wrapped in a warm flour tortilla with melted cheddar.',
                'price' => 10.99, 'old_price' => null,
                'rating' => 4.5, 'reviews_count' => 74,
                'calories' => 520, 'prep_time_minutes' => 10,
                'image' => 'img/menu/4.jpg',
                'badge_type' => null, 'badge_label' => null,
                'tags' => ['Grilled', 'Fresh', 'Mexican'],
                'sort_order' => 4,
            ],
            [
                'category' => 'desserts',
                'title' => 'Nutella Lava Cake',
                'short_description' => 'Molten chocolate cake with Nutella center, vanilla ice cream & caramel',
                'description' => 'Warm molten chocolate cake with a gooey Nutella center, served alongside Madagascar vanilla bean ice cream with salted caramel drizzle and fresh berries.',
                'price' => 8.99, 'old_price' => 11.99,
                'rating' => 4.9, 'reviews_count' => 56,
                'calories' => 390, 'prep_time_minutes' => 8,
                'image' => 'img/menu/5.jpg',
                'badge_type' => 'new', 'badge_label' => 'New',
                'tags' => ['Sweet', 'New', 'Chocolate'],
                'sort_order' => 5,
            ],
            [
                'category' => 'pasta',
                'title' => 'Truffle Mushroom Pasta',
                'short_description' => 'Al dente tagliatelle, wild mushrooms, black truffle, parmesan & thyme',
                'description' => 'Al dente tagliatelle tossed with mixed wild mushrooms, freshly shaved black truffle, aged parmesan, fresh thyme and a touch of cream in garlic butter.',
                'price' => 16.99, 'old_price' => null,
                'rating' => 4.9, 'reviews_count' => 88,
                'calories' => 560, 'prep_time_minutes' => 20,
                'image' => 'img/menu/6.jpg',
                'badge_type' => 'hot', 'badge_label' => "Chef's Pick",
                'tags' => ['Vegetarian', "Chef's Pick", 'Italian'],
                'sort_order' => 6,
            ],
        ];

        foreach ($items as $item) {
            $categoryId = Category::where('slug', $item['category'])->value('id');
            unset($item['category']);
            MenuItem::updateOrCreate(['title' => $item['title']], $item + ['category_id' => $categoryId]);
        }
    }
}
