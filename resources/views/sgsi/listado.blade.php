@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <h4><strong>
                Listado de Dominios Registrados GTC-IEC/ISO 27002:2015</strong>
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
                        <!-- <td>ver</td> -->
                        <td>
                            <a href="{{ route('dominios.edit', $dominio->id) }}">Editar</a>
                        </td>
                        <td>Eliminar</td>
                    </tr>
                    @endforeach
                </tbody> 
            </table>
        </div>
    </div>
</div>

@endsection

