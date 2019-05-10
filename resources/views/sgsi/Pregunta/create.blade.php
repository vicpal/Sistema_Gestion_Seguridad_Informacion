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

    <div class="col-md-10">
        <!-- Horizontal Form -->
        <div class="box box-info" id="createPregunta">
            <div class="box-header with-border">
                <h3 class="box-title">Registrar Nueva Pregunta</h3>
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
                            <select class="form-control" name="dominio_id" id="dominio_id" required v-on:change="getControl">
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
                                    @foreach ($contr as $cont)
                                        @if($contr->count())
                                            <option value="{{ $cont->objcontrol->id }}">{{ $cont->objcontrol->nombre_objc }}</option>
                                        @endif
                                    @endforeach
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

                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Descripción de la Pregunta</label>
                        <div class="col-sm-8">
                            <input type="Text" name="nombre_preg" id="nombre_preg" class="form-control" placeholder="Descripción de la Pregunta" disabled required>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('preguntas.index') }}" class="btn btn-default">Volver al Listado</a>
                    <button type="submit" class="btn btn-primary pull-right">Crear Control</button>
                </div>
              <!-- /.box-footer -->
            </form>
        </div>
    </div>

@endsection