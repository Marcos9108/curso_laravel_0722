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
                    <div><h3>Lista Proyectos</h3></div>

                    <div class="pull-right">
                        <div class="btn-group">
                            <div class="row">
                                <div class="col-md-12">
                            <a href="{{route('proyectos.create')}}" class="btn btn-success">Añadir Proyecto</a>
                            <a href="{{route('home')}}"class="btn btn-success"> Atras</a>
                            
                        </div>
                    </div>
                        </div>
                    </div>

                    <div class="table-container">
                       <br> <table id="tablaProyectos" class="table table-bordered table-striped">
                            <thead>
                                <th>Nombre</th>
                                <th>Lenguaje de Programacion</th>
                                <th>Plataforma</th>
                                <th>Porcentaje Avance %</th>
                                <th>Personal Involucrado</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>

                            @if($proyectos->count())
                                @foreach($proyectos as $proyectos)
                                    <tr>
                                        <td>{{$proyectos->nombre}}</td>
                                        <td>{{$proyectos->lenguajeProgramacion}}</td>
                                        <td>{{$proyectos->plataforma}}</td>
                                        <td>{{$proyectos->porcentajeAvance}}</td>
                                        <td>{{$proyectos->personalInvolucrado}}</td>
                                        <td>
                                            
                                            <a class="btn btn-primary btn-xs" href="{{route('proyectos.show', $proyectos->id)}}" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                            <a class="btn btn-primary btn-xs" href="{{route('proyectos.edit', $proyectos->id)}}" ><span class="glyphicon glyphicon-edit"></span></a>

                                            <form action="{{route('proyectos.destroy', $proyectos->id)}}" method="post">
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