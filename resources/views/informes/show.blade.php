@extends('layouts.app')

@section('title', 'Informes') 

@section('content')
 <div class="col px-5">
    <!-- header de la seccion -->
    <div class="row align-items-center mb-4">
        <div class="col">
            <div class="fs-2 fw-semibold">Vista previa</div>
        </div>
        <div class="col-md-4 p-0">
            <div class="d-flex gap-2 align-items-center">
                <div class="col p-0">
                    <a href="{{ route('informes.exportPDF', $informe->id) }}" class="shadow-sm flex-grow-1 btn bg-white text-nowrap p-2 px-4 fw-medium w-100 d-flex align-items-center justify-content-start gap-3">
                        <svg width="30" height="30" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 3.00087C12.9045 3 12.7973 3 12.6747 3H8.2002C7.08009 3 6.51962 3 6.0918 3.21799C5.71547 3.40973 5.40973 3.71547 5.21799 4.0918C5 4.51962 5 5.08009 5 6.2002V17.8002C5 18.9203 5 19.4801 5.21799 19.9079C5.40973 20.2842 5.71547 20.5905 6.0918 20.7822C6.51921 21 7.079 21 8.19694 21L15.8031 21C16.921 21 17.48 21 17.9074 20.7822C18.2837 20.5905 18.5905 20.2842 18.7822 19.9079C19 19.4805 19 18.9215 19 17.8036V9.32568C19 9.20296 19 9.09561 18.9991 9M13 3.00087C13.2856 3.00347 13.4663 3.01385 13.6388 3.05526C13.8429 3.10425 14.0379 3.18526 14.2168 3.29492C14.4186 3.41857 14.5918 3.59182 14.9375 3.9375L18.063 7.06298C18.4089 7.40889 18.5809 7.58136 18.7046 7.78319C18.8142 7.96214 18.8953 8.15726 18.9443 8.36133C18.9857 8.53376 18.9963 8.71451 18.9991 9M13 3.00087V5.8C13 6.9201 13 7.47977 13.218 7.90759C13.4097 8.28392 13.7155 8.59048 14.0918 8.78223C14.5192 9 15.079 9 16.1969 9H18.9991M18.9991 9H19.0002" stroke="#53545C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div class="text-wrap lh-1 text-start text-body-secondary">
                            Generar PDF
                        </div>
                    </a>
                </div>
                <div class="col p-0">
                    <button type="button" onclick="" class="shadow-sm flex-grow-1 btn bg-white text-nowrap p-2 px-4 fw-medium w-100 d-flex align-items-center justify-content-start gap-3">
                        <svg width="30" height="30" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 15V16.8002C4 17.9203 4 18.4801 4.21799 18.9079C4.40973 19.2842 4.71547 19.5905 5.0918 19.7822C5.5192 20 6.07899 20 7.19691 20H12M4 15V9M4 15H12M4 9V7.2002C4 6.08009 4 5.51962 4.21799 5.0918C4.40973 4.71547 4.71547 4.40973 5.0918 4.21799C5.51962 4 6.08009 4 7.2002 4H12M4 9H12M12 4H16.8002C17.9203 4 18.4801 4 18.9079 4.21799C19.2842 4.40973 19.5905 4.71547 19.7822 5.0918C20 5.5192 20 6.07899 20 7.19691V9M12 4V9M12 9V15M12 9H20M12 15V20M12 15H20M12 20H16.8036C17.9215 20 18.4805 20 18.9079 19.7822C19.2842 19.5905 19.5905 19.2842 19.7822 18.9079C20 18.4805 20 17.9215 20 16.8036V15M20 15V9" stroke="#53545C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div class="text-wrap lh-1 text-start text-body-secondary">
                        Generar CSV
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- contenedor Proveedores -->
    <div class="row">
        <!-- Tabla para mostrar los datos -->
        <div class="container p-0 flex-grow-1">
            <div class="card shadow-sm bg-white border-0 m-0">
                <div class="card-body d-flex flex-column gap-3 px-4">
                    <div class="d-flex flex-column mt-2">
                        <h5 class="card-title m-0">{{ $informe->nombre }}</h5>
                        <small>{{ $informe->descripcion}}</small>
                    </div>

                    <!-- Tabla -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <!-- Cambia los encabezados según los datos que vayas a mostrar -->
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Categoría</th>
                                    <th>Descripcion</th>
                                    <th>SKU</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Almacen</th>
                                    <th>Proveedor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datos as $key => $item)
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
                                @empty
                                <tr>
                                    <td colspan="" class="text-center">No hay datos disponibles</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>    

@endsection
