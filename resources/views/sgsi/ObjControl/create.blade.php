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
                <h3 class="box-title">Registrar Nuevo Objetivo de Control</h3>
            </div>
            <!-- /.box-header -->
            <!-- Script para Habilitar los campos del Formulario -->
            <script>
                function cambio(){ $('#numero_objc').attr('disabled', false); $('#nombre_objc').attr('disabled',false);}
            </script>
             <!-- form start -->
            <form class="form-horizontal" action="{{ route('objcontrol.store') }}" method="POST" role="form">
            {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre del Dominio</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="dominio_id" id="dominio_id" required onChange="cambio()">
                                <option value=""> -- Escoja el Dominio -- </option>
                               @foreach ($dominios as $dominio)
                                    <option value="{{ $dominio->id }}">{{ $dominio->nombre_dom }}</option>
                               @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputNumber" class="col-sm-3 control-label">Núm. Obj Control</label>
                        <div class="col-sm-2">
                            <input type="number" name="numero_objc" id="numero_objc" class="form-control" placeholder="Número" disabled required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre del Objetivo de Control</label>
                        <div class="col-sm-8">
                            <input type="Text" name="nombre_objc" id="nombre_objc" class="form-control" placeholder="Nombre del Dominio" disabled required>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('objcontrol.index') }}" class="btn btn-default">Volver al Listado</a>
                    <button type="submit" class="btn btn-primary pull-right">Crear Obj-Control</button>
                </div>
              <!-- /.box-footer -->
            </form>
        </div>
    </div>

@endsection