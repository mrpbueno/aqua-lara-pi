<?php

namespace App\Listeners;

use App\Events\ParameterEvent;
use App\Parameter\ParameterCo2;


class ParameterListener
{
    use ParameterCo2;
    /**
     * Handle the event.
     *
     * @param  ParameterEvent  $event
     * @return void
     */
    public function handle(ParameterEvent $event)
    {
        $parameter = $event->getParameter();
        $this->co2($parameter);
    }
}
