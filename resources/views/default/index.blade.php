@extends('adminlte::page')

@section('title', 'AquaLaraPi - ')

@section('content_header')
    <h1>{{ trans('app.home') }}</h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ trans('app.home') }}</li>
        <li class="active">{{ trans('app.home') }}</li>
    </ol>
@stop

@section('content')
    <section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ trans('app.home') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <p>Body</p>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <p>Footer</p>
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