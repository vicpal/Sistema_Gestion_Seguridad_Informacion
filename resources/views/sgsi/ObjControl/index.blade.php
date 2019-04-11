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
                    <h3 class="box-title"><strong>Lista de Obj. de Control GTC-IEC/ISO 27002:2015</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Núm Dominio</th>
                                <th>Núm Obj-Control</th>
                                <th>Nombre del Objetivo de Control</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($objc as $obj)
                            <tr>
                                <td>{{ $obj->id }}</td>
                                <td></td>
                                <td>{{ $obj->numero_objc }}</td>
                                <td>{{ $obj->nombre_objc }}</td>
                                <!-- <td>ver</td> -->
                                <td>
                                    <a href="{{ route('objcontrol.edit', $obj->id) }}" class="btn btn-primary btn-xs" method="POST"><span class="glyphicon glyphicon-pencil"></span></a>
                                </td>
                                <td>
                                    <form action="{{ route('objcontrol.destroy', $obj->id) }}" method="POST">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Núm Dominio</th>
                                <th>Núm Obj-Control</th>
                                <th>Nombre del Objetivo de Control</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $objc->links() }}
                </div>
            <!-- /.box-body -->
            </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
        <div class="footer">
            <a href="{{ route('objcontrol.create') }}" class="btn btn-primary">Crear dominio</a>
        </div>
</section>
<!-- /.content -->
    
@endsection

