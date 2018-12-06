@extends('adminlte::page')

@section('title', 'AquaLaraPi - RaspBerry PI')

@section('content_header')
    <h1>{{ trans('app.rpi') }}</h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ trans('app.home') }}</li>
        <li>{{ trans('app.system') }}</li>
        <li class="active">{{ trans('app.rpi') }}</li>
    </ol>
@stop

@section('content')
    <section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>{{ number_format($rpi->temperature, 1, ',', '.') }}<sup style="font-size: 20px">°C</sup></h3>
                    <p>&nbsp;</p>

                </div>
                <div class="icon">
                    <i class="ion ion-thermometer"></i>
                </div>
                <p class="small-box-footer">{{ trans('app.temperature') }}</p>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ number_format($rpi->memory, 1, ',', '.') }}<sup style="font-size: 20px">%</sup></h3>
                    <p>&nbsp;</p>

                </div>
                <div class="icon">
                    <i class="ion ion-ios-speedometer-outline"></i>
                </div>
                <p class="small-box-footer">{{ trans('app.memory') }}</p>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ number_format($rpi->disk, 1, ',', '.') }}<sup style="font-size: 20px">%</sup></h3>
                    <p>&nbsp;</p>

                </div>
                <div class="icon">
                    <i class="ion ion-ios-speedometer-outline"></i>
                </div>
                <p class="small-box-footer">{{ trans('app.disk') }}</p>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $rpi->cpu }}<sup style="font-size: 20px">%</sup></h3>
                    <p>&nbsp;</p>

                </div>
                <div class="icon">
                    <i class="ion ion-ios-speedometer-outline"></i>
                </div>
                <p class="small-box-footer">{{ trans('app.cpu') }}</p>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- Chart -->
    <div class="row">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-bar-chart"></i>{{ trans('app.rpi_graphic') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                {!! $chart->html() !!}

            </div>
            <!-- /.box-body -->
        </div>
    </div>
    </section>
@stop
@section('css')
    {!! Charts::styles() !!}
@stop
@section('js')
    {!! Charts::scripts('chartjs') !!}
    {!! $chart->script() !!}
@stop