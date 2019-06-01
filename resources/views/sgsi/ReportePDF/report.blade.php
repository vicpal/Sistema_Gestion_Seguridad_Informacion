<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte SGSI</title>
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
                    @if($encu->count())
                        @foreach($encu as $enc)
                        <tr>
                            <td>{{ $enc->dominio->numero_dom }}</td>
                            <td>{{ $enc->dominio->nombre_dom}}</td>
                            <td>No Realizado</td>
                            <td>0 %</td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>