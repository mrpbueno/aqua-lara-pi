@extends('adminlte::page')

@section('title', 'AquaLaraPi - Temperatura')

@section('content_header')
    <h1>{{ trans('app.temperature') }}</h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ trans('app.home') }}</li>
        <li>{{ trans('app.aquarium') }}</li>
        <li class="active">{{ trans('app.temperature') }}</li>
    </ol>
@stop

@section('content')
    <section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ number_format($last->temperature, 1, ',', '.') }}<sup style="font-size: 20px">°C</sup></h3>
                    <p>
                        {{ trans('app.max') }}: {{ number_format($max->temperature, 1, ',', '.') }}°C - {{ $max->created_at->format('H:i') }}<br />
                        {{ trans('app.min') }}: {{ number_format($min->temperature, 1, ',', '.') }}°C - {{ $min->created_at->format('H:i') }}
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-thermometer"></i>
                </div>
                <p class="small-box-footer">{{ trans('app.temperature') }}</p>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- Chart -->
    <div class="row">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-bar-chart"></i>{{ trans('app.aqua_temperature') }}</h3>

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
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-bar-chart"></i>{{ trans('app.aqua_temperature') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                {!! $chartMinMax->html() !!}

            </div>
            <!-- /.box-body -->
        </div>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-bar-chart"></i>{{ trans('app.aqua_temperature') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                {!! $chartMinMaxMonth->html() !!}

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
    {!! $chartMinMax->script() !!}
    {!! $chartMinMaxMonth->script() !!}
@stop