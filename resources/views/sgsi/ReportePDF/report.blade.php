<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Control</th>
                <th>Núm Preg</th>
                <th>Descripción de la Pregunta</th>
            </tr>
        </thead>
        <tbody>

            @foreach($reports as $report)
            <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->control_id }}</td>
                <td>{{ $report->numero_preg }}</td>
                <td>{{ $report->nombre_preg }}</td>
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

</body>
</html>