<?php

namespace App\Http\Controllers;

use App\Climate;
use App\Repositories\ClimateRepository;

class ClimateController extends Controller
{
    /**
     * Show the application index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $last = ClimateRepository::last();
        $min = ClimateRepository::min(date('Y-m-d'));
        $max = ClimateRepository::max(date('Y-m-d'));
        $chartTemperature = ClimateRepository::chartTemperature();
        $chartHumidity = ClimateRepository::chartHumidity();
        $chartTemperatureMinMax = ClimateRepository::chartTemperatureMinMax();
        $chartHumidityMinMax = ClimateRepository::chartHumidityMinMax();

        return view('climate.index', compact('last','min','max','chartTemperature','chartHumidity','chartTemperatureMinMax','chartHumidityMinMax'));
    }
}
