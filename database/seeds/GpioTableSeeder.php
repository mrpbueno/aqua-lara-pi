<?php

use Illuminate\Database\Seeder;

class GpioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gpio')->insert([
            ['pin' => 1, 'gpio' => NULL, 'type' => 'POWER', 'function' => '3V3',],
            ['pin' => 2, 'gpio' => NULL, 'type' => 'POWER', 'function' => '5V',],
            ['pin' => 3, 'gpio' => 2, 'type' => 'I2C', 'function' => 'SDA1',],
            ['pin' => 4, 'gpio' => NULL, 'type' => 'POWER', 'function' => '5V',],
            ['pin' => 5, 'gpio' => 3, 'type' => 'I2C', 'function' => 'SCL1',],
            ['pin' => 6, 'gpio' => NULL, 'type' => 'GND', 'function' => 'GROUND',],
            ['pin' => 7, 'gpio' => 4, 'type' => NULL, 'function' => NULL,],
            ['pin' => 8, 'gpio' => 14, 'type' => 'UART', 'function' => 'TXD',],
            ['pin' => 9, 'gpio' => NULL, 'type' => 'GND', 'function' => 'GROUND',],
            ['pin' => 10, 'gpio' => 15, 'type' => 'UART', 'function' => 'RXD',],
            ['pin' => 11, 'gpio' => 17, 'type' => NULL, 'function' => NULL,],
            ['pin' => 12, 'gpio' => 18, 'type' => 'PWM', 'function' => 'PCM_CLK',],
            ['pin' => 13, 'gpio' => 27, 'type' => NULL, 'function' => NULL,],
            ['pin' => 14, 'gpio' => NULL, 'type' => 'GND', 'function' => 'GROUND',],
            ['pin' => 15, 'gpio' => 22, 'type' => NULL, 'function' => NULL,],
            ['pin' => 16, 'gpio' => 23, 'type' => NULL, 'function' => NULL,],
            ['pin' => 17, 'gpio' => NULL, 'type' => 'POWER', 'function' => '3V3',],
            ['pin' => 18, 'gpio' => 24, 'type' => NULL, 'function' => NULL,],
            ['pin' => 19, 'gpio' => 10, 'type' => 'SPI', 'function' => 'MOSI',],
            ['pin' => 20, 'gpio' => NULL, 'type' => 'GND', 'function' => 'GROUND',],
            ['pin' => 21, 'gpio' => 9, 'type' => 'SPI', 'function' => 'MISO',],
            ['pin' => 22, 'gpio' => 25, 'type' => NULL, 'function' => NULL,],
            ['pin' => 23, 'gpio' => 11, 'type' => 'SPI', 'function' => 'SCLK',],
            ['pin' => 24, 'gpio' => 8, 'type' => 'SPI', 'function' => 'CE0_N',],
            ['pin' => 25, 'gpio' => NULL, 'type' => 'GND', 'function' => 'GROUND',],
            ['pin' => 26, 'gpio' => 7, 'type' => 'SPI', 'function' => 'CE1_N',],
            ['pin' => 27, 'gpio' => NULL, 'type' => 'ID EEPROM', 'function' => 'ID_SD',],
            ['pin' => 28, 'gpio' => NULL, 'type' => 'ID EEPROM', 'function' => 'ID_SC',],
            ['pin' => 29, 'gpio' => 5, 'type' => NULL, 'function' => NULL,],
            ['pin' => 30, 'gpio' => NULL, 'type' => 'GND', 'function' => 'GROUND',],
            ['pin' => 31, 'gpio' => 6, 'type' => NULL, 'function' => NULL,],
            ['pin' => 32, 'gpio' => 12, 'type' => NULL, 'function' => NULL,],
            ['pin' => 33, 'gpio' => 13, 'type' => NULL, 'function' => NULL,],
            ['pin' => 34, 'gpio' => NULL, 'type' => 'GND', 'function' => 'GROUND',],
            ['pin' => 35, 'gpio' => 19, 'type' => NULL, 'function' => NULL,],
            ['pin' => 36, 'gpio' => 16, 'type' => NULL, 'function' => NULL,],
            ['pin' => 37, 'gpio' => 26, 'type' => NULL, 'function' => NULL,],
            ['pin' => 38, 'gpio' => 20, 'type' => NULL, 'function' => NULL,],
            ['pin' => 39, 'gpio' => NULL, 'type' => 'GND', 'function' => 'GROUND',],
            ['pin' => 40, 'gpio' => 21, 'type' => NULL, 'function' => NULL,],
        ]);
    }
}
