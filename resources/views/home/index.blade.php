    @extends('adminlte::page')

    @section('title', 'AquaLaraPi')

    @section('content_header')
        <h1>{{ trans('app.dashboard') }}</h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> {{ trans('app.home') }}</li>
            <li class="active">{{ trans('app.dashboard') }}</li>
        </ol>
    @stop

    @section('content')
        <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ number_format($aquatemp->temperature, 1, ',', '.') }}<sup style="font-size: 20px">°C</sup></h3>

                        <p>{{ trans('app.aquarium') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-thermometer"></i>
                    </div>
                    <a href="{{ route('aquarium.temperature.index') }}" class="small-box-footer">{{ trans('app.more') }} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ number_format($nivel->level, 1, ',', '.') }}<sup style="font-size: 20px">cm</sup></h3>

                        <p>{{ trans('app.level') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-beaker"></i>
                    </div>
                    <a href="{{ route('aquario.nivel.index') }}" class="small-box-footer">{{ trans('app.more') }} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-{{ ($light > 0) ? 'yellow' : 'primary' }}">
                    <div class="inner">
                        <h3>{{ $light }}<sup style="font-size: 20px">%</sup></h3>

                        <p>{{ trans('app.lighting') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-{{ ($light > 0) ? 'sun-o' : 'moon-o' }}"></i>
                    </div>
                    <a href="{{ route('aquarium.lighting.index') }}" class="small-box-footer">{{ trans('app.more') }} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>CO<sub>2</sub></h3>

                        <p>{{ $co2 == 0 ? trans('app.on') : trans('app.off') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-funnel"></i>
                    </div>
                    <a href="{{ route('aquarium.co2.index') }}" class="small-box-footer">{{ trans('app.more') }} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="box-body">
                <div class="row margin">
                    <input id="power" name="power" value="" data-slider-value="{{ $light }}" class="slider form-control"
                        data-slider-min="0" data-slider-max="100" align="center"
                        data-slider-step="1" data-slider-orientation="horizontal" data-slider-id="red">
                    <label for="iluminacao">{{ trans('app.lighting') }}</label>
                </div>
            </div>
        </div>
        </section>
    @stop
    @section('css')
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/bootstrap-slider/slider.css') }}">
    @stop
    @section('js')
        <script src="{{ asset('vendor/adminlte/plugins/bootstrap-slider/bootstrap-slider.js') }}"></script>
        <script>
            $(function () {
                /* BOOTSTRAP SLIDER */
                $('.slider').slider({
                    reversed : false,
                    tooltip: 'always'
                });

                // Executa assim que o valor mudar
                $(document).on('input change', '#power', function(){
                    // Pega os valores dos inputs e coloca nas variáveis
                    var power = $('#power').val();

                    // Método post do Jquery
                    $.post('{{ route('aquarium.lighting.slider') }}', {
                        power:power,
                        "_token": "{{ csrf_token() }}"
                    });
                });

            });
        </script>
    @stop