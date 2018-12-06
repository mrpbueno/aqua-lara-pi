<?php

namespace App\Http\Controllers;

use App\Periferico;
use Illuminate\Http\Request;

class PerifericoController extends Controller
{
    /**
     * Show the application index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perifericos = Periferico::all();

        return view('periferico.index', compact('perifericos'));
    }
}
