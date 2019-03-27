@extends('layouts.app')

@section('content')
<div class="container"> <!--
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel de Administración</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Estas Logueado!!
                </div>
            </div>
        </div>
    </div> -->
    <!-- Pruebas de Tablas VIP -->
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">Item</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Empresa</th>
                <th scope="col">Cargo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>System-1</td>
                    <td>Gestor de Calidad</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Aux. Auditoria</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                    <td>Larry the Bird</td>
                    <td>Nunce</td>
                    <td>@twitter</td>
                    <td>Ingeniero</td>
            </tr>
        </tbody>
    </table>
    <!--Fin de Tablas -->
</div>
@endsection
