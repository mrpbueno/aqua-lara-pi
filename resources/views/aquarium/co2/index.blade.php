@extends('adminlte::page')

@section('title', trans('app.co2'))

@section('content_header')
    <h1>{{ trans('app.co2') }}</h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ trans('app.home') }}</li>
        <li>{{ trans('app.aquarium') }}</li>
        <li class="active">{{ trans('app.co2') }}</li>
    </ol>
@stop

@section('content')
    <section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ trans('app.co2_control') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                    <tr align="center">
                        <th>{{ trans('app.start') }}</th>
                        <th>{{ trans('app.time') }}</th>
                        <th>{{ trans('app.end') }}</th>
                        <th>{{ trans('app.gpio') }}</th>
                        <th>{{ trans('app.active') }}</th>
                        <th>CO<sub>2</sub></th>
                        <th>{{ trans('app.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($co2s as $co2)
                        <tr>
                            <td>{{ substr($co2->start,0,5) }}</td>
                            <td>{{ gmdate('H:i',strtotime($co2->stop) - strtotime($co2->start)) }}</td>
                            <td>{{ substr($co2->stop,0,5) }}</td>
                            <td>{{ $co2->gpio }}</td>
                            <td>
                                @if($co2->active == 1)
                                    <span class="label label-success">Sim</span>
                                @elseif($co2->active == 0)
                                    <span class="label label-danger">Não</span>
                                @endif
                            </td>
                            <td>
                                @if($co2->power == 0)
                                    <span class="label label-success">Ligado</span>
                                @elseif($co2->power == 1)
                                    <span class="label label-danger">Desligado</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('aquarium.co2.edit', $co2->id) }}" >
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <!-- Chart -->
    <div class="row">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-bar-chart"></i>Gráfico</h3>

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