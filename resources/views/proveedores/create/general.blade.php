@extends('layouts.app')

@section('title', 'Agregar proveedor')

@section('content')
<div class="col px-5">
    <div class="text-center">
        <small class="text-muted fs-6">Agregar Proveedor</small>
        <h2 class="fw-bold">INFROMACION GENERAL</h2>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div id="paso1" class="row p-4"> 
            <div class="col-md-4 bg-transparent">
                <!--vista de la lista de pasos-->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-white fw-bold rounded shadow-sm">
                        <div class="small fw-normal">PASO 1</div>
                        <div class="text-primary">INFORMACION GENERAL</div>
                    </li>
                    <li class="list-group-item bg-transparent text-muted">
                    <div class="small fw-normal">PASO 2</div>
                        <div>UBICACIÓN</div>
                    </li>
                </ul> 
            </div>
            <div class="col">
                <!-- formulario -->
                <form method="POST" action="{{ route('proveedores.store.general') }}" class="shadow-sm bg-white p-4 rounded" style="width: 50rem;">
                    @csrf
                    <!-- nombre proveedor -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del proveedor</label>
                        <input type="text" class="form-control bg-white" id="nombre" name="nombre" required>
                    </div>
                    <!-- correo y telefono -->
                    <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="text" class="form-control bg-white" id="correo" name="correo" required>
                            </div>
                            <div class="col-md-6">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control bg-white" id="telefono" name="telefono" required>
                            </div>
                        </div>
                        <!-- ciudad y CP -->
                        <div class="mb-3">
                            <div class="row">                            
                                <label for="categoria" class="form-label col">Categoria</label>
                                <a href="#" class="text-primary fw-medium col link-underline link-underline-opacity-0" data-bs-toggle="modal" data-bs-target="#addCategoria">
                                    Agregar una categoría +
                                </a>
                            </div>
                            <select class="form-select bg-white" id="categoria" name="categoria" required>
                                <option selected disabled>Selecciona una categoria</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
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
                        <button type="submit" class="btn btn-primary flex-fill" onclick="mostrarPaso2()">Siguiente</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- vista de ubicacion -->
        <div id="paso2" class="row p-4"> 
            <div class="col-md-4 bg-transparent">
                <!--vista de la lista de pasos-->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent text-muted">
                    <div class="small fw-normal">PASO 1</div>
                        <div class="text-primary">INFORMACION GENERAL</div>
                    </li>
                    <li class="list-group-item bg-white fw-bold rounded shadow-sm">
                    <div class="small fw-normal">PASO 2</div>
                        <div>UBICACIÓN</div>
                    </li>
                </ul> 
            </div>
            <div class="col">
                <!-- formulario -->
                <form method="POST" action="{{ route('proveedores.store.general') }}" class="shadow-sm bg-white p-4 rounded" style="width: 50rem;">
                    @csrf
                    <!-- País y Estado -->
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
                    <!-- colonia,calle,numero exterior e interior -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="colonia_calle" class="form-label">Colonia y Calle</label>
                            <input type="text" class="form-control bg-white" id="colonia_calle" name="colonia_calle" required>
                        </div>
                        <div class="col-md-3">
                            <label for="nExt" class="form-label">Nº Exterior</label>
                            <input type="number" class="form-control bg-white" id="nExt" name="nExt" required>
                        </div>
                        <div class="col-md-3">
                            <label for="nInt" class="form-label">Nº Interior</label>
                            <input type="number" class="form-control bg-white" id="nInt" name="nInt" required>
                        </div>
                    </div>
                    <!-- subir img -->
                    <div class="mb-4">
                        <label for="imagen" class="form-label">Subir imagen</label>
                        <input type="file" class="form-control bg-white" id="imagen" name="imagen" accept="image/*">
                    </div>
                    <!-- botones -->
                    <div class="d-flex justify-content-between gap-3">
                        <button type="button" onclick="mostrarPaso1()">Regresar</button>
                        <button type="submit" class="btn btn-primary flex-fill">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>

<!-- el modal aka formulario add categoria -->
@include('components.modales.addCategoria')

@endsection

<script>
    function mostrarPaso2() {
        document.getElementById('paso1').style.display = 'none';
        document.getElementById('paso2').style.display = 'block';
    }
    function mostrarPaso1() {
        document.getElementById('paso2').style.display = 'none';
        document.getElementById('paso1').style.display = 'block';
    }
</script>