<?php

namespace App\Http\Controllers;


use App\Repositories\AlertRepository;

class TestController extends Controller
{
    /**
     *
     */
    public function index()
    {
        $alert = AlertRepository::getStatus('rpi_uptime');

        if ($alert->status == 'problem') {
            $text = "Problema! ";
            dd($text);
        }

        return view('default.index');
    }
}
