<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\GearRatio;
use App\Models\Rider;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Vehicle::create([
            'name' => 'yamaha r1',
            'torque' => 115.5,
            'power' => 133.9,
            'shifting_rpm' => 12500,
            'limit_rpm' => 14000,
            'weight' => 206,
            'mass' => 20.9,
            'wheel_rad' => 0.3204,
            'primary_gear_ratio' => number_format(65/43, 3),
            'gear_ratio_1' => number_format(38/15, 3),
            'gear_ratio_2' => number_format(33/16, 3),
            'gear_ratio_3' => number_format(37/21, 3),
            'gear_ratio_4' => number_format(35/23, 3),
            'gear_ratio_5' => number_format(30/22, 3),
            'gear_ratio_6' => number_format(33/26, 3),
            'secondary_gear_ratio' => number_format(47/17,3),
            'photo' => 'yamaha-r1.jpg'
        ]);

        Vehicle::create([
            'name' => 'yamaha vixion 2013',
            'torque' => 14.5,
            'power' => 12.175,
            'shifting_rpm' => 8500,
            'limit_rpm' => 10500,
            'weight' => 129,
            'mass' => 13.15,
            'wheel_rad' => 0.3,
            'primary_gear_ratio' => number_format(73/24, 3),
            'gear_ratio_1' => number_format(34/12, 3),
            'gear_ratio_2' => number_format(30/16, 3),
            'gear_ratio_3' => number_format(30/21, 3),
            'gear_ratio_4' => number_format(24/21, 3),
            'gear_ratio_5' => number_format(22/23, 3),
            'gear_ratio_6' => number_format(0, 3),
            'secondary_gear_ratio' => number_format(43/14,3),
            'photo' => 'yamaha-vixion-2013.jpg'
        ]);

        Rider::create([
            'name' => 'ngab owi',
            'weight' => 64,
            'mass' => 6.52
        ]);
    }
}
