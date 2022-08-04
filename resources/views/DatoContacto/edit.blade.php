
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
                        <h3 class="panel-title"> Editar Datos de Contacto</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{route('datoContacto.update', $datoContacto->id)}}" role="form">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PUT">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del empleado" value="{{ old('nombre', $datoContacto->nombre) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="email" id="email" class="form-control input-sm" placeholder="Email del empleado" value="{{ old('email', $datoContacto->email) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" name="telefono" id="telefono" class="form-control input-sm" placeholder="Telefono del empleado" value="{{ old('telefono', $datoContacto->telefono) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="direccion" id="direccion" class="form-control input-sm" placeholder="Direccion del empleado" value="{{ old('direccion', $datoContacto->direccion) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="estado" id="estado" class="form-control input-sm" placeholder="Estado" value="{{ old('estado', $datoContacto->estado) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" >Actualizar</button>
                                    <a href="{{ route('datoContacto.index')  }}" class="btn btn-default"> Atras</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection