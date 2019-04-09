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

<form action="{{ route('dominios.update',$dominios->id) }}" method="POST" role="form">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <legend>Editar Dominio</legend>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputNumber">Número del Dominio</label>
                <input type="text" name="numero_dom" class="form-control" id="inputNumber" value="{{ $dominios->numero_dom }}">
            </div>
            <div class="form-group col-md-10">
                <label for="inputText">Nombre del Dominio</label>
                <input type="Text" name="nombre_dom" class="form-control" id="inputText"  value="{{ $dominios->nombre_dom }}">
            </div>
        </div>
        
            <button type="submit" class="btn btn-primary pull-left">Editar Registro</button>
            <a href="{{ route('dominios.index') }}">Atras</a>
    </form>

@endsection