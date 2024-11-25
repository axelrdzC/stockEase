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
            <div class="d-flex gap-2">
                <div class="col p-0">
                    <a href="{{ route('informes.exportPDF', $informe->id) }}" class="shadow-sm flex-grow-1 btn bg-white text-nowrap p-2 px-4 fw-medium w-100 d-flex align-items-center justify-content-start gap-3">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.3594 13.6209C24.1031 13.3759 25.4456 11.8809 25.4494 10.0697C25.4494 8.28466 24.1481 6.80466 22.4419 6.52466" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M24.6611 17.8129C26.3499 18.0654 27.5286 18.6566 27.5286 19.8754C27.5286 20.7141 26.9736 21.2591 26.0761 21.6016" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8589 18.3297C10.8414 18.3297 7.41016 18.9385 7.41016 21.3697C7.41016 23.7997 10.8202 24.426 14.8589 24.426C18.8764 24.426 22.3064 23.8235 22.3064 21.391C22.3064 18.9585 18.8977 18.3297 14.8589 18.3297Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8587 14.8599C17.495 14.8599 19.6325 12.7236 19.6325 10.0861C19.6325 7.44988 17.495 5.31238 14.8587 5.31238C12.2225 5.31238 10.085 7.44988 10.085 10.0861C10.075 12.7136 12.1962 14.8511 14.8237 14.8599H14.8587Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.3566 13.6209C5.6116 13.3759 4.27035 11.8809 4.2666 10.0697C4.2666 8.28466 5.56785 6.80466 7.2741 6.52466" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.055 17.8129C3.36625 18.0654 2.1875 18.6566 2.1875 19.8754C2.1875 20.7141 2.7425 21.2591 3.64 21.6016" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div class="text-wrap lh-1 text-start text-body-secondary">
                            Generar PDF
                        </div>
                    </a>
                </div>
                <div class="col p-0">
                    <button type="button" onclick="" class="shadow-sm flex-grow-1 btn bg-white text-nowrap p-2 px-4 fw-medium w-100 d-flex align-items-center justify-content-start gap-3">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.3594 13.6209C24.1031 13.3759 25.4456 11.8809 25.4494 10.0697C25.4494 8.28466 24.1481 6.80466 22.4419 6.52466" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M24.6611 17.8129C26.3499 18.0654 27.5286 18.6566 27.5286 19.8754C27.5286 20.7141 26.9736 21.2591 26.0761 21.6016" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8589 18.3297C10.8414 18.3297 7.41016 18.9385 7.41016 21.3697C7.41016 23.7997 10.8202 24.426 14.8589 24.426C18.8764 24.426 22.3064 23.8235 22.3064 21.391C22.3064 18.9585 18.8977 18.3297 14.8589 18.3297Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8587 14.8599C17.495 14.8599 19.6325 12.7236 19.6325 10.0861C19.6325 7.44988 17.495 5.31238 14.8587 5.31238C12.2225 5.31238 10.085 7.44988 10.085 10.0861C10.075 12.7136 12.1962 14.8511 14.8237 14.8599H14.8587Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.3566 13.6209C5.6116 13.3759 4.27035 11.8809 4.2666 10.0697C4.2666 8.28466 5.56785 6.80466 7.2741 6.52466" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.055 17.8129C3.36625 18.0654 2.1875 18.6566 2.1875 19.8754C2.1875 20.7141 2.7425 21.2591 3.64 21.6016" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
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
                                    <td>{{ $item->sku ?? 'N/A' }}</td>
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
