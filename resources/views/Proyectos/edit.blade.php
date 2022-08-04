
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
                        <h3 class="panel-title"> Editar Proyectos</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{route('proyectos.update', $proyectos->id)}}" role="form">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PUT">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del eproyecto" value="{{ old('nombre', $proyectos->nombre) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="lenguajeProgramacion" id="lenguajeProgramacion" class="form-control input-sm" placeholder="Lenguaje de Programacion" value="{{ old('lenguajeProgramacion', $proyectos->lenguajeProgramacion) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="plataforma" id="plataforma" class="form-control input-sm" placeholder="Plataforma" value="{{ old('plataforma', $proyectos->plataforma) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" name="porcentajeAvance" id="porcentajeAvance" class="form-control input-sm" placeholder="Porcentaje de Avance" value="{{ old('porcentajeAvance', $proyectos->porcentajeAvance) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <input type="text" name="personalInvolucrado" id="personalInvolucrado" class="form-control input-sm" placeholder="Personal Involucrado" value="{{ old('personalInvolucrado', $proyectos->personalInvolucrado) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" >Actualizar</button>
                                    <a href="{{ route('proyectos.index')  }}" class="btn btn-default"> Atras</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection