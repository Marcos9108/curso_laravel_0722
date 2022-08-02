@extends('layouts.app')
@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div><h3>Lista Certificaciones</h3></div>
                </div>

                <div class="table-container">
                    <table id="tablaCertificaciones" class="table table-bordered table-striped">
                        <thead>
                            <th>Nombre</th>
                            <th>Proveedor</th>
                            <th>Duracion</th>
                            <th>Validez</th>
                            <th>Expira</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nombre</td>
                                <td>Proveedor</td>
                                <td>2022-08-02</td>
                                <td>Nacional</td>
                                <td>2022-09-02</td>
                                <td>
                                    <a class="btn btn-primary btn-xs" href=""><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a class="btn btn-primary btn-xs" href=""><span class="glyphicon glyphicon-edit"></span></a>
                                    <form action="" method="post">
                                        <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection