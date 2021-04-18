<?php

namespace App\Repositories;

use App\Co2;
use Charts;

class Co2Repository extends Repository
{
    /**
     * Co2Repository constructor.
     */
    public function __construct()
    {
        $this->setModel(Co2::class);
    }

    /**
     * Controla o CO2 de forma automática
     *
     * @return void
     */
    public static function automatic()
    {
        // lê as informações do CO2
        $co2 = Co2::first();
        // se modo automático ativo
        if($co2->active == 1) {
            // armazena a hora atual
            $now = date('H:i:s');
            // verefica se a hora atual pertence ao acionamento do Co2
            if ($now >= date($co2->start) && $now <= date($co2->stop)) {
                // Liga o CO2
                self::setPower(0);
                file_put_contents("/dev/pi-blaster", "{$co2->gpio}=0\n");
                file_put_contents("/dev/pi-blaster", "12=0\n");
            } else {
                // Desliga o CO2
                self::setPower(1);
                file_put_contents("/dev/pi-blaster", "{$co2->gpio}=1\n");
                file_put_contents("/dev/pi-blaster", "12=1\n");
            }
        }
    }

    /**
     * @return mixed
     */
    public static function chart()
    {
        $value = Co2::first();

        $chart = Charts::multi('area', 'chartjs')
            ->title('')
            ->dimensions(0, 250)
            ->colors(['#00c0ef'])
            ->labels(['', $value->start, $value->stop, ''])
            ->dataset('CO2',['', '1', '1', ''])
            ->responsive(false);

        return $chart;
    }

    /**
     * @return float
     */
    public static function getPower()
    {
        return Co2::where('id',1)->value('power');
    }

    /**
     * @param float $power
     */
    public static function setPower($power)
    {
        Co2::where('id', 1)->update(['power' => $power]);
    }

    /**
     * @return string
     */
    public static function status()
    {
        $value = self::getPower();
        $status = $value == 1 ? 'desligado' : 'ligado';

        return $status;
    }

    public static function autoPower($active)
    {
        Co2::where('id', 1)->update(['active' => $active]);
    }
}