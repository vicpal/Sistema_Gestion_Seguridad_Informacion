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
        <div class="alert alert-info">
            {{Session::get('success')}}
        </div>
    @endif

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