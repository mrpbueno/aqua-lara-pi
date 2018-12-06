@extends('adminlte::page')

@section('title', 'AquaLaraPi - Alerta')

@section('content_header')
    <h1>{{ trans('app.alert') }}</h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ trans('app.home') }}</li>
        <li class="active">{{ trans('app.alert') }}</li>
    </ol>
@stop

@section('content')
    <section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ trans('app.alert_system') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                    <tr align="center">
                        <th>{{ trans('app.date') }}</th>
                        <th>{{ trans('app.event') }}</th>
                        <th>{{ trans('app.value') }}</th>
                        <th>{{ trans('app.status') }}</th>
                        <th>{{ trans('app.description') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($alerts as $alert)
                        <tr>
                            <td>{{ $alert->created_at->format('d/m/y H:i') }}</td>
                            <td>{{ trans('app.'.$alert->event) }}</td>
                            <td>{{ number_format($alert->value, 1, ',', '.') }}</td>
                            <td>
                                @if($alert->status == 'ok')
                                    <a href="#" data-toggle="tooltip" title="OK">
                                        <i class="text-success fa fa-thumbs-up"></i>
                                    </a>
                                @elseif($alert->status == 'problem')
                                    <a href="#" data-toggle="tooltip" title="Problem">
                                        <i class="text-danger fa fa-exclamation-triangle"></i>
                                    </a>
                                @endif
                            </td>
                            <td>{{ $alert->text }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    </section>
@stop
@section('css')

@stop
@section('js')
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop