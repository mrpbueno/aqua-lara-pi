<?php

namespace App\Http\Controllers;


use App\Repositories\LevelRepository;

class LevelController extends Controller
{
    /**
     * Show the application index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $last = LevelRepository::last();
        $min = LevelRepository::min(date('Y-m-d'));
        $max = LevelRepository::max(date('Y-m-d'));
        $chart = LevelRepository::chart();
        $chartLastMonth = LevelRepository::chartLastMonth();

        return view('aquarium.level.index', compact('last','min','max','chart','chartLastMonth'));
    }
}
