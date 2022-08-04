@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Menú</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    ¡Estás conectado!

                    <div class="col-xs-12 col-sm-12 col-md-12"> <br>
                        <a href="{{ route('empleado.index') }}" class="btn btn-info btn-block" >Ir a empleados</a>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12"> <br>
                        <a href="{{ route('proyectos.index') }}" class="btn btn-info btn-block" >Ir a Proyectos</a>
                    </div>

                  

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
