
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
                        <form method="POST" action="{{route('empleado.update', $empleado->id)}}" role="form">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PUT">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del empleado" value="{{ old('nombre', $empleado->nombre) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="puesto" id="puesto" class="form-control input-sm" placeholder="Puesto del empleado" value="{{ old('puesto', $empleado->puesto) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" name="edad" id="edad" class="form-control input-sm" placeholder="Edad del empleado" value="{{ old('edad', $empleado->edad) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" name="salario" id="salario" class="form-control input-sm" placeholder="Salario del empleado" value="{{ old('salario', $empleado->salario) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control">Activo</label>
                                        <input type="checkbox" name="activo" id="activo" class="form-control input-sm" {{$empleado->activo == 1 ? 'checked': ''}}>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" >Actualizar</button>
                                    <a href="{{ route('empleado.index')  }}" class="btn btn-default"> Atras</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection