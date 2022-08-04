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

//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('certificaciones','CertificacionesController@index')->name('certificaciones.index');
Route::get('empleado','EmpleadoController@index')->name('empleado.index');


//Route::resource('empleado','EmpleadoController');


Route::group(['middleware' => ['auth']], function(){

    Route::get('empleado','EmpleadoController@index')->name('empleado.index')->middleware('auth');

    Route::get('empleado/create','EmpleadoController@create')->name('empleado.create')->middleware("authByName");
    Route::post('empleado','EmpleadoController@store')->name('empleado.store');

    Route::get('empleado/{empleado}/show','EmpleadoController@show')->name('empleado.show');

    Route::get('empleado/{empleado}/edit','EmpleadoController@edit')->name('empleado.edit')->middleware("authByName");
    Route::put('empleado/{emppleado}','EmpleadoController@update')->name('empleado.update');

    Route::delete('empleado/{empleado}','EmpleadoController@destroy')->name('empleado.destroy')->middleware("authByName");


    Route::get('certificaciones','CertificacionesController@index')->name('certificaciones.index')->middleware("auth");
    Route::get('certificaciones/{certificaciones}/show','CertificacionesController@show')->name('certificaciones.show');
    
    Route::get('certificaciones/create','CertificacionesController@create')->name('certificaciones.create')->middleware("authByName");
    
    Route::get('certificaciones/{certificaciones}/edit','CertificacionesController@edit')->name('certificaciones.edit')->middleware("authByName");
    Route::put('certificaciones/{certificaciones}','CertificacionesController@update')->name('certificaciones.update');
    Route::post('certificaciones','CertificacionesController@store')->name('certificaciones.store');

    Route::delete('certificaciones/{certificaciones}','CertificacionesController@destroy')->name('certificaciones.destroy')->middleware("authByName");
});