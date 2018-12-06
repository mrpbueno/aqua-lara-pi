<?php

namespace App\Console;

use App\Jobs\ClimateJob;
use App\Jobs\Co2Job;
use App\Jobs\DeleteJob;
use App\Jobs\Dht11Job;
use App\Jobs\Ds18b20Job;
use App\Jobs\Hcsr04Job;
use App\Jobs\IluminacaoJob;
use App\Jobs\LevelJob;
use App\Jobs\LightingJob;
use App\Jobs\MessageJob;
use App\Jobs\PiJob;
use App\Jobs\RpiJob;
use App\Jobs\TelegramJob;
use App\Jobs\TemperatureJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->job(new LightingJob())->everyMinute();
        $schedule->job(new Co2Job())->everyMinute();
        $schedule->job(new ClimateJob())->everyFiveMinutes();
        $schedule->job(new TemperatureJob())->everyFiveMinutes();
        $schedule->job(new LevelJob())->everyFiveMinutes();
        $schedule->job(new MessageJob())->everyMinute();
        $schedule->job(new RpiJob())->everyFiveMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
