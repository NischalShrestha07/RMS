<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name' => 'Sarab',
            'site_tagline' => 'Fast Food & Restaurant',
            'hero_badge' => '#1 Rated Fast Food Restaurant in New York',
            'hero_title' => 'Delicious <span class="hl">Fast Food</span><br/>for Every Moment',
            'hero_description' => 'Experience bold flavors crafted from premium ingredients. From crispy burgers to gourmet pizzas - every bite is an adventure worth savoring.',
            'hero_video_url' => 'https://www.youtube.com/watch?v=RXv_uIN6e-Y',
            'phone' => '+1 (800) 123-4567',
            'email' => 'hello@sarabfood.com',
            'address_short' => '42 Flavor Street, NY',
            'address_full' => '42 Flavor Street, Manhattan, New York, NY 10001',
            'free_delivery_tag' => 'Free Delivery Today!',
            'social_facebook' => '#',
            'social_instagram' => '#',
            'social_tiktok' => '#',
            'social_youtube' => '#',
            'social_twitter' => '#',
            'stat_happy_customers' => '850',
            'stat_menu_items' => '120',
            'stat_expert_chefs' => '15',
            'stat_experience_years' => '12',
            'footer_about' => "We bring the world's finest flavors together in a fast, friendly, and affordable experience. Every meal crafted with love.",
            'about_story' => "Founded in 2012, Sarab began as a small corner joint with a big dream - to serve food that brings people together. Today we're proud to serve thousands of happy customers every week with the same passion that started it all.",
            'copyright_year' => '2026',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
