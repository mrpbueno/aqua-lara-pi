@extends('adminlte::page')

@section('title', 'AquaLaraPi - Ambiente')

@section('content_header')
    <h1>{{ trans('app.climate') }}</h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ trans('app.home') }}</li>
        <li class="active">{{ trans('app.climate') }}</li>
    </ol>
@stop

@section('content')
    <section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $last->temperature }}<sup style="font-size: 20px">°C</sup></h3>
                    <p>
                        {{ trans('app.max') }} {{ $max[0]->temperature }}°C - {{ $max[0]->created_at->format('H:i') }}<br />
                        {{ trans('app.min') }} {{ $min[0]->temperature }}°C - {{ $min[0]->created_at->format('H:i') }}
                    </p>
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
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $last->humidity }}<sup style="font-size: 20px">%</sup></h3>
                    <p>
                        {{ trans('app.max') }} {{ $max[1]->humidity }}% - {{ $max[1]->created_at->format('H:i') }} <br />
                        {{ trans('app.min') }} {{ $min[1]->humidity }}% - {{ $min[1]->created_at->format('H:i') }}
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-cloud-outline"></i>
                </div>
                <p class="small-box-footer">{{ trans('app.humidity') }}</p>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- Chart -->
    <div class="row">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-bar-chart"></i>{{ trans('app.room_temperature') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                {!! $chartTemperature->html() !!}

            </div>
            <!-- /.box-body -->
        </div>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-bar-chart"></i>{{ trans('app.relative_humidity') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                {!! $chartHumidity->html() !!}

            </div>
            <!-- /.box-body -->
        </div>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-bar-chart"></i>{{ trans('app.room_temperature') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                {!! $chartTemperatureMinMax->html() !!}

            </div>
            <!-- /.box-body -->
        </div>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-bar-chart"></i>{{ trans('app.relative_humidity') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                {!! $chartHumidityMinMax->html() !!}

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
    {!! $chartTemperature->script() !!}
    {!! $chartHumidity->script() !!}
    {!! $chartTemperatureMinMax->script() !!}
    {!! $chartHumidityMinMax->script() !!}
@stop