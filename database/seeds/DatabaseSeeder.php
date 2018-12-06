<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(LightingsTableSeeder::class);
        $this->call(GpioTableSeeder::class);
        $this->call(Co2sTableSeeder::class);

    }
}
