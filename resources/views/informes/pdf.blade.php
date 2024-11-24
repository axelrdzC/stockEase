<!DOCTYPE html>
<html>
<head>
    <title>Informe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Información del Informe</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <td>{{ $informe->nombre }}</td>
        </tr>
        <tr>
            <th>Descripción</th>
            <td>{{ $informe->descripcion }}</td>
        </tr>
    </table>
</body>
</html>