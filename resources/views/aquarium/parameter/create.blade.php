@extends('adminlte::page')

@section('title', trans('app.parameter'))

@section('content_header')
    <h1>{{ trans('app.home') }}</h1>
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
                <h3 class="box-title">{{ trans('app.new') }}</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" method="post" action="{{ route('aquarium.parameter.store') }}">
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date">{{ trans('app.date') }}</label>
                        <input type="date" class="form-control" name="date" value="{{ old('date') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="temperature">{{ trans('app.temperature') }}</label>
                        <input type="number" class="form-control" name="temperature" value="{{ old('temperature') }}" step="0.1" min="0.0">
                    </div>
                    <div class="form-group">
                        <label for="ph">{{ trans('app.ph') }}</label>
                        <input type="number" class="form-control" name="ph" value="{{ old('ph') }}" step="0.1" min="0.0">
                    </div>
                    <div class="form-group">
                        <label for="nh4">{{ trans('app.nh4') }}</label>
                        <input type="number" class="form-control" name="nh4" value="{{ old('nh4') }}" step="0.1" min="0.0">
                    </div>
                    <div class="form-group">
                        <label for="no2">{{ trans('app.no2') }}</label>
                        <input type="number" class="form-control" name="no2" value="{{ old('no2') }}" step="0.1" min="0.0">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no3">{{ trans('app.no3') }}</label>
                        <input type="number" class="form-control" name="no3" value="{{ old('no3') }}" step="0.1" min="0.0">
                    </div>
                    <div class="form-group">
                        <label for="po4">{{ trans('app.po4') }}</label>
                        <input type="number" class="form-control" name="po4" value="{{ old('po4') }}" step="0.1" min="0.0">
                    </div>
                    <div class="form-group">
                        <label for="cl">{{ trans('app.cl') }}</label>
                        <input type="number" class="form-control" name="cl" value="{{ old('cl') }}" step="0.1" min="0.0">
                    </div>
                    <div class="form-group">
                        <label for="kh">{{ trans('app.kh') }}</label>
                        <input type="number" class="form-control" name="kh" value="{{ old('kh') }}" step="0.1" min="0.0">
                    </div>
                    <div class="form-group">
                        <label for="gh">{{ trans('app.gh') }}</label>
                        <input type="number" class="form-control" name="gh" value="{{ old('gh') }}" step="0.1" min="0.0">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
            </div>
            <!-- /.box-footer -->
            </form>
        </div>
    </div>
    </section>
@stop
@section('css')

@stop
@section('js')

@stop