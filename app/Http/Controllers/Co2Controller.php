<?php

namespace App\Http\Controllers;

use App\Co2;
use App\Repositories\Co2Repository;
use App\Timer;
use Charts;
use Illuminate\Http\Request;

class Co2Controller extends Controller
{
    /**
     * Show the application CO2.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $co2s = Co2Repository::all();
        $chart = Co2Repository::chart();

        return view('aquarium.co2.index', compact('co2s', 'chart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $co2 = Co2Repository::findOrFail($id);

        return view('aquarium.co2.edit',compact('co2'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $co2 = Co2Repository::findOrFail($id);
        $co2->update($request->all());

        // Reset o timer do co2 (1 = desligado)
        Timer::where('id','>','0')->update(['co2' => 1]);
        // Seta os horários com co2 ligado (0 = ligado)
        Timer::whereBetween('time',[$request['start'],$request['stop']])->update(['co2' => 0]);

        return redirect()->route('aquarium.co2.index');
    }
}
