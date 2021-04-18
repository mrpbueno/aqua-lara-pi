<?php

namespace App\Http\Controllers;

use App\Repositories\LightingRepository;
use App\Timer;
use DateInterval;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Log;

class LightingController extends Controller
{
    /**
     * Show the application Iluminação.
     *
     * @return Response
     * @throws Exception
     */
    public function index()
    {
        $lights = LightingRepository::all();
        $chart = LightingRepository::chart();

        return view('aquarium.lighting.index', compact('lights', 'chart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $light = LightingRepository::findOrFail($id);
        $offset = [1,2,4,5,10,20,25,50,100];

        return view('aquarium.lighting.edit',compact('light','offset'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws Exception
     */
    public function update(Request $request, $id)
    {
        // tempo de duração do amanhecer e anoitecer
        $tempo = (100 / $request['offset']);
        // calcula a hora:minuto do termino do amanhecer
        $sunrise_stop = new DateTime($request['amanhecer']);
        $sunrise_stop->add(new DateInterval("PT".$tempo."M"));
        // calcula a hora:minuto do termino do anoitecer
        $sunset_stop = new DateTime($request['anoitecer']);
        $sunset_stop->add(new DateInterval("PT".$tempo."M"));
        // converte o offset para float 0.00
        $offset = $request['offset'] * 0.01;
        $power = $request['power'] * 0.01;
        $max = $request['max'] * 0.01;
        // realiza o update na tabela iluminacao
        LightingRepository::where('id','=', $id)->update([
            'sunrise_start' => $request['amanhecer'],
            'sunrise_stop' => $sunrise_stop->format('H:i:s'),
            'sunset_start' => $request['anoitecer'],
            'sunset_stop' => $sunset_stop->format('H:i:s'),
            'gpio' => $request['gpio'],
            'offset' => $offset,
            'power' => $power,
            'max' => $max,
            'active' => $request['active']
        ]);

        $power_start = $offset;
        $power_stop = $max;
        $sunrise_start = new DateTime($request['amanhecer']);
        $sunset_start = new DateTime($request['anoitecer']);
        // Reset o timer da iluminação (0 = desligado)
        Timer::where('id','>','0')->update(['light' => 0]);
        // Seta os horários com a potência máxima
        Timer::whereBetween('time',[$sunrise_stop->format('H:i:s'),$request['anoitecer']])->update(['light' => $max]);
        // Seta as potências do amanhecer e anoitecer
        for ($i=0;$i<$tempo;$i++) {
            //Log::debug($sunrise_start->format('H:i:s')." ".$power_start);
            //Log::debug($sunset_start->format('H:i:s')." ".$power_stop);
            Timer::where('time','=',$sunrise_start->format('H:i:s'))->update(['light' => $power_start]);
            $sunrise_start->add(new DateInterval("PT1M"));
            $power_start=$power_start+$offset;

            Timer::where('time','=',$sunset_start->format('H:i:s'))->update(['light' => $power_stop]);
            $sunset_start->add(new DateInterval("PT1M"));
            $power_stop=$power_stop-$offset;
        }

        return redirect()->route('aquarium.lighting.index');
    }

    /**
     * @param Request $request
     *
     * @return void
     */
    public function slider(Request $request)
    {
        $power = $request['power']*0.01;
        $gpio = LightingRepository::where('id',1)->value('gpio');
        LightingRepository::setPower($power);
        file_put_contents("/dev/pi-blaster", "$gpio=$power\n");
    }
}
