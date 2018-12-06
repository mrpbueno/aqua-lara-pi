<?php

namespace App\Events;

use App\Parameter;

class ParameterEvent
{
    /**
     * @var Parameter
     */
    private $parameter;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Parameter $parameter)
    {
        $this->parameter = $parameter;
    }

    /**
     * @return Parameter
     */
    public function getParameter()
    {
        return $this->parameter;
    }
}
