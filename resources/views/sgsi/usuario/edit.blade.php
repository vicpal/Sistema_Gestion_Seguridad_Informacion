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
                        <div class="col-sm-3">
                            <select class="form-control" name="tipoid" id="tipoid" disabled>
                                <option value="{{ $usua->tipoid }}">{{ $usua->tipoid }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputNumber" class="col-sm-3 control-label">Nombre</label>
                        <div class="col-sm-6">
                            <input type="Text" name="nombre" id="nombre" class="form-control" value="{{ $usua->nombre }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputNumber" class="col-sm-3 control-label">Correo</label>
                        <div class="col-sm-6">
                            <input type="Text" name="correo" id="correo" class="form-control" value="{{ $usua->correo }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Clave</label>
                        <div class="col-sm-6">
                            <input type="Password" name="clave" id="clave" class="form-control" value="{{ $usua->clave }}">
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