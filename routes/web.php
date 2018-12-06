<?php


Auth::routes();

/** Rotas da Home */
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('home', 'HomeController@index')->name('home.index');

/** Rotas Ambiente */
Route::get('ambiente', 'ClimateController@index')->name('ambiente.index');

/** Rotas Aquário Temperatura */
Route::get('aquario/temperatura', 'TemperatureController@index')->name('aquarium.temperature.index');

/** Rotas Aquário Nível */
Route::get('aquario/nivel', 'LevelController@index')->name('aquario.nivel.index');

/** Rotas Aquário Co2 */
Route::get('aquario/co2', 'Co2Controller@index')->name('aquarium.co2.index');
Route::get('aquario/co2/{id}/edit', 'Co2Controller@edit')->name('aquarium.co2.edit');
Route::post('aquario/co2/{id}/update', 'Co2Controller@update')->name('aquarium.co2.update');

/** Rotas para Parameter */
Route::get('aquario/parameter', 'ParameterController@index')->name('aquarium.parameter.index');
Route::get('aquario/parameter/create', 'ParameterController@create')->name('aquarium.parameter.create');
Route::post('aquario/parameter', 'ParameterController@store')->name('aquarium.parameter.store');
Route::get('aquario/parameter/{id}/edit', 'ParameterController@edit')->name('aquarium.parameter.edit');
Route::put('aquario/parameter/{id}', 'ParameterController@update')->name('aquarium.parameter.update');
Route::delete('aquario/parameter/{id}', 'ParameterController@destroy')->name('aquarium.parameter.destroy');

/** Rotas para periferico */
Route::get('periferico', 'PerifericoController@index')->name('periferico.index');

/** Rotas Alert */
Route::get('alert', 'AlertController@index')->name('alert.index');

/** Rotas para GPIO */
Route::get('gpio', 'GpioController@index')->name('gpio.index');

/** Rotas para o Raspberry Pi */
Route::get('rpi', 'RpiController@index')->name('rpi.index');

/** Rotas Telegram */
Route::get('telegram', 'MessageController@index')->name('message.index');
Route::post('telegram', 'MessageController@send')->name('message.send');

/** Rotas Aquário iluminação */
Route::get('aquario/iluminacao', 'LightingController@index')->name('aquarium.lighting.index');
Route::get('aquario/iluminacao/{id}/edit', 'LightingController@edit')->name('aquarium.lighting.edit');
Route::post('aquario/iluminacao/{id}/update', 'LightingController@update')->name('aquarium.lighting.update');
Route::post('aquario/iluminacao/power/slider', 'LightingController@slider')->name('aquarium.lighting.slider');

Route::get('test','TestController@index');