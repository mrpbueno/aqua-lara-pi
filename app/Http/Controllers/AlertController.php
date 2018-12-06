<?php

namespace App\Http\Controllers;

use App\Repositories\AlertRepository;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    /**
     * Show the application index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alerts = AlertRepository::orderBy('created_at','desc')->get();

        return view('alert.index', compact('alerts'));
    }
}
