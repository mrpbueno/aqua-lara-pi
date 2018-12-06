<?php

namespace App\Http\Controllers;

use App\Repositories\RpiRepository;
use Config;
use Illuminate\Http\Request;
use Linfo\Linfo;

class RpiController extends Controller
{
    /**
     * Show the application index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rpi = RpiRepository::orderBy('id','desc')->first();
        $chart = RpiRepository::chart();

        return view('rpi.index', compact('rpi','chart'));
    }
}
