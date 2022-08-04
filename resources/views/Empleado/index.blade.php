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
                    <div><h3>Lista Empleados</h3></div>

                    <div class="pull-right">

                        <div class="btn-group">
                            <a href="{{route('crud.index')}}" class="btn btn-success">Añadir empleados con rol</a>
                        </div>

                        <div class="btn-group">
                            <a href="{{route('empleado.create')}}" class="btn btn-success">Añadir empleado</a>
                        </div>
                    </div>

                    <div class="table-container">
                        <table id="tablaEmpleados" class="table table-bordered table-striped">
                            <thead>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Puesto</th>
                                <th>Activo</th>
                                <th>Salario</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>

                            @if($empleados->count())
                                @foreach($empleados as $empleado)
                                    <tr>
                                        <td>{{$empleado->nombre}}</td>
                                        <td>{{$empleado->edad}}</td>
                                        <td>{{$empleado->puesto}}</td>
                                        <td>{{$empleado->activo}}</td>
                                        <td>{{$empleado->salario}}</td>
                                        <td>
                                            
                                            <a class="btn btn-primary btn-xs" href="{{route('empleado.show', $empleado->id)}}" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                            <a class="btn btn-primary btn-xs" href="{{route('empleado.edit', $empleado->id)}}" ><span class="glyphicon glyphicon-edit"></span></a>

                                            <form action="{{route('empleado.destroy', $empleado->id)}}" method="post">
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