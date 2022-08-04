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
                        <h3 class="panel-title"> Editar Certificado </h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{route('certificaciones.update', $certificaciones->id)}}" role="form">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PUT">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del certificado" value="{{ old('nombre', $certificaciones->nombre) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="proveedor">Proveedor</label>
                                        <input type="text" name="proveedor" id="proveedor" class="form-control input-sm" placeholder="Proveedor del certificado" value="{{ old('proveedor', $certificaciones->proveedor) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="duracion">Duracion</label>
                                        <input type="date" name="duracion" id="duracion" class="form-control input-sm" value="{{ old('duracion', $certificaciones->duracion) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Validez</label>
                                        <span class="input-group-addon">
                                            <input type="radio" name="validez" id="validez0" value="0" {{ old('validez', $certificaciones->validez == 0 ? 'checked':'')}}> Nacional
                                            <input type="radio" name="validez" id="validez1" value="1" {{ old('validez', $certificaciones->validez == 1 ? 'checked':'')}}> Internacional
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="expira">Expira</label>
                                        <input type="date" name="expira" id="expira" class="form-control input-sm" value="{{ old('expira', $certificaciones->expira) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                    <a href="{{ route('certificaciones.index') }}" class="btn btn-default">Atras</a>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </section>
    </div>

@endsection