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
            <li><a href="{{ route('preguntas.index') }}"> Preguntas</a></li>
            <li class="active"> Crear Preguntas</li>
        </ol>
        <!-- FIN MAPA -->
    </section>
    <br/>
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info" id="createPregunta">
            <div class="box-header with-border">
                <h3 class="box-title">Crear Pregunta</h3>
            </div>
            <!-- /.box-header -->
            <!-- Script para Habilitar los campos del Formulario -->
            <script>
                function cambio(){ }
            </script>
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('preguntas.store') }}" method="POST" role="form">
            {{ csrf_field() }}
                <div class="box-body">
                   
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre del Dominio</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="dominio_id" id="dominio_id" required v-on:change="getObjetivo">
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
                            <select class="form-control" name="objcontrol_id" id="objcontrol_id" disabled required v-on:change="getControl">
                                <option value=""> -- Escoja el Obj de Control -- </option>
                                @verbatim
                                    <option v-for="val in objc" v-bind:value="val.id">{{ val.nombre_objc }}</option>
                                @endverbatim
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre del Control</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="control_id" id="control_id" disabled required>
                                <option value=""> -- Escoja el Control -- </option>
                                @verbatim
                                    <option v-for="val in contr" v-bind:value="val.id">{{ val.nombre_con }}</option>
                                @endverbatim
                            </select>
                        </div>
                    </div>
                    <!-- Campo de Pregunta Inhabilitado por Campos Dinamicos para las Preguntas 
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Descripción de la Pregunta</label>
                        <div class="col-sm-8">
                            <input type="Text" name="nombre_preg" id="nombre_preg" class="form-control" placeholder="Descripción de la Pregunta" disabled required>
                        </div>
                    </div> -->
                    <!-- Desde Aqui comienza la prueba de campos dinamicos -->
                    <div class="form-group">
                        <a id="agregarCampo" class="btn btn-primary" href="#">Add</span></a>
                        <label for="inputText" class="col-sm-3 control-label">Pregunta</label>
                        <div class="col-sm-8">
                            <div id="contenedor">
                                <div class="added">     <!-- nombre_preg[] -->
                                    <input type="Text" name="nombre_preg[]" id="nombre_preg" class="form-control" placeholder="Pregunta 1" disabled required>
                                        </br><!-- <a class="eliminar" href="#"><span class="glyphicon glyphicon-remove"></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Campos Dinamicos -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('preguntas.index') }}" class="btn btn-default">Volver al Listado</a>
                    <button type="submit" class="btn btn-primary pull-right">Crear Pregunta</button>
                </div>
              <!-- /.box-footer -->
            </form>
        </div>
    </div>

@endsection