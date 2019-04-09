@extends('layouts.layout')

@section('content')

    <div class="row">
        <div class="col-sm-6">
            <h4><strong>GUIA TÉCNICA COLOMBIANA IEC/ISO 27002:2015</strong></h4>
            <P align="justify">
            Proporciona directrices para las normas de seguridad de la información organizacional 
            y las prácticas de gestión de la seguridad de la información, incluida la selección, la implementación y 
            la gestión de controles, teniendo en cuenta el(los) entorno(s) d impreso, este artículo se le enviará a 
            la dirección de envío suministrada.</p>
        </div>
        <div class="col-sm-4">
            <img src="/img/icontec.jpg" alt="Norma GTC-IEC/ISO 27002:15">
        </div>
    </div>

    <div class="container">
    <div class="row">
        <div class="col-sm-10">
            <h4><strong>
                Listado de Dominios Registrados GTC-IEC/ISO 27002:2015</strong>
            </h4>
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th width="50px">ID</th>
                        <th>Numero del Dominio</th>
                        <th>Nombre del Dominio</th>
                        <th colspan="3">&nbsp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dominios as $dominio)
                    <tr>
                        <td>{{ $dominio->id }}</td>
                        <td>{{ $dominio->numero_dom }}</td>
                        <td>{{ $dominio->nombre_dom }}</td>
                        <td>ver</td>
                        <td>editar</td>
                        <td>borrar</td>
                    </tr>
                    @endforeach
                </tbody> 
            </table>
        </div>
    </div>
</div>

@endsection

