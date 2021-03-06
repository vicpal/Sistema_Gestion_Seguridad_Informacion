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
            <li class="active"> Crear Control</li>
        </ol>
        <!-- FIN MAPA -->
    </section>
    <br/>
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info" id="createControl">
            <div class="box-header with-border">
                <h3 class="box-title">Crear Control</h3>
            </div>
            <!-- /.box-header -->
            <!-- Script para Habilitar los campos del Formulario -->
            <script>
                function cambio(){ }
            </script>
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('control.store') }}" method="POST" role="form">
            {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre del Dominio</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="dominio_id" id="dominio_id" required v-on:change="getObjcontrol">
                                <option value=""> -- Escoja el Dominio -- </option>
                                @foreach ($contr as $cont)
                                    @if($contr->count())
                                        <option value="{{ $cont->dominio->id }}">{{ $cont->dominio->nombre_dom }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre del Obj Control</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="objcontrol_id" id="objcontrol_id" disabled required>
                                <option value=""> -- Escoja el Obj de Control -- </option>
                                @verbatim
                                <option v-for="val in objc" v-bind:value="val.id">{{ val.nombre_objc }}</option>
                                @endverbatim
                            </select>
                        </div>
                    </div>
<!--
                    <div class="form-group">
                        <label for="inputNumber" class="col-sm-3 control-label">Núm. Control</label>
                        <div class="col-sm-2">
                            <input type="number" name="numero_con" id="numero_con" class="form-control" placeholder="{{ $contr }}" disabled required>{{ $contr }}
                        </div>
                    </div>
-->
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre del Control</label>
                        <div class="col-sm-8">
                            <input type="Text" name="nombre_con" id="nombre_con" class="form-control" placeholder="Nombre del Dominio" disabled required>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('control.index') }}" class="btn btn-default">Volver al Listado</a>
                    <button type="submit" class="btn btn-primary pull-right">Crear Control</button>
                </div>
              <!-- /.box-footer -->
            </form>
        </div>
    </div>

@endsection