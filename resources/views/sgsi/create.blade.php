@extends('layouts.layout')

@section('content')

	<form action="" method="POST">
        <legend>Crear</legend>

        <div>
            <label for="">Número del Dominio</label>
            <input name="numero_dom" type="numero" class="form-control" id="" placeholder="Número del Dominio">
        </div>

        <div>
            <label for="">Nombre del Dominio</label>
            <input name="nombre_dom" type="nombre" class="form-control" id="" placeholder="Nombre del Dominio">
        </div>       

    </form>

@endsection