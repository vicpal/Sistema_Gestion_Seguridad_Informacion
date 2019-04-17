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
                <h3 class="box-title">Registrar Nuevo Control</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('control.store') }}" method="POST" role="form">
            {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre del Dominio</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="id" id="id" required>
                                <option value=""> -- Escoja el Dominio -- </option>
                               @foreach ($contr as $cont)
                                    <option value="{{ $cont->id }}">{{ $cont->nombre_dom }}</option>
                               @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre del Obj Control</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="dominio_id" id="dominio_id" required>
                                <option value=""> -- Escoja el Obj de Control -- </option>
                               @foreach ($contr as $cont)
                                    <option value="{{ $cont->dominio_id }}">{{ $cont->nombre_objc }}</option>
                               @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputNumber" class="col-sm-3 control-label">Núm. Control</label>
                        <div class="col-sm-2">
                            <input type="number" name="numero_con" id="numero_con" class="form-control" placeholder="Número">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre del Control</label>
                        <div class="col-sm-8">
                            <input type="Text" name="nombre_con" id="nombre_con" class="form-control" placeholder="Nombre del Dominio">
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