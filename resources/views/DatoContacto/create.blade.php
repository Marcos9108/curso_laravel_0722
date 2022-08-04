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
                        <h3 class="panel-title"> Agregar Contacto</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{route('datoContacto.store')}}">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label class="form-label">Ingresar nombre de empleado</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del empleado" value="{{ old('nombre') }}">
                                    </div>
                            </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Email address</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com"  value="{{ old('email') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label class="form-label">Telefono</label>
                                        <input type="number" name="telefono" id="telefono" class="form-control input-sm" placeholder="Telefono del empleado" value="{{ old('telefono') }}">
                                    </div>
                                </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                    <label class="form-label">Direccion</label>
                                        <input type="text" name="direccion" id="direccion" class="form-control input-sm" placeholder="Direccion del empleado" value="{{ old('direccion') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-md-4">
                                    <div class="form-group">
                                    <label class="form-label">Estado</label>
                                    <br>
                                    <select class="form-select" name="estado">
                                        <option selected>Seleccionar estado</option>
                                        <option value="1">Aguascalientes</option>
                                        <option value="2">Baja California </option>
                                        <option value="3">Baja California Sur</option>
                                        <option value="4">Campeche</option>
                                        <option value ="5">Chiapas</option>
                                        <option value ="6">Chihuahua</option>
                                        <option value ="7">Coahuila </option>
                                        <option value ="8">Colima</option>
                                        <option value ="9">CDMX</option>
                                        <option value ="10">Durango</option>
                                        <option value ="11">Estado de México </option>
                                        <option value ="12">Guanajuato</option>
                                        <option value ="13">Guerrero</option>
                                        <option value ="14">Hidalgo</option>
                                        <option value ="15">Jalisco</option>
                                        <option value ="16">Michoacán</option>
                                        <option value ="17">Morelos</option>                                     
                                        <option value ="18">Nayarit</option>
                                        <option value ="19">Nuevo León</option>
                                        <option value ="20">Oaxaca</option>
                                        <option value ="21">Puebla</option>
                                        <option value ="22">Querétaro</option>
                                        <option value ="23">Quintana Roo</option>
                                        <option value ="24">San Luis Potosí</option>
                                        <option value ="25">Sinaloa</option>
                                        <option value ="26">Sonora</option>
                                        <option value ="27">Tabasco</option>
                                        <option value ="28">Tamaulipas</option>
                                        <option value ="29">Tlaxcala</option>
                                        <option value ="30">Veracruz</option>
                                        <option value ="31">Yucatán</option>
                                        <option value ="32">Zacatecas</option>
                                        </select>                                    
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" >Guardar</button>
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
