@extends('layouts.layout')

@section('content')

    <form action="{{ route('dominios.store') }}" method="POST" role="form">
        {{ csrf_field() }}

        <legend>Registrar Nuevo Dominio</legend>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputNumber">Número del Dominio</label>
                <input type="number" name="numero_dom" class="form-control" id="inputNumber" placeholder="Número del Dominio">
            </div>
            <div class="form-group col-md-10">
                <label for="inputText">Nombre del Dominio</label>
                <input type="Text" name="nombre_dom" class="form-control" id="inputText" placeholder="Nombre del Dominio">
            </div>
        </div>
        
            <button type="submit" class="btn btn-primary pull-left">Crear Registro</button>
    </form>

@endsection