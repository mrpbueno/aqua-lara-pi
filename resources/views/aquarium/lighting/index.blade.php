@extends('adminlte::page')

@section('title', 'AquaLaraPi - Iluminação')

@section('content_header')
    <h1>Iluminação</h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Aquário</li>
        <li class="active">Iluminação</li>
    </ol>
@stop

@section('content')
    <section class="content">
    <div class="row">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Fotoperíodo</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                <tr align="center">
                    <th>Amanhecer</th>
                    <th>Período 100%</th>
                    <th>Anoitecer</th>
                    <th>GPIO</th>
                    <th>Potência</th>
                    <th>Pot Max</th>
                    <th>Offset</th>
                    <th>Ativo</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lights as $light)
                <tr>
                    <td>{{ substr($light->sunrise_start,0,5) }} - {{ substr($light->sunrise_stop,0,5) }}</td>
                    <td>{{ gmdate('H:i',strtotime($light->sunset_start) - strtotime($light->sunrise_stop)) }}</td>
                    <td>{{ substr($light->sunset_start,0,5) }} - {{ substr($light->sunset_stop,0,5) }}</td>
                    <td>{{ $light->gpio }}</td>
                    <td>{{ $light->power * 100 }}%</td>
                    <td>{{ $light->max * 100 }}%</td>
                    <td>{{ $light->offset * 100}}%</td>
                    <td>
                        @if($light->active == 1)
                            <span class="label label-success">Sim</span>
                        @elseif($light->active == 0)
                            <span class="label label-danger">Não</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('aquarium.lighting.edit', $light->id) }}" >
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