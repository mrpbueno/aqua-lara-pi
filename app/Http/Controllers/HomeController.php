<?php

namespace App\Http\Controllers;


use App\Repositories\Co2Repository;
use App\Repositories\LevelRepository;
use App\Repositories\LightingRepository;
use App\Repositories\TemperatureRepository;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $light = LightingRepository::getPower() * 100;
        $aquatemp = TemperatureRepository::last();
        $nivel = LevelRepository::last();
        $co2 = Co2Repository::getPower();

        return view('home.index', compact('light','aquatemp','nivel','co2'));
    }
}
