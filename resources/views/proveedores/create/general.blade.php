@extends('layouts.app')

@section('title', 'Agregar proveedor')

@section('content')
<div class="col px-5">
    <div class="text-center">
        <small class="text-muted fs-6">Agregar proveedor</small>
        <h2 class="fw-bold">INFROMACION GENERAL</h2>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="d-flex gap-3 w-75 p-4">
            <div class="col-3 bg-transparent">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-white fw-bold rounded shadow-sm">
                        <div class="small fw-normal">PASO 1</div>
                        <div class="text-primary">INFORMACION GENERAL</div>
                    </li>
                    <li class="list-group-item bg-transparent text-muted">
                    <div class="small fw-normal">PASO 2</div>
                        <div>UBICACION</div>
                    </li>
                </ul> 
            </div>
            <div class="col">
                <!-- formulario -->
                <form method="POST" action="{{ route('proveedores.store.general') }}" class="shadow-sm bg-white p-4 rounded w-100">
                    @csrf
                    <!-- nombre producto -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del proveedor</label>
                        <input type="text" class="form-control bg-white" id="nombre" name="nombre" required>
                    </div>
                    <!-- correo y tel 
                    <div class="mb-4">
                        <label for="email" class="form-label">Correo</label>
                        <input type="text" class="form-control bg-white" id="email" name="email" required>
                    </div> -->
                    <!-- sku y categoria -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control bg-white" id="telefono" name="telefono" required>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">                            
                                <label for="id_categoria" class="form-label">Categoria</label>
                                <a href="#" class="text-primary fw-medium d-flex flex-grow-1 link-underline link-underline-opacity-0 justify-content-end" data-bs-toggle="modal" data-bs-target="#addCategoria">
                                    Agregar una categoría +
                                </a>
                            </div>
                            <select class="form-select bg-white" id="id_categoria" name="id_categoria" required>
                                <option selected disabled>Selecciona una categoria</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- subir img -->
                    <div class="mb-4">
                        <label for="imagen" class="form-label">Subir imagen</label>
                        <input type="file" class="form-control bg-white" id="imagen" name="imagen" accept="image/*">
                    </div>
                    <!-- botones -->
                    <div class="d-flex justify-content-between gap-3">
                        <button type="button" class="btn btn-light flex-fill border" 
                            onclick="window.location.href='{{ route('proveedores.index') }}'">Regresar</button>
                        <button type="submit" class="btn btn-primary flex-fill">Siguiente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- el modal aka formulario add categoria -->
@include('components.modales.addCategoria')

@endsection
