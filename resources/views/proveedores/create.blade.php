@extends('layouts.app')

@section('title', 'Agregar proveedor')

@section('content')
<div class="col px-5">
    <div class="text-center">
        <small class="text-muted fs-6">Agregar proveedor</small>
        <h2 class="fw-bold namePaso">INFORMACION GENERAL</h2>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="d-flex gap-3 w-75 p-4">
            <!-- columna / pasos -->
            <div class="col-3 bg-transparent">
                <ul class="list-group list-group-flush">
                    <li id="paso-item-1" class="list-group-item border-0 thisPaso rounded shadow-sm" data-name="INFORMACION GENERAL">
                        <small class="fw-normal">PASO 1</small>
                        <div class="titulo">INFORMACION GENERAL</div>
                    </li>
                    <li id="paso-item-2" class="list-group-item border-0 bg-transparent text-muted" data-name="INFORMACION MONETARIA">
                        <small class="fw-normal">PASO 2</small>
                        <div class="titulo">UBICACION</div>
                    </li>
                </ul> 
            </div>
            <div class="col">
                <!-- formulario -->
                <form method="POST" action="{{ route('proveedores.store.general') }}" class="shadow-sm bg-white p-4 rounded w-100">
                    @csrf
                    <!-- paso no. 1 -->
                    <div id="paso_1" class="col">
                        <!-- nombre proveedor -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del proveedor</label>
                            <input type="text" class="form-control bg-white" id="nombre" name="nombre" required>
                        </div>
                        <!-- categoria -->
                        <div class="mb-4">
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
                        <!-- subir img -->
                        <div class="mb-4">
                            <label for="imagen" class="form-label">Subir imagen</label>
                            <input type="file" class="form-control bg-white" id="imagen" name="imagen" accept="image/*">
                        </div>
                        <!-- botones -->
                        <div class="d-flex justify-content-between gap-3">
                            <button type="button" class="btn btn-light flex-fill border" 
                                onclick="window.location.href='{{ route('productos.index') }}'">Regresar</button>
                            <button type="button" class="btn btn-primary flex-fill" onclick="nextStep(1,2)">Siguiente</button>
                        </div>
                    </div>
                    <!-- paso no. 2 -->
                    <div id="paso_2" class="col" style="display:none;">
                        <!-- direccion -->
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Direccion</label>
                            <input type="text" class="form-control bg-white" id="direccion" name="direccion" required>
                        </div>
                        <!-- correo y telefono -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="text" class="form-control bg-white" id="telefono" name="telefono" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Correo</label>
                                <input type="text" class="form-control bg-white" id="email" name="email" required>
                            </div>
                        </div>
                        <!-- botones -->
                        <div class="d-flex justify-content-between gap-3">
                            <button type="button" class="btn btn-light flex-fill border" onclick="prevStep(2,1)">Regresar</button>
                            <button type="submit" class="btn btn-primary flex-fill">Agregar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- el modal aka formulario add categoria -->
@include('components.modales.addCategoria')

<script>
    
    function switchIt(pasoActual, pasoSiguiente) {

        document.querySelector(`#paso_${pasoActual}`).style.display = 'none';
        document.querySelector(`#paso_${pasoSiguiente}`).style.display = 'block';
        
        document.querySelector(`#paso-item-${pasoActual}`).classList.remove('thisPaso', 'bg-white', 'rounded', 'fw-bold', 'shadow-sm');
        document.querySelector(`#paso-item-${pasoActual}`).classList.add('bg-transparent', 'text-muted');

        document.querySelector(`#paso-item-${pasoSiguiente}`).classList.add('thisPaso', 'bg-white', 'rounded', 'fw-bold', 'shadow-sm');
        document.querySelector(`#paso-item-${pasoSiguiente}`).classList.remove('bg-transparent', 'text-muted');

        const namePaso = document.querySelector(`#paso-item-${pasoSiguiente}`).getAttribute('data-name');
        document.querySelector('.namePaso').textContent = namePaso;

    }

    function nextStep(pasoActual, pasoSig) {
        switchIt(pasoActual, pasoSig);
    }

    function prevStep(pasoPrev, pasoActual) {
        switchIt(pasoPrev, pasoActual);
    }

    function addUbi() {

        const container = document.getElementById('ubisContainer');
        // clonanding
        const nwUbi = document.querySelector('.ubi-field').cloneNode(true);
        
        nwUbi.querySelector('select').selectedIndex = 0; // dropdown reiniciade
        nwUbi.querySelector('input').value = '';          // campo cantidad vacio
        
        container.appendChild(nwUbi);
    
    }

</script>

@endsection
