<?php

namespace Database\Seeders;

use App\Models\SpecialOffer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SpecialOfferSeeder extends Seeder
{
    public function run(): void
    {
        SpecialOffer::updateOrCreate(
            ['title' => 'Get 30% Off Our Signature Burger Meal'],
            [
                'description' => "Don't miss our weekend special - grab our award-winning signature burger combo with loaded fries and a premium shake at an unbeatable price.",
                'old_price' => 24.99,
                'new_price' => 17.49,
                'image' => 'img/off-img.jpg',
                'ends_at' => Carbon::now()->addHours(8)->addMinutes(45)->addSeconds(30),
                'is_active' => true,
            ]
        );
    }
}
