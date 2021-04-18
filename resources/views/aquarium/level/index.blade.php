@extends('adminlte::page')

@section('title', trans('app.level'))

@section('content_header')
    <h1>{{ trans('app.level') }}</h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ trans('app.home') }}</li>
        <li>{{ trans('app.aquarium') }}</li>
        <li class="active">{{ trans('app.level') }}</li>
    </ol>
@stop

@section('content')
    <section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ number_format($last->level, 1, ',', '.') }}<sup style="font-size: 20px">cm</sup></h3>
                    <p>
                        {{ trans('app.max') }}: {{ number_format($max, 1, ',', '.') }}cm <br />
                        {{ trans('app.min') }}: {{ number_format($min, 1, ',', '.') }}cm
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-beaker"></i>
                </div>
                <p class="small-box-footer">{{ trans('app.level') }}</p>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- Chart -->
    <div class="row">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-bar-chart"></i>{{ trans('app.aqua_level') }}</h3>

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
        <!-- Chart -->
        <div class="row">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-bar-chart"></i>{{ trans('app.aqua_level') }}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">

                    {!! $chartLastMonth->html() !!}

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
    {!! $chartLastMonth->script() !!}
@stop