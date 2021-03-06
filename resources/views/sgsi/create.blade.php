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
            <li><a href="{{ route('dominios.index') }}"> Dominios</a></li>
            <li class="active"> Crear Dominios</li>
        </ol>
        <!-- FIN MAPA -->
    </section>
    <br/>
    <div class="col-md-10">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Crear Dominio</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('dominios.store') }}" method="POST" role="form">
            {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputNumber" class="col-sm-3 control-label">Número del Dominio</label>
                        <div class="col-sm-2">
                            <input type="number" name="numero_dom" class="form-control" id="inputNumber" placeholder="Número"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre del Dominio</label>
                        <div class="col-sm-8">
                            <input type="Text" name="nombre_dom" class="form-control" id="inputText" placeholder="Nombre del Dominio" required>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('dominios.index') }}" class="btn btn-default">Volver al Listado</a>
                    <button type="submit" class="btn btn-primary pull-right">Crear Dominio</button>
                </div>
              <!-- /.box-footer -->
            </form>
        </div>
    </div>

@endsection