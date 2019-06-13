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
    <div class="content">
    <!-- Main content -->
        <section class="invoice">
        <!-- title row -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-header">
                        <i class="fa fa-area-chart"></i> SGSI, Ltda.
                        <small class="pull-right">Fecha: <input type="datetime" name="fecha" step="1" min="2013-01-01T00:00Z" max="2013-12-31T12:00Z" value="  <?php echo date("Y-m-d");?>" disabled></small>
                    </h2>
                </div>
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    De
                    <address>
                        <strong>SGSI, Ltda.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Telefono: +1 (804) 123-5432<br>
                        Correo: info@sgsicorp.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    Para
                    <address>
                        <strong>{{ $respu->usuario->nombre }}</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Telefono: +1 (555) 539-1037<br>
                        Correo: {{ $respu->usuario->correo }}
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Encuesta: #{{ $respu->encuesta_num }}</b><br>
                    <br>
                    <b>Usuario ID:</b> 000{{ $respu->usuario->id }}<br>
                    <b>Realizada por:</b> {{ $respu->usuario->nombre }}<br>
                    <b>Fecha:</b> {{ $respu->created_at }}<br>
                    <!-- <b>Account:</b> 968-34567 -->
                </div>
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <h2 align="center">Resultado de la Encuesta - GTC ISO/IEC 27002:2015</h2>
                <div class="box-body"> <div class="btn" id="vip"></div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Sección</th>
                                <th>Cumplimiento</th>
                                <th>Ponderado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> {{ $respu->dominio->numero_dom }}</td>
                                <td> {{ $respu->dominio->nombre_dom }}</td>
                                <td> {{ $respu->criterio->criterio }}</td>
                                <td>  0% </td>
                            </tr>
                            <tr>
                                <td> {{ $respu->objcontrol->numero_objc }}</td>
                                <td> {{ $respu->objcontrol->nombre_objc }}</td>
                                <td> {{ $respu->criterio->criterio }}</td>
                                <td>  0% </td>
                            </tr>
                            <tr>
                                <td> {{ $respu->control->numero_con }}</td>
                                <td> {{ $respu->control->nombre_con }}</td>
                                <td> {{ $respu->criterio->criterio }}</td>
                                <td>  0% </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row">
                <div class="col-xs-12">
                <a href="{{ route('respuestas.index') }}" class="btn btn-default">Volver al Listado</a>
                    <a href="{{ route('report.pdf') }}" class="btn btn-primary pull-right" method="POST"><i class="fa fa-download"></i> Generar PDF</a>
                </div>
            </div>
        </section>
        <!-- /.content -->
        <div class="clearfix"></div>
    </div>
    <!-- /.content-wrapper -->
    
@endsection

