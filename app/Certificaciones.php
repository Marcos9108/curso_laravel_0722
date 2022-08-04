<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificaciones extends Model
{

    protected $table = 'certificaciones';

    protected $fillable = ['id','nombre','proveedor','duracion','validez','expira'];

}
