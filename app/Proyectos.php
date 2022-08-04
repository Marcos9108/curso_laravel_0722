<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    protected $table = 'proyectos';

    protected $fillable = ['id','nombre','lenguajeProgramacion','plataforma','porcentajeAvance','personalInvolucrado'];
}
