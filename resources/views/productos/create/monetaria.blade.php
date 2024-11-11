@extends('layouts.app')

@section('title', 'Agregar producto')

@section('content')
<div class="col px-5">
    <div class="text-center">
        <small class="text-muted fs-6">Agregar Producto</small>
        <h2 class="fw-bold">INFROMACION MONETARIA</h2>
    </div>
    <div class="d-flex justify-content-center">
        <div class="row w-75 p-4">
            <div class="col-md-4 bg-transparent">
                <!-- vista de la lista de pasos -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-white fw-bold rounded shadow-sm">
                        <div class="small fw-normal">PASO 1</div>
                        <div class="text-primary">INFORMACION GENERAL</div>
                    </li>
                    <li class="list-group-item bg-transparent text-muted">
                    <div class="small fw-normal">PASO 2</div>
                        <div>INFORMACION MONETARIA</div>
                    </li>
                    <li class="list-group-item bg-transparent text-muted">
                    <div class="small fw-normal">PASO 3</div>
                        <div>UBICACION Y CANTIDAD</div>
                    </li>
                </ul>
            </div>
            <div class="col-md-8">
                <!-- formulario -->
                <form method="POST" action="{{ route('productos.create.ubicacion') }}" class="shadow-sm bg-white p-4 rounded">
                    @csrf
                    <!-- precio -->
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio unitario del producto</label>
                        <input type="number" class="form-control bg-white" id="precio" name="precio" required>
                    </div>
                    <!-- botones -->
                    <div class="d-flex justify-content-between gap-3">
                        <button type="button" class="btn btn-light flex-fill border" 
                            onclick="window.location.href='{{ route('productos.create.general') }}'">Regresar</button>
                        <button type="submit" class="btn btn-primary flex-fill">Siguiente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection