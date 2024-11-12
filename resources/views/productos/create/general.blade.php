@extends('layouts.app')

@section('title', 'Agregar producto')

@section('content')
<div class="col px-5">
    <div class="text-center">
        <small class="text-muted fs-6">Agregar Producto</small>
        <h2 class="fw-bold">INFROMACION GENERAL</h2>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="row p-4"> <!-- 
            <div class="col-md-4 bg-transparent">
                vista de la lista de pasos
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
            </div>-->
            <div class="col">
                <!-- formulario -->
                <form method="POST" action="{{ route('productos.store.general') }}" class="shadow-sm bg-white p-4 rounded" style="width: 50rem;">
                    @csrf
                    <!-- nombre producto -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del producto</label>
                        <input type="text" class="form-control bg-white" id="nombre" name="nombre" required>
                    </div>
                    <!-- proveedor -->
                    <div class="mb-4">
                        <div class="row">                            
                            <label for="proveedor_id" class="form-label col-9">Nombre del proveedor</label>
                            <a href="{{ route('proveedores.create.general') }}" class="text-primary fw-medium col link-underline link-underline-opacity-0 d-flex flex-grow-1 justify-content-end">
                                Agregar un proveedor +
                            </a>
                        </div>
                            <select class="form-select bg-white" id="proveedor_id" name="proveedor_id" required>
                                <option selected disabled>Selecciona un proveedor</option>
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                @endforeach
                            </select>
                    </div>
                    <!-- sku y categoria -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="sku" class="form-label">Codigo SKU</label>
                            <input type="text" class="form-control bg-white" id="sku" name="sku" required>
                        </div>
                        <div class="col-md-6">
                            <div class="row">                            
                                <label for="categoria_id" class="form-label col">Categoria</label>
                                <a href="#" class="text-primary fw-medium col link-underline link-underline-opacity-0" data-bs-toggle="modal" data-bs-target="#addCategoria">
                                    Agregar una categoría +
                                </a>
                            </div>
                            <select class="form-select bg-white" id="categoria_id" name="categoria_id" required>
                                <option selected disabled>Selecciona una categoria</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- precio y unidad -->
                    <div class="row mb-4">
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
                    <div class="mb-4">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea class="form-control bg-white" id="descripcion" name="descripcion" rows="3" required></textarea>
                    </div>
                    <!-- cant y almacen -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="cantidad_producto" class="form-label">Cantidad de unidades</label>
                            <input type="number" class="form-control bg-white" id="cantidad_producto" name="cantidad_producto" required>
                        </div>
                        <div class="col-md-6">    
                            <div class="row">                            
                                <label for="proveedor_id" class="form-label col">Almacen</label>
                                <a href="{{ route('almacenes.create.general') }}" class="text-primary fw-medium col link-underline link-underline-opacity-0">
                                    Agregar un almacen +
                                </a>
                            </div>
                            <select class="form-select bg-white" id="almacen_id" name="almacen_id" required>
                                <option selected disabled>Selecciona un almacen</option>
                                @foreach ($almacenes as $almacen)
                                    <option value="{{ $almacen->id }}">{{ $almacen->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
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
                            onclick="window.location.href='{{ route('productos.index') }}'">Regresar</button>
                        <button type="submit" class="btn btn-primary flex-fill">Siguiente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- el modal aka formulario add categoria -->
@include('components.modales.addCategoria')

<script>
    function updateFileName(input) {
        const fileText = document.querySelector('.file-text');
        if (input.files && input.files[0]) {
            fileText.innerHTML = input.files[0].name + ". ";
            const link = document.createElement("a");
            link.className = "text-primary fw-bold link-underline link-underline-opacity-0";
            link.href = "#";
            link.textContent = "Cambiar imagen";
            link.onclick = (e) => { e.preventDefault(); input.click(); };
            fileText.appendChild(link);
        }
    }
</script>

@endsection
