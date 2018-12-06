<?php

namespace App\Repositories;


use App\Rpi;
use Charts;
use DB;

class RpiRepository extends Repository
{
    /**
     * RpiRepository constructor.
     */
    public function __construct()
    {
        $this->setModel(Rpi::class);
    }

    /**
     * @return float
     */
    public static function temperature()
    {
        if(file_exists("/sys/class/thermal/thermal_zone0/temp"))
        {
            $output = rtrim(file_get_contents("/sys/class/thermal/thermal_zone0/temp"));
        }
        elseif (file_exists("/sys/class/hwmon/hwmon0/temp1_input"))
        {
            $output = rtrim(file_get_contents("/sys/class/hwmon/hwmon0/temp1_input"));
        }
        else
        {
            $output = "";
        }

        if(is_numeric($output)) {
            $celsius = intVal($output);
            if ($celsius > 1000) {
                $celsius *= 1e-3;
            }
        }

        return round($celsius,1);
    }

    /**
     * @param $param
     * @return string
     */
    public static function pi($param)
    {
        $path = base_path();

        return exec("python $path/python/pi.py $param");
    }

    /**
     * @return string
     */
    public static function cpu()
    {
        return rtrim(exec("top -bn 1 | awk '{print $9}' | tail -n +8 | awk '{s+=$1} END {print s}'"));
    }

    /**
     *
     */
    public static function store()
    {
        $temperature = self::temperature();
        $memory = self::pi('memory');
        $disk = self::pi('disk');
        $cpu = self::cpu();
        $uptime = self::pi('uptime');

        Rpi::create([
            'temperature' => $temperature,
            'memory' => $memory,
            'disk' => $disk,
            'cpu' => $cpu,
            'uptime' => $uptime
        ]);
    }

    /**
     * Retora o gráfico com as medições do sensor
     *
     * @return mixed
     */
    public static function chart()
    {
        $value = Rpi::where('created_at','>',DB::raw('DATE_SUB(NOW(), INTERVAL 24 HOUR)'))->get();
        $times = $value->map(function ($value) {
            return $value->created_at->format('H:i');
        });

        $chart = Charts::multi('line', 'chartjs')
            ->title('')
            ->dimensions(0, 250)
            ->colors(['#3c8dbc','#00a65a','#f39c12','#f56954'])
            ->labels($times)
            ->dataset(trans('app.temperature'),$value->pluck('temperature'))
            ->dataset(trans('app.memory'),$value->pluck('memory'))
            ->dataset(trans('app.disk'),$value->pluck('disk'))
            ->dataset(trans('app.cpu'),$value->pluck('cpu'))
            ->responsive(false);

        return $chart;
    }
}