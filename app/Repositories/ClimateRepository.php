<?php

namespace App\Repositories;

use App\Climate;
use Charts;
use DB;

class ClimateRepository extends Repository
{
    /**
     * ClimateRepository constructor.
     */
    public function __construct()
    {
        $this->setModel(Climate::class);
    }

    /**
     * Retorna a última medição do sensor
     *
     * @return mixed
     */
    public static function last()
    {
        $value = Climate::orderBy('id','desc')->first();

        return $value;
    }

    /**
     * Retorna a medição máxima do sensor
     *
     * @param $date
     * @return mixed
     */
    public static function max($date)
    {
        $temperature = Climate::whereDate('created_at', $date)
            ->orderBy('temperature','desc')
            ->orderBy('created_at','desc')->first();
        $humidity = Climate::whereDate('created_at', $date)
            ->orderBy('humidity','desc')
            ->orderBy('created_at','desc')->first();
        $value = [$temperature, $humidity];

        return $value;
    }

    /**
     * Retorna a medição mínima do sensor
     *
     * @param $date
     * @return mixed
     */
    public static function min($date)
    {
        $temperature = Climate::whereDate('created_at', $date)
            ->orderBy('temperature','asc')
            ->orderBy('created_at','asc')->first();
        $humidity = Climate::whereDate('created_at', $date)
            ->orderBy('humidity','asc')
            ->orderBy('created_at','desc')->first();
        $value = [$temperature, $humidity];

        return $value;
    }

    /**
     * Retora o gráfico com as medições do sensor
     *
     * @return mixed
     */
    public static function chartTemperature()
    {
        $value = Climate::where('created_at','>',DB::raw('DATE_SUB(NOW(), INTERVAL 24 HOUR)'))->get();
        $times = $value->map(function ($value) {
            return $value->created_at->format('H:i');
        });

        $chart = Charts::multi('line', 'chartjs')
            ->title('')
            ->dimensions(0, 250)
            ->colors(['#f39c12'])
            ->labels($times)
            ->dataset(trans('app.temperature'),$value->pluck('temperature'))
            ->responsive(false);

        return $chart;
    }

    /**
     * Retora o gráfico com as medições do sensor
     *
     * @return mixed
     */
    public static function chartHumidity()
    {
        $value = Climate::where('created_at','>',DB::raw('DATE_SUB(NOW(), INTERVAL 24 HOUR)'))->get();
        $times = $value->map(function ($value) {
            return $value->created_at->format('H:i');
        });

        $chart = Charts::multi('line', 'chartjs')
            ->title('')
            ->dimensions(0, 250)
            ->colors(['#00c0ef'])
            ->labels($times)
            ->dataset(trans('app.humidity'),$value->pluck('humidity'))
            ->responsive(false);

        return $chart;
    }

    public static function chartTemperatureMinMax()
    {
        $value = Climate::select(DB::raw("DATE(created_at) AS day,MIN(temperature) AS min,MAX(temperature) AS max"))->where('created_at','>',DB::raw('DATE_SUB(NOW(), INTERVAL 30 DAY)'))->groupBy('day')->orderBy('day','asc')->get();
        $days = $value->map(function ($value) {
            $day = date('d/m/y', strtotime($value->day));
            return $day;
        });

        $chart = Charts::multi('line', 'chartjs')
            ->title('')
            ->dimensions(0, 250)
            ->colors(['#f39c12','#dd4b39'])
            ->labels($days)
            ->dataset(trans('app.min'),$value->pluck('min'))
            ->dataset(trans('app.max'),$value->pluck('max'))
            ->responsive(false);

        return $chart;
    }

    public static function chartHumidityMinMax()
    {
        $value = Climate::select(DB::raw("DATE(created_at) AS day,MIN(humidity) AS min,MAX(humidity) AS max"))->where('created_at','>',DB::raw('DATE_SUB(NOW(), INTERVAL 30 DAY)'))->groupBy('day')->orderBy('day','asc')->get();
        $days = $value->map(function ($value) {
            $day = date('d/m/y', strtotime($value->day));
            return $day;
        });

        $chart = Charts::multi('line', 'chartjs')
            ->title('')
            ->dimensions(0, 250)
            ->colors(['#00c0ef','#001F3F'])
            ->labels($days)
            ->dataset(trans('app.min'),$value->pluck('min'))
            ->dataset(trans('app.max'),$value->pluck('max'))
            ->responsive(false);

        return $chart;
    }
}