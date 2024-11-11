@extends('layouts.app')

@section('title', 'Agregar producto')

@section('content')
<div class="col px-5">
    <div class="text-center">
        <small class="text-muted fs-6">Agregar Producto</small>
        <h2 class="fw-bold">INFROMACION GENERAL</h2>
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
                <form method="POST" action="{{ route('productos.store.general') }}" class="shadow-sm bg-white p-4 rounded">
                    @csrf
                    <!-- nombre producto -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del producto</label>
                        <input type="text" class="form-control bg-white" id="nombre" name="nombre" required>
                    </div>
                    <!-- sku y categoria -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="sku" class="form-label">Codigo SKU</label>
                            <input type="text" class="form-control bg-white" id="sku" name="sku" required>
                        </div>
                        <div class="col-md-6">
                            <label for="categoria" class="form-label">Categoria</label>
                            <select class="form-select bg-white" id="categoria" name="categoria" required>
                                <option selected disabled>Selecciona una categoria</option>
                                <option value="1">Categoría 1</option>
                                <option value="2">Categoría 2</option>
                            </select>
                        </div>
                    </div>
                    <!-- precio y unidad -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tipo" class="form-label">Precio unitario</label>
                            <input type="number" class="form-control bg-white" id="precio" name="precio" required>
                        </div>
                        <div class="col-md-6">
                            <label for="unidad_medida" class="form-label">Unidad de medida</label>
                            <input type="number" class="form-control bg-white" id="unidad_medida" name="unidad_medida" required>
                        </div>
                    </div>
                    <!-- desc -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea class="form-control bg-white" id="descripcion" name="descripcion" rows="3" required></textarea>
                    </div>
                    <!-- subir img -->
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Subir imagen</label>
                        <input type="file" class="form-control bg-white" id="imagen" name="imagen" accept="image/*">
                    </div>
                    <!-- botones -->
                    <div class="d-flex justify-content-between gap-3">
                        <button type="button" class="btn btn-light flex-fill border" 
                            onclick="window.location.href='{{ route('productos.index') }}'">Regresar</button>
                        <button type="submit" class="btn btn-primary flex-fill">Siguiente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
