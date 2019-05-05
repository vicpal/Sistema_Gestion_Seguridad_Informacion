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
                <h3 class="box-title">Editar Control</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('preguntas.update', $pregu->id) }}" method="POST" role="form">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
                <div class="box-body">
                <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Nombre del Control</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="control_id" id="control_id" disabled>
                                <option value="{{ $pregu->control->id }}">{{ $pregu->control->nombre_con }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputNumber" class="col-sm-3 control-label">Núm. Pregunta</label>
                        <div class="col-sm-2">
                            <input type="number" name="numero_preg" id="numero_preg" class="form-control" value="{{ $pregu->numero_preg }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Descripción de la Pregunta</label>
                        <div class="col-sm-8">
                            <input type="Text" name="nombre_preg" id="nombre_preg" class="form-control" value="{{ $pregu->nombre_preg }}" required>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('preguntas.index') }}" class="btn btn-default">Volver al Listado</a>
                    <button type="submit" class="btn btn-primary pull-right">Editar Pregunta</button>
                </div>
              <!-- /.box-footer -->
            </form>
        </div>
    </div>

@endsection