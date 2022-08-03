<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function __construct()
    {
        //Linea para agregar un Middleware a las funciones del controlador
        /*$this->middleware('auth')->except('index','create');
        $this->middleware('authByName')->only('create','edit','destroy');*/
    }

    public function index()
    {
        return view('crud.index');
    }
}
