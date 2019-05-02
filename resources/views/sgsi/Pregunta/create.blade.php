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
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Registrar Nueva Pregunta</h3>
            </div>
            <!-- /.box-header -->
            <!-- Script para Habilitar los campos del Formulario -->
            <script>
                function cambio(){ $('#numero_preg').attr('disabled',false); $('#nombre_preg').attr('disabled',false);}
            </script>
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('preguntas.store') }}" method="POST" role="form">
            {{ csrf_field() }}
                <div class="box-body">

                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Dominio</label>
                        <div class="col-sm-2">
                            <select class="form-control" name="control_id" id="control_id" required onChange="cambio()">
                                <option value=""> -- Dominio -- </option>
                                @foreach ($contr as $cont)
                                    <option value="{{ $cont->id }}">{{ $cont->numero_dom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="inputText" class="col-sm-2 control-label">ObjControl</label>
                        <div class="col-sm-2">
                            <select class="form-control" name="control_id" id="control_id" required onChange="cambio()">
                                <option value=""> -- Objetivo -- </option>
                                @foreach ($contr as $cont)
                                    <option value="{{ $cont->id }}">{{ $cont->numero_objc }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre del Control</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="control_id" id="control_id" required onChange="cambio()">
                                <option value=""> -- Escoja el Control -- </option>
                                @foreach ($contr as $cont)
                                    <option value="{{ $cont->id }}">{{ $cont->nombre_con }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Descripción de la Pregunta</label>
                        <div class="col-sm-8">
                            <input type="Text" name="nombre_preg" id="nombre_preg" class="form-control" placeholder="Pregunta" disabled required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Descripción de la Pregunta</label>
                        <div class="col-sm-8">
                            <input type="Text" name="nombre_preg" id="nombre_preg" class="form-control" placeholder="Pregunta" disabled required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Descripción de la Pregunta</label>
                        <div class="col-sm-8">
                            <input type="Text" name="nombre_preg" id="nombre_preg" class="form-control" placeholder="Pregunta" disabled required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Descripción de la Pregunta</label>
                        <div class="col-sm-8">
                            <input type="Text" name="nombre_preg" id="nombre_preg" class="form-control" placeholder="Pregunta" disabled required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Descripción de la Pregunta</label>
                        <div class="col-sm-8">
                            <input type="Text" name="nombre_preg" id="nombre_preg" class="form-control" placeholder="Pregunta" disabled required>
                        </div>
                    </div>

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