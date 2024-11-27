<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $informe->nombre }}</title>
    <style>
        body {
            font-family: 'Rubik', sans-serif;
            font-size: 10px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .table th {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <h1>{{ $informe->nombre }}</h1>
    <p>{{ $informe->descripcion }}</p>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Descripción</th>
                <th>SKU</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Almacén</th>
                <th>Proveedor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nombre ?? 'N/A' }}</td>
                    <td>{{ $item->categoria->nombre ?? 'N/A' }}</td>
                    <td>{{ $item->descripcion ?? 'N/A' }}</td>
                    <td>{{ $item->SKU ?? 'N/A' }}</td>
                    <td>{{ $item->precio ?? 'N/A' }}</td>
                    <td>{{ $item->cantidad_producto ?? 'N/A' }}</td>
                    <td>{{ $item->almacen->nombre ?? 'N/A' }}</td>
                    <td>{{ $item->proveedor->nombre ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
