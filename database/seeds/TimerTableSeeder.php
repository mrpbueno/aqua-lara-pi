<?php

use App\Timer;
use Illuminate\Database\Seeder;

class TimerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<1440;$i++) {
            $secunds = intval($i%60);
            $total_minutes = intval($i/60);
            $minutes = $total_minutes%60;
            $hours = intval($total_minutes/60);
            Timer::create([
                'time' => "$hours:$minutes:$secunds",
                'light' => 0,
                'co2' => 0,
            ]);
        }
    }
}
