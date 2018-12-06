<?php

namespace App\Repositories;

use App\Lighting;
use Charts;

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
     * Controla a iluminação ao amanhecer
     *
     * @param float $power
     * @param float $max
     * @param float $offset
     * @return void
     */
    private static function sunrise($power, $max, $offset)
    {
        // se a potência for menor que $max
        if($power < $max){
            // incrementa com o offset informado
            $power = $power + $offset;
            // realiza o update da potência
            self::setPower($power);
        }
    }

    /**
     * Controla a iluminação ao anoitecer
     *
     * @param float $power
     * @param float $offset
     * @return void
     */
    private static function sunset($power, $offset)
    {
        // se a potência for maior que 0%
        if($power > 0.00){
            // decrementa com o offset informado
            $power = $power - $offset;
            // realiza o update da potência
            self::setPower($power);
        }
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
        // se modo automático ativo
        if($light->active == 1) {
            // armazena a hora atual
            $now = date('H:i:s');
            // verefica se a hora atual pertence ao amanhecer
            if ($now >= date($light->sunrise_start) && $now <= date($light->sunrise_stop)) {
                self::sunrise($light->power, $light->max, $light->offset);
            }
            // verefica se a hora atual pertence ao anoitecer
            elseif ($now >= date($light->sunset_start) && $now <= date($light->sunset_stop)) {
                self::sunset($light->power, $light->offset);
            }
            // garante a iluminação apagada a noite caso ocorra falta de energia durante o anoitecer
            elseif ($now > date($light->sunset_stop) && $light->power > 0) {
                self::setPower(0);
            }
        }
        // aciona a iluminação
        $power = self::getPower();
        file_put_contents("/dev/pi-blaster", "{$light->gpio}={$power}\n");
    }

    /**
     * Cria o gráfico do fotoperíodo
     *
     * @return Charts
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
        $power = 0;
        $horaInicial = new \DateTime($light->sunrise_start);
        $horaFinal = new \DateTime($light->sunset_stop);

        while($horaInicial <= $horaFinal) {

            $time[] = $horaInicial->format('H:i');
            $value[] = $power;

            if ($horaInicial->format('H:i:s') >= $light->sunrise_start && $horaInicial->format('H:i:s') < $light->sunrise_stop){
                if ($power < $light->max * 100)
                    $power = $power + ($light->offset*100);
            }
            elseif ($horaInicial->format('H:i:s') >= $light->sunset_start && $horaInicial->format('H:i:s') <= $light->sunset_stop){
                if ($power > 0.00)
                    $power = $power - ($light->offset * 100);
            }
            else{
                $power = $light->max * 100;
            }

            $horaInicial->add(new \DateInterval('PT1M'));
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