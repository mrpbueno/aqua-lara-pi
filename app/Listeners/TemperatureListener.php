<?php

namespace App\Listeners;

use App\Events\TemperatureEvent;
use App\Repositories\AlertRepository;
use App\Repositories\MessageRepository;
use Telegram;

class TemperatureListener
{
    /**
     * Handle the event.
     *
     * @param  TemperatureEvent  $event
     * @return void
     */
    public function handle(TemperatureEvent $event)
    {
        $temperature = $event->getTemperature();

        if ($temperature->temperature < 23.0 || $temperature->temperature > 28.0) {
            $text = "Problema! Temperatura em {$temperature->temperature}°C";
            AlertRepository::setAlert('temperature','problem', $text, $temperature->temperature);
        } else {
            $text = "OK! Temperatura em {$temperature->temperature}°C";
            AlertRepository::setAlert('temperature','ok', $text, $temperature->temperature);
        }
    }
}
