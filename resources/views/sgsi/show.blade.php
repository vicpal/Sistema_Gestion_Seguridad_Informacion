@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row-fluid">
        <div class="col-sm-10">
            <h4>
                Listado de Dominios Registrados
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
                    @foreach($dominios as $dominio)
                    <tr>
                        <td>{{ $dominio->id }}</td>
                        <td>{{ $dominio->numero_dom }}</td>
                        <td>{{ $dominio->nombre_dom }}</td>
                        <td>ver</td>
                        <td>editar</td>
                        <td>borrar</td>
                    </tr>
                    @endforeach
                </tbody> 
            </table><a href="{{ route('dominios.create') }}" class="btn btn-primary pull-left">Nuevo</a>
        </div>
    </div>
</div>
@endsection