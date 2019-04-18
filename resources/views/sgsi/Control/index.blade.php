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
                    <h3 class="box-title"><strong>Lista de Controles GTC-IEC/ISO 27002:2015</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Núm Dominio</th>
                                <th>Núm Obj-Control</th>
                                <th>Núm Control</th>
                                <th>Nombre del Control</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($contr->count())
                            @foreach($contr as $cont)
                            <tr>
                                <td>{{ $cont->id }}</td>
                                <td>{{ $cont->numero_dom }}</td> <!-- Traer el Num Dominio -->
                                <td>{{ $cont->numero_objc }}</td>
                                <td>{{ $cont->numero_con }}</td>
                                <td>{{ $cont->nombre_con }}</td>
                                <!-- <td>ver</td> -->
                                <td>
                                    <a href="{{ route('control.edit', $cont->id) }}" class="btn btn-primary btn-xs" method="POST"><span class="glyphicon glyphicon-pencil"></span></a>
                                </td>
                                <td>
                                    <form action="{{ route('control.destroy', $cont->id) }}" method="POST">
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
                                <th>Núm Dominio</th>
                                <th>Núm Obj-Control</th>
                                <th>Núm Control</th>
                                <th>Nombre del Control</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $contr->links() }}
                </div>
            <!-- /.box-body --> 
            </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
        <div class="footer">
            <a href="{{ route('control.create') }}" class="btn btn-primary">Crear Control</a>
        </div>
</section>
<!-- /.content -->
    
@endsection

