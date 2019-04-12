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
                <h3 class="box-title">Editar Dominio</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('objcontrol.update', $objc->id) }}" method="POST" role="form">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre del Dominio</label>
                        <div class="col-sm-8">
                            <input type="Text" name="#" class="form-control" id="inputText" value="#" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputNumber" class="col-sm-3 control-label">Número Obj Control</label>
                        <div class="col-sm-2">
                            <input type="number" name="numero_objc" class="form-control" id="inputNumber" value="{{ $objc->numero_objc }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre del Objetivo del Control</label>
                        <div class="col-sm-8">
                            <input type="Text" name="nombre_objc" class="form-control" id="inputText"  value="{{ $objc->nombre_objc }}">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('objcontrol.index') }}" class="btn btn-default">Volver al Listado</a>
                    <button type="submit" class="btn btn-primary pull-right">Editar Obj-Control</button>
                </div>
              <!-- /.box-footer -->
            </form>
        </div>
    </div>

@endsection