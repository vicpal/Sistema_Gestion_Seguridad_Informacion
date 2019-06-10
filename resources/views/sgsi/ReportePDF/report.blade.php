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
                        @foreach($encu as $enc)
                            <tr>
                                <td>{{ $encu->dominio->numero_dom }}</td>
                                <td>{{ $encu->dominio->nombre_dom }}</td>
                                <td> No Realizado </td>
                                <td> 0% </td>
                            </tr>
                                @foreach($encu as $enc)
                                <tr>
                                    <td>{{ $encu->objcontrol->numero_objc }}</td>
                                    <td>{{ $encu->objcontrol->nombre_objc }}</td>
                                    <td> No Realizado </td>
                                    <td> 0% </td>
                                </tr>
                                    @foreach($encu as $enc)
                                    <tr>
                                        <td>{{ $encu->control->numero_con }}</td>
                                        <td>{{ $encu->control->nombre_con }}</td>
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