<?php

namespace App\Events;

use App\Temperature;

class TemperatureEvent
{
    /**
     * @var Temperature
     */
    private $temperature;

    /**
     * Create a new event instance.
     *
     * @param Temperature $temperature
     */
    public function __construct(Temperature $temperature)
    {
        $this->temperature = $temperature;
    }

    /**
     * @return Temperature
     */
    public function getTemperature()
    {
        return $this->temperature;
    }
}
