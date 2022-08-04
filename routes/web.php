<<?php

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
use App\Http\Controllers\ProyectosController;

//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::resource('empleado','EmpleadoController');


Route::group(['middleware' => ['auth']], function(){

    Route::get('empleado','EmpleadoController@index')->name('empleado.index')->middleware('auth');

    Route::get('empleado/create','EmpleadoController@create')->name('empleado.create')->middleware("authByRol");
    Route::post('empleado','EmpleadoController@store')->name('empleado.store');

    Route::get('empleado/{empleado}/show','EmpleadoController@show')->name('empleado.show');

    Route::get('empleado/{empleado}/edit','EmpleadoController@edit')->name('empleado.edit')->middleware("authByName");
    Route::put('empleado/{empleado}','EmpleadoController@update')->name('empleado.update');

    Route::delete('empleado/{empleado}','EmpleadoController@destroy')->name('empleado.destroy')->middleware("authByName");

      //Route::resource('puesto','PuestoController');

    Route::get('puesto', 'PuestoController@index')->name('puesto.index');

    Route::get('puesto/create','PuestoController@create')->name('puesto.create')->middleware("authByName");

    Route::get('puesto/create','PuestoController@create')->name('puesto.create')->middleware("authByName");
    Route::post('puesto','PuestoController@store')->name('puesto.store');

    Route::get('puesto/{puesto}/show','PuestoController@show')->name('puesto.show');

    Route::get('puesto/{puesto}/edit','PuestoController@edit')->name('puesto.edit')->middleware("authByName");
    Route::put('puesto/{puesto}','PuestoController@update')->name('puesto.update');

    Route::delete('puesto/{puesto}','PuestoController@destroy')->name('puesto.destroy')->middleware("authByName");

    Route::get('certificaciones','CertificacionesController@index')->name('certificaciones.index')->middleware("auth");
    Route::get('certificaciones/{certificaciones}/show','CertificacionesController@show')->name('certificaciones.show');
    
    Route::get('certificaciones/create','CertificacionesController@create')->name('certificaciones.create')->middleware("authByName");
    
    Route::get('certificaciones/{certificaciones}/edit','CertificacionesController@edit')->name('certificaciones.edit')->middleware("authByName");
    Route::put('certificaciones/{certificaciones}','CertificacionesController@update')->name('certificaciones.update');
    Route::post('certificaciones','CertificacionesController@store')->name('certificaciones.store');

    Route::delete('certificaciones/{certificaciones}','CertificacionesController@destroy')->name('certificaciones.destroy')->middleware("authByName");

    //Route::resource('proyectos', 'ProyectosController');
    Route::get('proyectos','ProyectosController@index')->name('proyectos.index');
    Route::get('proyectos/create','ProyectosController@create')->name('proyectos.create')->middleware("authByName");
    Route::post('proyectos','ProyectosController@store')->name('proyectos.store');

    Route::get('proyectos/{proyectos}/show','ProyectosController@show')->name('proyectos.show');

    Route::get('proyectos/{proyectos}/edit','ProyectosController@edit')->name('proyectos.edit')->middleware("authByName");
    Route::put('proyectos/{proyectos}','ProyectosController@update')->name('proyectos.update');
    Route::delete('proyectos/{proyectos}','ProyectosController@destroy')->name('proyectos.destroy')->middleware("authByName");

    Route::get('crud','CrudController@index')->name('crud.index')->middleware("authByName");
});
