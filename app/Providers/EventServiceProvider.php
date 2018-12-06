<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\TemperatureEvent' => [
            'App\Listeners\TemperatureListener',
        ],
        'App\Events\LevelEvent' => [
            'App\Listeners\LevelListener',
        ],
        'App\Events\RpiEvent' => [
            'App\Listeners\RpiListener',
        ],
        'App\Events\ParameterEvent' => [
            'App\Listeners\ParameterListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
