<?php

use App\Lighting;
use Illuminate\Database\Seeder;

class LightingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lighting::create([
            'sunrise_start' => '10:00:00',
            'sunrise_stop' => '10:50:00',
            'sunset_start' => '18:00:00',
            'sunset_stop' => '18:50:00',
            'gpio' => 18,
            'power' => 1.00,
            'max' => 1.00,
            'offset' => 0.02,
            'active' => 1
        ]);
    }
}
