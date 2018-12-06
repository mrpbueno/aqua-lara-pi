<?php


namespace App\Parameter;


use App\Parameter;

trait ParameterCo2
{
    /**
     * Calcula a concentração de CO2
     *
     * @param Parameter $parameter
     */
    public function co2(Parameter $parameter)
    {
        if (isset($parameter->ph) && isset($parameter->kh)) {
            $co2 = 3*$parameter->kh*pow(10,7-$parameter->ph);
            $parameter->co2 = round($co2,1);
            $parameter->save();
        }
    }
}