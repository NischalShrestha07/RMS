<?php

namespace Database\Seeders;

use App\Models\BusinessHour;
use Illuminate\Database\Seeder;

class BusinessHourSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['day_label' => 'Monday - Tuesday', 'open_time' => null, 'close_time' => null, 'is_closed' => true, 'sort_order' => 1],
            ['day_label' => 'Wednesday - Thursday', 'open_time' => '09:00 AM', 'close_time' => '10:00 PM', 'is_closed' => false, 'sort_order' => 2],
            ['day_label' => 'Friday', 'open_time' => '09:00 AM', 'close_time' => '11:00 PM', 'is_closed' => false, 'sort_order' => 3],
            ['day_label' => 'Saturday', 'open_time' => '10:00 AM', 'close_time' => '11:30 PM', 'is_closed' => false, 'sort_order' => 4],
            ['day_label' => 'Sunday', 'open_time' => '11:00 AM', 'close_time' => '09:00 PM', 'is_closed' => false, 'sort_order' => 5],
        ];

        foreach ($rows as $row) {
            BusinessHour::updateOrCreate(['day_label' => $row['day_label']], $row);
        }
    }
}
