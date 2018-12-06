<?php

namespace App\Repositories;


use App\Parameter;

class ParameterRepository extends Repository
{
    /**
     * ParameterRepository constructor.
     */
    public function __construct()
    {
        $this->setModel(Parameter::class);
    }
}