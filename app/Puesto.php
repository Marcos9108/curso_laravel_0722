<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $table = 'puesto';

    protected $fillable = ['id','nombre','requisitos','rango_salario','puestos_disponibles','salario'];
}
