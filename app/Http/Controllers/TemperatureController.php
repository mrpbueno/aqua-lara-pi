<?php

namespace App\Http\Controllers;

use App\Repositories\TemperatureRepository;

class TemperatureController extends Controller
{
    /**
     * Show the application index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $last = TemperatureRepository::last();
        $min = TemperatureRepository::min(date('Y-m-d'));
        $max = TemperatureRepository::max(date('Y-m-d'));
        $chart = TemperatureRepository::chart();
        $chartMinMax = TemperatureRepository::chartMinMax();
        $chartMinMaxMonth = TemperatureRepository::chartMinMaxMonth();

        return view('aquarium.temperature.index', compact('last','min','max','chart','chartMinMax','chartMinMaxMonth'));
    }
}
