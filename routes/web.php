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

//Route::resource('empleado','EmpleadoController');

Route::get('empleado','EmpleadoController@index')->name('empleado.index');

Route::get('empleado/create','EmpleadoController@create')->name('empleado.create')->middleware("authByName");
Route::post('empleado','EmpleadoController@store')->name('empleado.store');

Route::get('empleado/{empleado}/show','EmpleadoController@show')->name('empleado.show');

Route::get('empleado/{empleado}/edit','EmpleadoController@edit')->name('empleado.edit')->middleware("authByName");
Route::put('empleado/{emppleado}','EmpleadoController@update')->name('empleado.update');

Route::delete('empleado/{empleado}','EmpleadoController@destroy')->name('empleado.destroy')->middleware("authByName");

//Nuevas rutas Datos contacto

Route::get('datoContacto','DatoContactoController@index')->name('datoContacto.index');

Route::get('datoContacto/create','DatoContactoController@create')->name('datoContacto.create')->middleware("authByName");
Route::post('datoContacto','DatoContactoController@store')->name('datoContacto.store');

Route::get('datoContacto/{datoContacto}/show','DatoContactoController@show')->name('datoContacto.show');

Route::get('datoContacto/{datoContacto}/edit','DatoContactoController@edit')->name('datoContacto.edit')->middleware("authByName");
Route::put('datoContacto/{datoContacto}','DatoContactoController@update')->name('datoContacto.update');

Route::delete('datoContacto/{datoContacto}','DatoContactoController@destroy')->name('datoContacto.destroy')->middleware("authByName");
