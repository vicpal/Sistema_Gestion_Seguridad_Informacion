@extends('layouts.layout')

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Error!</strong> Revise los campos obligatorios.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-info" class="close">
            {{Session::get('success')}}
        </div>
    @endif

<!-- Desde aqui comienza la tabla de los Datos consultados en la BD -->

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
                            <a href="{{ route('dominios.edit', $dominio->id) }}" class="btn btn-primary btn-xs" method="POST"><span class="glyphicon glyphicon-pencil"></span></a>
                        </td>
                        <td>
                            <form action="{{ route('dominios.destroy', $dominio->id) }}" method="POST">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

