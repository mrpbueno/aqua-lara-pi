<?php

namespace App\Repositories;

use App\Climate;
use App\Temperature;
use Charts;
use DB;

class TemperatureRepository extends Repository
{
    /**
     * TemperatureRepository constructor.
     */
    public function __construct()
    {
        $this->setModel(Temperature::class);
    }

    /**
     * Retorna a última medição do sensor
     *
     * @return mixed
     */
    public static function last()
    {
        $value = Temperature::orderBy('id','desc')->first();

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
        $value = Temperature::whereDate('created_at', $date)
            ->orderBy('temperature','desc')
            ->orderBy('created_at','desc')->first();

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
        $value = Temperature::whereDate('created_at', $date)
            ->orderBy('temperature','asc')
            ->orderBy('created_at','desc')->first();

        return $value;
    }

    /**
     * Retora o gráfico com as medições do sensor
     *
     * @return mixed
     */
    public static function chart()
    {
        $value = Temperature::where('created_at','>',DB::raw('DATE_SUB(NOW(), INTERVAL 1 DAY)'))->get();
        $climate = Climate::where('created_at','>',DB::raw('DATE_SUB(NOW(), INTERVAL 1 DAY)'))->get();
        $times = $value->map(function ($value) {
            return $value->created_at->format('H:i');
        });

        $chart = Charts::multi('line', 'chartjs')
            ->title('')
            ->dimensions(0, 250)
            ->colors(['#f39c12','#00c0ef'])
            ->labels($times)
            ->dataset('Aquário',$value->pluck('temperature'))
            ->dataset('Ambiente',$climate->pluck('temperature'))
            ->responsive(false);

        return $chart;
    }

    public static function chartMinMax()
    {
        $value = Temperature::select(DB::raw("DATE(created_at) AS day,MIN(temperature) AS min,MAX(temperature) AS max"))
            ->where('created_at','>',DB::raw('DATE_SUB(NOW(), INTERVAL 180 DAY)'))
            ->groupBy('day')->orderBy('day','asc')->get();
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

    public static function chartMinMaxMonth()
    {
        $value = Temperature::select(DB::raw("CONCAT_WS('-',YEAR(created_at),MONTH(created_at)) as month,
        MIN(temperature) AS min,MAX(temperature) AS max"))
            ->where('created_at','>',DB::raw('DATE_SUB(NOW(), INTERVAL 365 DAY)'))
            ->groupBy('month')->orderBy('created_at','asc')->get();
        $months = $value->map(function ($value) {
            $month = date('m/Y', strtotime($value->month));

            return $month;
        });

        $chart = Charts::multi('line', 'chartjs')
            ->title('')
            ->dimensions(0, 250)
            ->colors(['#f39c12','#dd4b39'])
            ->labels($months)
            ->dataset(trans('app.min'),$value->pluck('min'))
            ->dataset(trans('app.max'),$value->pluck('max'))
            ->responsive(false);

        return $chart;
    }
}