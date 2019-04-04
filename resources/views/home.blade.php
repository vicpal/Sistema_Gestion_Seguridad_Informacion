@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            Bienvenido al Sistema de Gestion de la Seguridad de la Información
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12">
            Listado de Dominios Registrados
            <a href="{{ route('dominios.create') }}" class="btn btn-primary pull-right">
                Nuevo
            </a>
            <br><br>
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
                    @foreach ($dominios as $dominio)
                        <tr>
                            <td>{{ $dominio->id }}</td>
                            <td><strong>{{ $dominio->numero_dom }}</strong></td>
                            <td><strong>{{ $dominio->nombre_dom }}</strong></td>
                            <td>ver</td>
                            <td>editar</td>
                            <td>borrar</td>
                        </tr>
                    @endforeach
                </tbody> 
            </table>
            {{!! $dominios->render() !!}}
        </div>
    </div>
</div>
@endsection
