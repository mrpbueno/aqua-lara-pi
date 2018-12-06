<?php

namespace App\Jobs;

use App\Climate;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ClimateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $path = base_path();
        $value = exec("python $path/python/climate.py");
        $value = explode('-', $value);
        $value = [
            'temperature' => (float)$value[0],
            'humidity' => (float)$value[1]
        ];
        Climate::create($value);
    }
}
