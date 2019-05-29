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

    <!-- Content Wrapper. Contains page content -->
        <section class="content">
            <!-- Default box -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <!-- Titulo de la Vista -->
                        <div class="box-header with-border">
                            <h4 class="box-title">Resumen de la Encuesta</h4>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- Cuerpo de la Vista -->
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-sm-2">
                                            <h4>Numero: {{ $encu->encuesta->encuesta_num }}</h4>
                                        </div>
                                        <div class="col-sm-5">
                                            <h4>Usuario Encuestado: {{ $encu->usuario->nombre }}</h4>
                                        </div>
                                        <div class="col-sm-5">
                                            <h4>Fecha de Realización: {{ $encu->encuesta->created_at }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <label for="">Dominio: </label> {{ $encu->dominio->nombre_dom }} <br>
                                            <label for="">Objetivo de Control: </label> {{ $encu->objcontrol->nombre_objc }} <br>
                                            <label for="">Control: </label> {{ $encu->control->nombre_con }}
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <h5>Encuesta Realizada: {{ $encu->encuesta->created_at }}</h5>
                        </div>
                        <!-- /.box-footer-->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    <!-- /.content -->
   
@endsection

