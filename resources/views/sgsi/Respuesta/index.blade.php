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
<section class="container">
    <div class="row">
        <div class="col-xs-10">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>Listado de Respuestas - GTC-IEC/ISO 27002:2015</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Núm Dominio</th>
                                <th>Núm Obj. Control</th>
                                <th>Núm Control</th>
                                <th>Núm Preg</th>
                                <th>Núm Encue</th>
                                <th>Usuario</th>
                                <th>Respuesta</th>
                                <!-- <th colspan="1">PDF</th> -->
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
                                <td>{{ $resp->encuesta->encuesta_num }}</td>
                                <td>{{ $resp->usuario_id }}</td>
                                <td>{{ $resp->respuesta }}</td>
                                <!-- <td>
                                    <a href=" " class="btn btn-primary btn-xs" method="POST">
                                        <span class="glyphicon glyphicon-download-alt"></span>
                                    </a>
                                </td> -->
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="8">No hay registro !!</td>
                                </tr>
                        @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Núm Dominio</th>
                                <th>Núm Obj. Control</th>
                                <th>Núm Control</th>
                                <th>Núm Preg</th>
                                <th>Núm Encue</th>
                                <th>Usuario</th>
                                <th>Respuesta</th>
                                <!-- <th colspan="1">PDF</th> -->
                            </tr>
                        </tfoot>
                    </table>
                    {{ $respu->links() }}
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

