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
                        <h3 class="panel-title"> Agregar Certificación</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{route('certificaciones.store')}}">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del certificado" value="{{ old('nombre') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="proveedor" id="proveedor" class="form-control input-sm" placeholder="Proveedor del certificado" value="{{ old('proveedor') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span class="input-group-addon">
                                            <label>Validez:  </label>
                                            <input type="radio" name="validez" id="validez0" value="0" checked> Nacional
                                            <input type="radio" name="validez" id="validez1" value="1"> Internacional
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="duracion">Duracion del certificado</label>
                                        <input type="date" name="duracion" id="duracion" class="form-control input-sm" value="{{ old('duracion') }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="expira">Vencimiento del certificado</label>
                                            <input type="date" name="expira" id="expira" class="form-control input-sm" value="{{ old('expira') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                    <a href="{{ route('certificaciones.index')  }}" class="btn btn-default"> Atras</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection