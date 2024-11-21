@extends('layouts.app')

@section('title', 'Agregar Orden de Compra')

@section('content')
<div class="col px-5">
    <div class="text-center">
        <small class="text-muted fs-6">Agregar Almacen</small>
        <h2 class="fw-bold">INFORMACION GENERAL</h2>
    </div>
    <div class="d-flex justify-content-center">
        <div class="row w-75 p-4">
            <div class="col-md-8 mx-auto">
                <!-- formulario -->
                <form method="POST" action="{{ route('almacenes.store') }}" class="shadow-sm bg-white p-4 rounded">
                    @csrf
                    <!-- numero orden -->
                    <div class="mb-3">
                        <label for="numero_orden" class="form-label">Número de Orden</label>
                        <input type="text" name="numero_orden" id="numero_orden" class="form-control" required>
                    </div>
                    <!-- pais y estado -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="pais" class="form-label">País</label>
                            <select class="form-select bg-white" id="pais" name="pais" required>
                                <option selected disabled>Selecciona un país</option>
                                <option value="México">México</option>
                                <option value="Estados Unidos">Estados Unidos</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="estado" class="form-label">Estado</label>
                            <select class="form-select bg-white" id="estado" name="estado" required>
                                <option selected disabled>Selecciona un estado</option>
                                <option value="Tamaulipas">Tamaulipas</option>
                                <option value="Nuevo León">Nuevo León</option>
                                <option value="Nuevo Leon">Nuevo León</option>
                            </select>
                        </div>
                    </div>
                    <!-- ciudad y CP -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="ciudad" class="form-label">Ciudad</label>
                            <select class="form-select bg-white" id="ciudad" name="ciudad" required>
                                <option selected disabled>Selecciona una ciudad</option>
                                <option value="Ciudad Victoria">Ciudad Victoria</option>
                                <option value="Tampico">Tampico</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="codigo_p" class="form-label">Código Postal</label>
                            <input type="number" class="form-control bg-white" id="codigo_p" name="codigo_p" required>
                        </div>
                    </div>
                    <!-- colonia / calles -->
                    <div class="mb-3">
                        <label for="colonia" class="form-label">Colonia y calle</label>
                        <input type="text" class="form-control bg-white" id="colonia" name="colonia" required>
                    </div>
                    <!-- subir img -->
                    <div class="mb-4">
                        <label for="imagen" class="form-label">Subir imagen</label>
                        <div class="rounded d-flex flex-column align-items-center justify-content-center border" style="height: 12rem;">
                            <img src="{{ asset('img/rocket.png') }}" style="width: 6rem;">
                            <span class="file-text mt-3">
                                Ningún archivo seleccionado. 
                                <a class="text-primary fw-bold link-underline link-underline-opacity-0" href="#" onclick="document.getElementById('imagen').click(); return false;">Subir imagen</a>
                            </span>
                            <input type="file" hidden id="imagen" name="imagen" accept="image/*" onchange="updateFileName(this)">
                        </div>
                    </div>
                    <!-- botones -->
                    <div class="d-flex justify-content-between gap-3">
                        <button type="button" class="btn btn-light flex-fill border" 
                            onclick="window.location.href='{{ route('almacenes.index') }}'">Regresar</button>
                        <button type="submit" class="btn btn-primary flex-fill">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col px-5">
    <h2 class="fw-bold mb-4">Agregar Orden de Compra</h2>
    <form action="{{ route('ordenes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="numero_orden" class="form-label">Número de Orden</label>
            <input type="text" name="numero_orden" id="numero_orden" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="proveedor_id" class="form-label">Proveedor</label>
            <select name="proveedor_id" id="proveedor_id" class="form-select" required>
                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="pendiente">Pendiente</option>
                <option value="completada">Completada</option>
                <option value="cancelada">Cancelada</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" step="0.01" name="total" id="total" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>
@endsection
