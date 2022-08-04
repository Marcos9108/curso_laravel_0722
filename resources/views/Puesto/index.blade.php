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
                    <div><h3>Lista Puestos</h3></div>

                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{route('puesto.create')}}" class="btn btn-success">Añadir puesto</a>
                            <a href="{{ route('home')  }}" class="btn btn-default"> Regresar</a>
                        </div>
                    </div>
                    

                    <div class="table-container">
                        <table id="tablaPuesto" class="table table-bordered table-striped">
                            <thead>
                                <th>Nombre</th>
                                <th>Requisitos</th>
                                <th>Rango Salario</th>
                                <th>Puestos Disponibles</th>
                            </thead>
                            <tbody>

                            @if($puesto->count())
                                @foreach($puesto as $puesto)
                                    <tr>
                                        <td>{{$puesto->nombre}}</td>
                                        <td>{{$puesto->requisitos}}</td>
                                        <td>{{$puesto->rango_salario}}</td>
                                        <td>{{$puesto->puestos_disponibles}}</td>
                                        <td>
                                            
                                            <a class="btn btn-primary btn-xs" href="{{route('puesto.show', $puesto->id)}}" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                            <a class="btn btn-primary btn-xs" href="{{route('puesto.edit', $puesto->id)}}" ><span class="glyphicon glyphicon-edit"></span></a>

                                            <form action="{{route('puesto.destroy', $puesto->id)}}" method="post">
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