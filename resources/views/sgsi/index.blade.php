@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">Bienvenido al Sistema de Gestion de la Seguridad de la Información</div><br>
    <div class="row-fluid">
        <div class="col-sm-12">
            <h4>
                Listado de Dominios Registrados
                <a href="{{ route('dominios.create') }}" class="btn btn-primary pull-right">Nuevo</a>
            </h4>
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th width="50px">ID</th>
                        <th>Numero del Dominio</th>
                        <th>Nombre del Dominio</th>
                        <th colspan="3">&nbsp</th>
                    </tr>
                </thead>
                <tbody>

                </tbody> 
            </table>
        </div>
    </div>
</div>
@endsection
