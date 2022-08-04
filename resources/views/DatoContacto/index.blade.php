@extends('layouts.app')
@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                @if(\Illuminate\Support\Facades\Session::has('success'))
                    <div class="alert alert-info">
                        {{\Illuminate\Support\Facades\Session::get('success')}}
                    </div>
                @endif
                <div class="panel-body">
                    <div><h3>Lista Datos de Contacto de Empleados</h3></div>

                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{route('datoContacto.create')}}" class="btn btn-success">Añadir datos de empleado</a>
                        </div>
                    </div>

                    <div class="table-container">
                        <table id="tablaDatoContacto" class="table table-bordered table-striped">
                            <thead>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>

                            @if($datosContactos->count())
                                @foreach($datosContactos as $datoContacto)
                                    <tr>
                                        <td>{{$datoContacto->nombre}}</td>
                                        <td>{{$datoContacto->email}}</td>
                                        <td>{{$datoContacto->telefono}}</td>
                                        <td>{{$datoContacto->direccion}}</td>
                                        <td>{{$datoContacto->estado}}</td>
                                        <td>
                                            
                                            <a class="btn btn-primary btn-xs" href="{{route('datoContacto.show', $datoContacto->id)}}" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                            <a class="btn btn-primary btn-xs" href="{{route('datoContacto.edit', $datoContacto->id)}}" ><span class="glyphicon glyphicon-edit"></span></a>

                                            <form action="{{route('datoContacto.destroy', $datoContacto->id)}}" method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">

                                                <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">No hay registros</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection