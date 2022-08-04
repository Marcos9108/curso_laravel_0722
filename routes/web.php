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
use App\Http\Controllers\ProyectosController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


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


    //Route::resource('proyectos', 'ProyectosController');
    Route::get('proyectos','ProyectosController@index')->name('proyectos.index');
    Route::get('proyectos/create','ProyectosController@create')->name('proyectos.create')->middleware("authByName");
    Route::post('proyectos','ProyectosController@store')->name('proyectos.store');

    Route::get('proyectos/{proyectos}/show','ProyectosController@show')->name('proyectos.show');

    Route::get('proyectos/{proyectos}/edit','ProyectosController@edit')->name('proyectos.edit')->middleware("authByName");
    Route::put('proyectos/{proyectos}','ProyectosController@update')->name('proyectos.update');
    Route::delete('proyectos/{proyectos}','ProyectosController@destroy')->name('proyectos.destroy')->middleware("authByName");

//Route::get('/proyectos', [ProyectosController::class, 'index']);
});



