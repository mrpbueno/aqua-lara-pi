<?php

use App\Co2;
use Illuminate\Database\Seeder;

class Co2sTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Co2::create([
            'start' => '10:00:00',
            'stop' => '17:00:00',
            'gpio' => 21,
            'power' => 1,
            'active' => 1
        ]);
    }
}
