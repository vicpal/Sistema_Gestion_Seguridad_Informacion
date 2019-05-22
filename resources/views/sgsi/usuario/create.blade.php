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

    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Registrar Nuevo Usuario</h3>
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
                        <div class="col-sm-4">
                            <select class="form-control" name="tipoid" id="tipoid" required onChange="cambio()">
                                <option value=""> -- Escoja el Tipo -- </option>
                                @foreach ($usua as $usu)
                                    <option value="{{ $usu->id }}">{{ $usu->tipo_nombre }}</option>
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
                            <input type="password" name="clave" id="clave" class="form-control" placeholder="Clave" disabled required>
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