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
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sistema de Gestión de la Seguridad de la Información <br>
            <!-- <small>Inicia Aqui</small> -->
        </h1>
        <!-- MAPA DE SITIO -->
        <ol class="breadcrumb">
            <li><a href="http://127.0.0.1:8000/sgsi"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('usuario.index') }}"> Usuarios</a></li>
            <li class="active"> Editar Usuarios</li>
        </ol>
        <!-- FIN MAPA -->
    </section>
    <br/>
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Usuario</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('usuario.update', $usua->id) }}" method="POST" role="form">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Tipo de Usuario</label>
                        <div class="col-sm-2">
                            <select class="form-control" name="rol_id" id="rol_id" disabled>
                                <option value="{{ $usua->rol_id }}">{{ $usua->rol->nombre_rol }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre</label>
                        <div class="col-sm-6">
                            <input type="Text" name="nombre" id="nombre" class="form-control" value="{{ $usua->nombre }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-3 control-label">Correo</label>
                        <div class="col-sm-6"> <!-- NO VALIDA LA ESTRUCTURA DE CORREO html -->
                            <input type="email" name="correo" id="correo" class="form-control" value="{{ $usua->correo }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-3 control-label">Clave</label>
                        <div class="col-sm-6">
                            <input type="Password" name="clave" id="clave" class="form-control" pattern=".{6,}" title="Minimo 6 characteres" autocomplete="off" value="{{ $usua->clave }}" required>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('usuario.index') }}" class="btn btn-default">Volver al Listado</a>
                    <button type="submit" class="btn btn-primary pull-right">Editar Usuario</button>
                </div>
              <!-- /.box-footer -->
            </form>
        </div>
    </div>

@endsection