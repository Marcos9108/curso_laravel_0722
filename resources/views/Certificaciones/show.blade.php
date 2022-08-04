@extends('layouts.app')
@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Datos de certificacion</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-control">ID: {{$certificaciones->id}}</label>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-control">Nombre: {{$certificaciones->nombre}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-control">Proveedor: {{$certificaciones->proveedor}}</label>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-control">Duracion: {{$certificaciones->duracion}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-control">Validez: {{$certificaciones->validez == 0 ? 'Nacional':'Internacional'}}</label>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-control">Expira: {{$certificaciones->expira}}</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <a href="{{ route('certificaciones.index') }}" class="btn btn-info btn-block" >Atrás</a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection