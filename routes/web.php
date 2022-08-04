<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('empleado','EmpleadoController@index')->name('empleado.index');

//Route::resource('empleado','EmpleadoController');

    Route::get('empleado','EmpleadoController@index')->name('empleado.index')->middleware('auth');

    Route::get('empleado/create','EmpleadoController@create')->name('empleado.create')->middleware("authByName");
    Route::post('empleado','EmpleadoController@store')->name('empleado.store');

    Route::get('empleado/{empleado}/show','EmpleadoController@show')->name('empleado.show');

    Route::get('empleado/{empleado}/edit','EmpleadoController@edit')->name('empleado.edit')->middleware("authByName");
    Route::put('empleado/{empleado}','EmpleadoController@update')->name('empleado.update');

    Route::delete('empleado/{empleado}','EmpleadoController@destroy')->name('empleado.destroy')->middleware("authByName");

        //Route::resource('puesto','PuestoController');

Route::get('puesto', 'PuestoController@index')->name('puesto.index');


    Route::get('puesto/create','PuestoController@create')->name('puesto.create')->middleware("authByName");
    Route::post('puesto','PuestoController@store')->name('puesto.store');

    Route::get('puesto/{puesto}/show','PuestoController@show')->name('puesto.show');

    Route::get('puesto/{puesto}/edit','PuestoController@edit')->name('puesto.edit')->middleware("authByName");
    Route::put('puesto/{puesto}','PuestoController@update')->name('puesto.update');

    Route::delete('puesto/{puesto}','PuestoController@destroy')->name('puesto..destroy')->middleware("authByName");
