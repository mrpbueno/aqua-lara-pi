<?php


namespace App\Repositories;

use App\Level;
use Charts;
use DB;

class LevelRepository extends Repository
{
    /**
     * LevelRepository constructor.
     */
    public function __construct()
    {
        $this->setModel(Level::class);
    }

    /**
     * Retorna a última medição do sensor
     *
     * @return mixed
     */
    public static function last()
    {
        $value = Level::orderBy('id','desc')->first();

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
        $value = Level::whereDate('created_at', $date)->max('level');

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
        $value = Level::whereDate('created_at', $date)->min('level');

        return $value;
    }

    /**
     * Retora o gráfico com as medições do sensor
     *
     * @return mixed
     */
    public static function chart()
    {
        $value = Level::where('created_at','>',DB::raw('DATE_SUB(NOW(), INTERVAL 24 HOUR)'))->get();
        $times = $value->map(function ($value) {
            return $value->created_at->format('H:i');
        });

        $chart = Charts::multi('line', 'chartjs')
            ->title('')
            ->dimensions(0, 250)
            ->colors(['#00c0ef'])
            ->labels($times)
            ->dataset('Nível',$value->pluck('level'))
            ->responsive(false);

        return $chart;
    }

    public static function chartLastMonth()
    {
        $value = Level::select(DB::raw("DATE(created_at) AS day, MAX(level) as max"))
            ->where('created_at','>',DB::raw('DATE_SUB(NOW(), INTERVAL 60 DAY)'))
            ->groupBy('day')->orderBy('day','asc')->get();
        $days = $value->map(function ($value) {
            $day = date('d/m/y', strtotime($value->day));
            return $day;
        });

        $chart = Charts::multi('line', 'chartjs')
            ->title('')
            ->dimensions(0, 250)
            ->colors(['#00c0ef'])
            ->labels($days)
            ->dataset('Nível',$value->pluck('max'))
            ->responsive(false);

        return $chart;
    }
}