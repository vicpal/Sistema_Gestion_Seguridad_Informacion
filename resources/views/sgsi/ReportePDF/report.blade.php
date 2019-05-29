<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte SGSI</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="col-xs-12">
                <h4>Informe General de Encuestas Realizadas</h4>
            </div>
        </div>
            
        <div class="body">
            <div class="col-sm-12">
                <table class=".table-sm"> 
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Control</th>
                            <th>Núm Preg</th>
                            <th >Descripción de la Pregunta</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($reports as $report)
                        <tr>
                            <td>{{ $report->id }}</td>
                            <td>{{ $report->control_id }}</td>
                            <td>{{ $report->numero_preg }}</td>
                            <td align="justify">{{ $report->nombre_preg }}</td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Control</th>
                            <th>Núm Preg</th>
                            <th>Descripción de la Pregunta</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- Footer -->
        <div class="footer">
            <h5>Espacio Reservado VIP</h5>
        </div>
    </div>
    
</body>
</html>