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
                    <h3 class="box-title"><strong>Listado de Encuentas GTC-IEC/ISO 27002:2015</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Núm Encuesta</th>
                                <th>Creada</th>
                                <th colspan="3">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($encu->count())
                            @foreach($encu as $enc)
                            <tr>
                                <td>{{ $enc->id }}</td>
                                <td>{{ $enc->encuesta_num }}</td>
                                <td>{{ $enc->created_at }}</td>
                                <td>
                                    <a href="{{ route('encuesta.show', $enc->id) }}" class="btn btn-primary btn-xs" method="POST">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('encuesta.destroy', $enc->id) }}" method="POST">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('encuesta.index', $enc->id) }}" class="btn btn-primary btn-xs" method="POST">
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
                                <th>Creada</th>
                                <th colspan="3">Opciones</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $encu->links() }}
                </div>
            <!-- /.box-body --> 
            </div>
          <!-- /.box -->
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

