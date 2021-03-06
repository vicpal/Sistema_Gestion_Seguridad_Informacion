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
            <li><a href="{{ route('control.index') }}"> Controles</a></li>
            <li class="active"> Editar Control</li>
        </ol>
        <!-- FIN MAPA -->
    </section>
    <br/>
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Control</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('control.update', $contr->id) }}" method="POST" role="form">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre del Dominio</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="dominio_id" id="dominio_id" disabled>
                                <option value="{{ $contr->dominio->id }}">{{ $contr->dominio->nombre_dom }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre del Obj Control</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="objcontrol_id" id="objcontrol_id" disabled>
                                <option value="{{ $contr->objcontrol->id }}">{{ $contr->objcontrol->nombre_objc }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputNumber" class="col-sm-3 control-label">Núm. Control</label>
                        <div class="col-sm-2">
                            <input type="number" name="numero_con" id="numero_con" class="form-control" value="{{ $contr->numero_con }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre del Control</label>
                        <div class="col-sm-8">
                            <input type="Text" name="nombre_con" id="nombre_con" class="form-control" value="{{ $contr->nombre_con }}">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('control.index') }}" class="btn btn-default">Volver al Listado</a>
                    <button type="submit" class="btn btn-primary pull-right">Editar Control</button>
                </div>
              <!-- /.box-footer -->
            </form>
        </div>
    </div>

@endsection