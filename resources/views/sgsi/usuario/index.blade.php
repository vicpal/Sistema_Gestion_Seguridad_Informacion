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
                    <h3 class="box-title"><strong>Listado de Usuarios del Sistema</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre Completo</th>
                                <th>Correo Eléctronico</th>
                                <th>Tipo de Usuario</th>
                                <th>Edi</th>
                                <th>Del</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($usua->count())
                            @foreach($usua as $usu)
                            <tr>
                                <td>{{ $usu->id }}</td>
                                <td>{{ $usu->nombre }}</td>
                                <td>{{ $usu->correo }}</td>
                                <td>{{ $usu->nombre_rol }}</td>
                                <td align="center">
                                    <a href="{{ route('usuario.edit', $usu->id) }}" class="btn btn-primary btn-xs" method="POST"><span class="glyphicon glyphicon-pencil"></span></a>
                                </td>
                                <td align="center">
                                    <form action="{{ route('usuario.destroy', $usu->id) }}" method="POST">
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
                                <th>Nombre Completo</th>
                                <th>Correo Eléctronico</th>
                                <th>Tipo de Usuario</th>
                                <th>Edi</th>
                                <th>Del</th>
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
        <div class="footer">
            <a href="{{ route('usuario.create') }}" class="btn btn-primary">Crear Usuario</a>
        </div>
</section>
<!-- /.content -->
    
@endsection

