
@extends('layouts.app')
@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                @if(count($errors) >0)
                    <div class="alert alert-warning">
                        {!! trans('validation.mesg_error_validate') !!}

                        <ul>
                            @foreach($errors->all() as $error)
                                <li> {{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Editar Empleado</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{route('puesto.update', $puesto->id)}}" role="form">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PUT">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del puesto" value="{{ old('nombre', $puesto->nombre) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="requisitos" id="requisitos" class="form-control input-sm" placeholder="Requisitos del puesto" value="{{ old('requisitos', $puesto->requisitos) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="rango_salario" id="rango_salario" class="form-control input-sm" placeholder="Rangos de salarios" value="{{ old('rango_salario', $puesto->rango_salario) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="puestos_disponibles" id="puestos_disponibles" class="form-control input-sm" placeholder="puestos vacantes" value="{{ old('puestos_disponibles', $puesto->puestos_disponibles) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" >Actualizar</button>
                                    <a href="{{ route('puesto.index')  }}" class="btn btn-default"> Regresar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection