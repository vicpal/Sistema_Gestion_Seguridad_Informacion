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
            <li class="active"> Crear Usuarios</li>
        </ol>
        <!-- FIN MAPA -->
    </section>
    <br/>
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Crear Usuario</h3>
            </div>
            <!-- /.box-header -->
            <!-- Script para Habilitar los campos del Formulario -->
            <script>
                function cambio(){ $('#nombre').attr('disabled', false); $('#correo').attr('disabled',false); $('#clave').attr('disabled',false);}
            </script>
             <!-- form start -->
            <form class="form-horizontal" action="{{ route('usuario.store') }}" method="POST" role="form">
            {{ csrf_field() }}
                <div class="box-body">

                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Tipos de Usuario</label>
                        <div class="col-sm-2">
                            <select class="form-control" name="rol_id" id="rol_id" required onChange="cambio()">
                                <option value=""> -- Escoja el Tipo -- </option>
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->nombre_rol }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre del Usuario</label>
                        <div class="col-sm-8">
                            <input type="Text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del Usuario" disabled required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-3 control-label">Correo Eléctronico</label>
                        <div class="col-sm-8">
                            <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo Eléctronico" disabled required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Clave del Usuario</label>
                        <div class="col-sm-8">
                            <input type="password" name="clave" id="clave" class="form-control" placeholder="Clave" pattern=".{6,}" title="Minimo 6 characteres" autocomplete="off" disabled required>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('usuario.index') }}" class="btn btn-default">Volver al Listado</a>
                    <button type="submit" class="btn btn-primary pull-right">Crear Usuario</button>
                </div>
              <!-- /.box-footer -->
            </form>
        </div>
    </div>

@endsection