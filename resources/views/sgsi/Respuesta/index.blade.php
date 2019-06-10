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

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>Listado de Respuestas - GTC-IEC/ISO 27002:2015</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Dominio</th>
                                <th>Objetivo</th>
                                <th>Control</th>
                                <th>Pregunta</th>
                                <th>Respuesta</th>
                                <th>Encuesta</th>
                                <th>Usuario</th>
                                <th>Creada</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($respu->count())
                            @foreach($respu as $resp)
                            <tr>
                                <td>{{ $resp->id }}</td>
                                <td>{{ $resp->dominio->numero_dom }}</td>
                                <td>{{ $resp->objcontrol->numero_objc }}</td>
                                <td>{{ $resp->control->numero_con }}</td>
                                <td>{{ $resp->pregunta->numero_preg }}</td>
                                <td>{{ $resp->respuesta }}</td>
                                <td>{{ $resp->encuesta->encuesta_num }}</td>
                                <td>{{ $resp->usuario->nombre }}</td>
                                <td>{{ $resp->encuesta->created_at }}</td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="10">No hay registro !!</td>
                                </tr>
                        @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Dominio</th>
                                <th>Objetivo</th>
                                <th>Control</th>
                                <th>Pregunta</th>
                                <th>Respuesta</th>
                                <th>Encuesta</th>
                                <th>Usuario</th>
                                <th>Creada</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            <!-- /.box-body --> 
            </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
    
@endsection

