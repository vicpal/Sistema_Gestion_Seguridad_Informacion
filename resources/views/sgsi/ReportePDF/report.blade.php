<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte SGSI</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <table>
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
                            <td>@if(($resp->criterio->valor >= 0 && $resp->criterio->valor < 20) || ($resp->criterio->valor >= 20 && $resp->criterio->valor < 40) || ($resp->criterio->valor >= 40 && $resp->criterio->valor < 60) || ($resp->criterio->valor >= 60 && $resp->criterio->valor < 80) || ($resp->criterio->valor >= 80 && $resp->criterio->valor < 100) || ($resp->criterio->valor == 100))
                                    {{ $resp->criterio->criterio }}
                                @endif
                            </td>
                            <td> {{ $resp->criterio->valor }} %</td>
                        </tr>
                        <tr>
                            <td> {{ $resp->objcontrol->numero_objc }}</td>
                            <td> {{ $resp->objcontrol->nombre_objc }}</td>
                            <td>@if(($resp->criterio->valor >= 0 && $resp->criterio->valor < 20) || ($resp->criterio->valor >= 20 && $resp->criterio->valor < 40) || ($resp->criterio->valor >= 40 && $resp->criterio->valor < 60) || ($resp->criterio->valor >= 60 && $resp->criterio->valor < 80) || ($resp->criterio->valor >= 80 && $resp->criterio->valor < 100) || ($resp->criterio->valor == 100))
                                    {{ $resp->criterio->criterio }}
                                @endif
                            </td>
                            <td> {{ $resp->criterio->valor }} %</td>
                        </tr>
                        <tr>
                            <td> {{ $resp->control->numero_con }}</td>
                            <td> {{ $resp->control->nombre_con }}</td>
                            <td>@if(($resp->criterio->valor >= 0 && $resp->criterio->valor < 20) || ($resp->criterio->valor >= 20 && $resp->criterio->valor < 40) || ($resp->criterio->valor >= 40 && $resp->criterio->valor < 60) || ($resp->criterio->valor >= 60 && $resp->criterio->valor < 80) || ($resp->criterio->valor >= 80 && $resp->criterio->valor < 100) || ($resp->criterio->valor == 100))
                                    {{ $resp->criterio->criterio }}
                                @endif
                            </td>
                            <td> {{ $resp->criterio->valor }} %</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>