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
                            <th>
                                Número
                            </th>
                            <th>
                                Sección
                            </th>
                            <th>
                                Cumplimiento
                            </th>
                            <th>
                                Ponderado
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($respu as $resp)
                            <tr>
                                <td>{{ $resp->dominio->numero_dom }}</td>
                                <td>{{ $resp->dominio->nombre_dom }}</td>
                                <td> No Realizado </td>
                                <td> 0% </td>
                            </tr>
                                @foreach(respu as $resp2)
                                <tr>
                                    <td>{{ $resp2->objcontrol->numero_objc }}</td>
                                    <td>{{ $resp2->objcontrol->nombre_objc }}</td>
                                    <td> No Realizado </td>
                                    <td> 0% </td>
                                </tr>
                                    @foreach($respu as $resp3)
                                    <tr>
                                        <td>{{ $resp3->control->numero_con }}</td>
                                        <td>{{ $resp3->control->nombre_con }}</td>
                                        <td> No Realizado </td>
                                        <td> 0% </td>
                                    </tr>
                                    @endforeach
                                @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>