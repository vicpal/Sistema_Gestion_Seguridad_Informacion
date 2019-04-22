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
        <div class="alert alert-info" class="close">
            {{Session::get('success')}}
        </div>
    @endif

<!-- Desde aqui comienza la tabla de los Datos consultados en la BD -->

<div class="col-md-10">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Resultados de Encuesta Diligenciada</h3>
            </div>
            <!-- /.box-header -->
            <!-- Script para Habilitar los campos del Formulario -->
            
            <!-- form start -->
            <form class="form-horizontal" action="" method="POST" role="form">
            {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Dominio</label>
                        <div class="col-sm-8">
                            <h4 value="{{ $encu->dominio->nombre_dom }}">{{ $encu->dominio->nombre_dom }}</h4>
                        </div>
                    </div> 
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Obj de Control</label>
                        @if ($encu->objcontrol->dominio_id == $encu->dominio->id)
                            <div class="col-sm-8">
                                <h6 value="{{ $encu->objcontrol->nombre_objc }}">{{ $encu->objcontrol->nombre_objc }}</h5>
                            </div>
                        @endif
                    </div> 
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputText" class="col-sm-3 control-label">Control</label>
                        @if ($encu->control->dominio_id == $encu->dominio->id)
                            @if($encu->control->objcontrol_id == $encu->objcontrol->id)
                                <div class="col-sm-8">
                                    <h6 value="{{ $encu->control->nombre_con }}">{{ $encu->control->nombre_con }}</h5>
                                </div>
                                <!-- ---- DESDE AQUI TRAIGO LAS PREGUNTAS Y RESPUESTAS POR CONTROL ------- -->
                                @if($encu->pregunta->id == $encu->pregunta_id)
                                <div class="box-body">
                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Pregunta</th>
                                                    <th>Respuesta</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if($encu->count())
                                                @foreach($encu as $enc)
                                                <tr>
                                                    <td>{{ $encu->pregunta->nombre_preg }}</td>
                                                    <td>{{ $encu->respuesta }}</td>
                                                </tr>
                                                @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="8">No ha Respondido !!</td>
                                                    </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            @endif
                        @endif
                    </div> 
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('encuesta.index') }}" class="btn btn-default">Volver al Listado</a>
                    <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-download-alt"></span></button>
                </div>
              <!-- /.box-footer -->
            </form>
        </div>
    </div>
    
@endsection

