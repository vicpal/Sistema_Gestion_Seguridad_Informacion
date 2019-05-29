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
                    <h3 class="box-title"><strong>Listado de Encuentas GTC-IEC/ISO 27002:2015</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Núm Encuesta</th>
                                <th>Usuario</th>
                                <th>Creada</th>
                                <th>Ver</th>
                                <th>Del</th>
                                <th>Down</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($encu->count())
                            @foreach($encu as $enc)
                            <tr>
                                <td>{{ $enc->id }}</td>
                                <td>{{ $enc->encuesta_num }}</td>
                                <td>{{ $enc->usuario->nombre }}</td>
                                <td>{{ $enc->created_at }}</td>
                                <td align="center">
                                    <a href="{{ route('encuesta.show', $enc->id) }}" class="btn btn-primary btn-xs" method="POST">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>
                                </td>
                                <td align="center">
                                    <form action="{{ route('encuesta.destroy', $enc->id) }}" method="POST">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                    </form>
                                </td>
                                <td align="center">
                                    <a href="{{ route('report.pdf') }}" class="btn btn-primary btn-xs" method="POST">
                                        <span class="glyphicon glyphicon-download-alt"></span>
                                    </a>
                                </td>
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
                                <th>Núm Encuesta</th>
                                <th>Usuario</th>
                                <th>Creada</th>
                                <th>Ver</th>
                                <th>Edi</th>
                                <th>Del</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            <!-- /.box-body --> 
            </div>
          <!-- /.box --> <!-- <a href="{{ route('report.pdf') }}">Clic PDF</a> -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
        <div class="footer">
            <a href="{{ route('encuesta.create') }}" class="btn btn-primary">Crear Encuesta</a>
        </div>
</section>
<!-- /.content -->
    
@endsection

