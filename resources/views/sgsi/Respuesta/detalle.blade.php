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
            @foreach($respu as $data) @if($loop->first)
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
                        <strong>{{ $data->usuario->nombre }}</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Telefono: +1 (555) 539-1037<br>
                        Correo: <strong>{{ $data->usuario->correo }}</strong>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Encuesta: #</b>{{ $data->encuesta_num }}<br>
                    <b>Empresa: </b>SGSI Corporation Inn.<br>
                    <b>Usuario ID: </b>000{{ $data->usuario->id }}<br>
                    <b>Realizada por: </b>{{ $data->usuario->nombre }}<br>
                    <b>Fecha: </b>{{ $data->created_at }}<br>
                    <!-- <b>Account:</b> 968-34567 -->
                </div>
            @endif @endforeach
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
                        
                        @foreach($respu as $resp)
                            
                            <tr>
                                <td> {{ $resp->dominio->numero_dom }}</td>
                                <td> {{ $resp->dominio->nombre_dom }}</td>
                                <td> {{ $resp->criterio->criterio }}</td>
                                <td>  0% </td>
                            </tr>
                                
                                <tr>
                                    <td> {{ $resp->objcontrol->numero_objc }}</td>
                                    <td> {{ $resp->objcontrol->nombre_objc }}</td>
                                    <td> {{ $resp->criterio->criterio }}</td>
                                    <td>  10% </td>
                                </tr>
                                    
                                    <tr>
                                        <td> {{ $resp->control->numero_con }}</td>
                                        <td> {{ $resp->control->nombre_con }}</td>
                                        <td> {{ $resp->criterio->criterio }}</td>
                                        <td>  0% </td>
                                    </tr>
                                    
                        @endforeach
                            
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

