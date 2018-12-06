<?php

namespace App\Http\Controllers;

use App\Gpio;
use Illuminate\Http\Request;

class GpioController extends Controller
{
    /**
     * Show the application index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gpios = Gpio::all();

        return view('gpio.index', compact('gpios'));
    }
}
