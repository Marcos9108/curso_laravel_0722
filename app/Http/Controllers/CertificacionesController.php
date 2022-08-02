<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificacionesController extends Controller
{
    
    //
    public function index()
    {
        return view('Certificaciones.index');
    }
}
