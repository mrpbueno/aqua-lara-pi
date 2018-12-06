@extends('adminlte::page')

@section('title', trans('app.parameter'))

@section('content_header')
    <h1>{{ trans('app.parameter') }}</h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ trans('app.home') }}</li>
        <li>{{ trans('app.aquarium') }}</li>
        <li class="active">{{ trans('app.parameter') }}</li>
    </ol>
@stop

@section('content')
    <section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    <a href="{{ route('aquarium.parameter.create') }}" class="btn btn-block btn-primary">
                        {{ trans('app.new') }}
                    </a>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                    <tr align="center">
                        <th>{{ trans('app.date') }}</th>
                        <th>{{ trans('app.temperature') }}</th>
                        <th>{{ trans('app.ph') }}</th>
                        <th>{{ trans('app.nh4') }}</th>
                        <th>{{ trans('app.no2') }}</th>
                        <th>{{ trans('app.no3') }}</th>
                        <th>{{ trans('app.po4') }}</th>
                        <th>{{ trans('app.cl') }}</th>
                        <th>{{ trans('app.kh') }}</th>
                        <th>{{ trans('app.gh') }}</th>
                        <th>{{ trans('app.co2') }}</th>
                        <th>{{ trans('app.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($parameters as $parameter)
                        <tr>
                            <td>{{ $parameter->date->format('d/m/y') }}</td>
                            <td>{{ $parameter->temperature }}</td>
                            <td>{{ $parameter->ph }}</td>
                            <td>{{ $parameter->nh4 }}</td>
                            <td>{{ $parameter->no2 }}</td>
                            <td>{{ $parameter->no3 }}</td>
                            <td>{{ $parameter->po4 }}</td>
                            <td>{{ $parameter->cl }}</td>
                            <td>{{ $parameter->kh }}</td>
                            <td>{{ $parameter->gh }}</td>
                            <td>
                                @if($parameter->co2 <= 5)
                                <span class="label label-primary">{{ $parameter->co2 }}</span>
                                @elseif($parameter->co2 > 5 && $parameter->co2 <= 15)
                                <span class="label label-warning">{{ $parameter->co2 }}</span>
                                @elseif($parameter->co2 > 15 && $parameter->co2 <= 25)
                                <span class="label label-success">{{ $parameter->co2 }}</span>
                                @elseif($parameter->co2 > 25)
                                <span class="label label-danger">{{ $parameter->co2 }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-xs edit_buttons edit_tr_buttons">
                                    <form action="{{ route('aquarium.parameter.destroy', $parameter->id) }}" method="post" id="{{ $parameter->id }}">
                                        <a href="{{ route('aquarium.parameter.edit', $parameter->id) }}" class="btn btn-xs btn-success">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </a>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="fa fa-fw fa-trash-o"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <p></p>
            </div>
            <!-- /.box-footer -->
        </div>
    </div>
    </section>
@stop
@section('css')

@stop
@section('js')

@stop