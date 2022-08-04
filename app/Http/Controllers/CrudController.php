<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;

class CrudController extends Controller
{

    

    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(3);
        return view('crud.index');
    }
}
