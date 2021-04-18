<?php

namespace App\Repositories;

use App\Lighting;
use App\Timer;
use Charts;
use Log;

class LightingRepository extends Repository
{
    /**
     * LightingRepository constructor.
     */
    public function __construct()
    {
        $this->setModel(Lighting::class);
    }

    /**
     * Controla a iluminação de forma automática
     *
     * @return void
     */
    public static function automatic()
    {
        // lê as informações da uliminação
        $light = Lighting::first();
        // modo automático ativado
        if ($light->active == 1) {
            // horário atual
            $now = date('H:i:00');
            // pega a potência do timer
            $power = Timer::where('time', $now)->value('light');
            self::setPower($power);
        } else {
            // modo automático desativado
            $power = self::getPower();
        }
        //Log::debug($now." ".$power);
        if ($power == 1) {
            file_put_contents("/dev/pi-blaster", "16=0\n");
            file_put_contents("/dev/pi-blaster", "{$light->gpio}=1\n");
        } else {
            file_put_contents("/dev/pi-blaster", "16=1\n");
            file_put_contents("/dev/pi-blaster", "{$light->gpio}={$power}\n");
        }
    }

    /**
     * Cria o gráfico do fotoperíodo
     *
     * @return Charts
     * @throws \Exception
     */
    public static function chart()
    {
        $light = Lighting::where('id', 1)->first();
        if($light->active == 0) {
            $chart = Charts::create('line', 'chartjs')
                ->title('')
                ->dimensions(0, 300)
                ->elementLabel('Potência')
                ->labels(['00:00', '12:00', '24:00'])
                ->values([$light->power*100, $light->power*100, $light->power*100])
                ->responsive(false);

            return $chart;
        }

        $timers = Timer::all();
        foreach ($timers as $timer) {
            $time[] = $timer->time;
            $value[] = $timer->light * 100;
        }

        $chart = Charts::create('line', 'chartjs')
            ->title('')
            ->dimensions(0, 300)
            ->elementLabel('Potência')
            ->labels($time)
            ->values($value)
            ->responsive(false);

        return $chart;
    }

    /**
     * @param int $active
     *
     * @return void
     */
    public static function autoPower($active)
    {
        Lighting::where('id', 1)->update(['active' => $active]);
    }

    /**
     * @return float
     */
    public static function getPower()
    {
        return Lighting::where('id',1)->value('power');
    }

    /**
     * @param float $power
     */
    public static function setPower($power)
    {
        Lighting::where('id', 1)->update(['power' => $power]);
    }
}