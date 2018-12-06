    @extends('adminlte::page')

    @section('title', 'AquaLaraPi - Iluminação')

    @section('content_header')
        <h1>Fotoperíodo</h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> Home</li>
            <li>Aquário</li>
            <li>Iluminação</li>
            <li class="active">Edição</li>
        </ol>
    @stop
    @section('content')
        <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Página de edição</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('aquarium.lighting.update', $light->id) }}" method="post">
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="amanhecer">Amanhecer</label>
                                <input type="time" class="form-control" name="amanhecer" value="{{ $light->sunrise_start }}">
                            </div>
                            <div class="form-group">
                                <label for="anoitecer">Anoitecer</label>
                                <input type="time" class="form-control" name="anoitecer" value="{{ $light->sunset_start }}">
                            </div>
                            <div class="form-group">
                                <label for="power">Power</label>
                                <input type="number" min="0" max="100" class="form-control" name="power" value="{{ $light->power * 100 }}">
                            </div>
                            <div class="form-group">
                                <label for="max">Pot Max</label>
                                <input type="number" min="0" max="100" class="form-control" name="max" value="{{ $light->max * 100 }}">
                            </div>
                        </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gpio">GPIO</label>
                            <input type="number" class="form-control" name="gpio" value="{{ $light->gpio }}">
                        </div>
                        <div class="form-group">
                            <label for="offset">Offset</label>
                            <select name="offset" class="form-control">
                                @foreach($offset as $value)
                                <option value="{{ $value }}" {{ $value == $light->offset*100 ? 'selected': '' }}>{{ $value }}%</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="offset">Ativo</label>
                            <select name="active" class="form-control">
                                <option value="1" {{ $light->active == 1 ? 'selected': '' }}>Sim</option>
                                <option value="0" {{ $light->active == 0 ? 'selected': '' }}>Não</option>
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
    @stop
    @section('js')

    @stop