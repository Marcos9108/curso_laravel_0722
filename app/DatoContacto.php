<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datoContacto extends Model
{

    protected $table = 'datoContacto';

    protected $fillable = ['id','nombre','email','telefono','direccion','estado'];

}
