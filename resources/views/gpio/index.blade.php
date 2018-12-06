@extends('adminlte::page')

@section('title', 'AquaLaraPi - GPIO')

@section('content_header')
    <h1>GPIO</h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Sistema</li>
        <li class="active">GPIO</li>
    </ol>
@stop
@section('content')
    <section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pinagem</h3>
            </div>
            <!-- /.box-header -->
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                    <tr align="center">
                        <th style="width:10%">Pino</th>
                        <th style="width:10%">GPIO</th>
                        <th style="width:10%">Tipo</th>
                        <th style="width:70%">Função</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($gpios as $gpio)
                        <tr>
                            <td>{{ $gpio->pin }}</td>
                            <td>{{ $gpio->gpio }}</td>
                            <td>{{ $gpio->type }}</td>
                            <td>{{ $gpio->function }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            </div>
            <div class="col-lg-4"></div>
            <!-- /.box-body -->
        </div>
    </div>
    </section>
@stop
@section('css')

@stop
@section('js')

@stop