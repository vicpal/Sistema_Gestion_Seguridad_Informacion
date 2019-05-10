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
                    <h3 class="box-title"><strong>Listado de Preguntas por Control GTC-IEC/ISO 27002:2015</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Control</th>
                                <th>Preg</th>
                                <th>Descripción de la Pregunta</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($pregu->count())
                            @foreach($pregu as $preg)
                            <tr>
                                <td>{{ $preg->id }}</td>
                                <td>{{ $preg->control->numero_con }}</td>
                                <td>{{ $preg->numero_preg }}</td>
                                <td>{{ $preg->nombre_preg }}</td>
                                <!-- <td>ver</td> -->
                                <td>
                                    <a href="{{ route('preguntas.edit', $preg->id) }}" class="btn btn-primary btn-xs" method="POST"><span class="glyphicon glyphicon-pencil"></span></a>
                                </td>
                                <td>
                                    <form action="{{ route('preguntas.destroy', $preg->id) }}" method="POST">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                    </form>
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
                                <th>Control</th>
                                <th>Preg</th>
                                <th>Descripción de la Pregunta</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $pregu->links() }}
                </div>
            <!-- /.box-body --> 
            </div>
          <!-- /.box --> <a href="{{ route('report.pdf') }}">Clic PDF</a>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
        <div class="footer">
            <a href="{{ route('preguntas.create') }}" class="btn btn-primary">Crear Pregunta</a>
        </div>
</section>
<!-- /.content -->
    
@endsection

