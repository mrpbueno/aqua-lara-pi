<?php

namespace App\Listeners;

use App\Events\RpiEvent;
use App\Repositories\AlertRepository;
use App\Repositories\MessageRepository;
use Telegram;

class RpiListener
{
    /**
     * Handle the event.
     *
     * @param  RpiEvent  $event
     * @return void
     */
    public function handle(RpiEvent $event)
    {
        $rpi = $event->getRpi();

        if ($rpi->temperature > 60) {
            $text = "Problema! Temperatura RPI em {$rpi->temperature}°C";
            AlertRepository::setAlert('rpi_temperature','problem', $text, $rpi->temperature);
        } else {
            $text = "OK! Temperatura RPI em {$rpi->temperature}°C";
            AlertRepository::setAlert('rpi_temperature','ok', $text, $rpi->temperature);
        }

        if ($rpi->memory > 50) {
            $text = "Problema! Memória RPI em {$rpi->memory}%";
            AlertRepository::setAlert('rpi_memory','problem', $text, $rpi->memory);
        } else {
            $text = "OK! Memória RPI em {$rpi->memory}%";
            AlertRepository::setAlert('rpi_memory','ok', $text, $rpi->memory);
        }

        if ($rpi->disk > 50) {
            $text = "Problema! Disco RPI em {$rpi->disk}%";
            AlertRepository::setAlert('rpi_disk','problem', $text, $rpi->disk);
        } else {
            $text = "OK! Disco RPI em {$rpi->disk}%";
            AlertRepository::setAlert('rpi_disk','ok', $text, $rpi->disk);
        }

        if ($rpi->cpu > 90) {
            $text = "Problema! CPU RPI em {$rpi->cpu}%";
            AlertRepository::setAlert('rpi_cpu','problem', $text, $rpi->cpu);
        } else {
            $text = "OK! CPU RPI em {$rpi->cpu}%";
            AlertRepository::setAlert('rpi_cpu','ok', $text, $rpi->cpu);
        }

        if ($rpi->uptime < 300) {
            $value = round($rpi->uptime / 60, 1);
            $text = "Problema! RPI reiniciado em {$value} minutos";
            AlertRepository::setAlert('rpi_uptime','problem', $text, $value);
        } else {
            $value = round($rpi->uptime / 60, 1);
            $text = "OK! RPI reiniciado em {$value} minutos";
            AlertRepository::setAlert('rpi_uptime','ok', $text, $value);
        }
    }
}
