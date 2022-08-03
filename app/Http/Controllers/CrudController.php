<?php

namespace App\Http\Controllers;

use App\Crud; 
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index()
    {
        //$crud = Crud::orderBy('id','DESC')->paginate(3);
        return view('crud.index');
    }
}
