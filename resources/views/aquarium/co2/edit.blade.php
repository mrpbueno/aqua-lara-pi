@extends('adminlte::page')

@section('title', 'AquaLaraPi - CO2')

@section('content_header')
    <h1>CO2</h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Aquário</li>
        <li>CO2</li>
        <li class="active">Edição</li>
    </ol>
@stop
@section('content')
    <section class="content">
    <div class="row">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Página de edição</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('aquarium.co2.update', $co2->id) }}" method="post">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="start">Início</label>
                            <input type="time" class="form-control" name="start" value="{{ $co2->start }}">
                        </div>
                        <div class="form-group">
                            <label for="stop">Fim</label>
                            <input type="time" class="form-control" name="stop" value="{{ $co2->stop }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pino">GPIO</label>
                            <input type="number" class="form-control" name="pino" value="{{ $co2->gpio }}">
                        </div>
                        <div class="form-group">
                            <label for="offset">Ativo</label>
                            <select name="active" class="form-control">
                                <option value="1" {{ $co2->active == 1 ? 'selected': '' }}>Sim</option>
                                <option value="0" {{ $co2->active == 0 ? 'selected': '' }}>Não</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
                </div>
            </form>
        </div>
    </div>
    </section>
@stop
@section('js')

@stop