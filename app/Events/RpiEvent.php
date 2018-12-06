<?php

namespace App\Events;


use App\Rpi;

class RpiEvent
{
    /**
     * @var Rpi
     */
    private $rpi;

    /**
     * Create a new event instance.
     *
     * @param Rpi $rpi
     * @return void
     */
    public function __construct(Rpi $rpi)
    {
        $this->rpi = $rpi;
    }

    /**
     * @return mixed
     */
    public function getRpi()
    {
        return $this->rpi;
    }
}
