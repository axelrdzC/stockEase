@extends('layouts.app')

@section('title', 'Agregar almacen')

@section('content')
<div class="col px-5">
    <div class="text-center">
        <small class="text-muted fs-6">Agregar Almacen</small>
        <h2 class="fw-bold">INFROMACION GENERAL</h2>
    </div>
    <div class="d-flex justify-content-center">
        <div class="row w-75 p-4">
            <div class="col-md-8 mx-auto">
                <!-- formulario -->
                <form method="POST" action="{{ route('almacenes.store.general') }}" class="shadow-sm bg-white p-4 rounded">
                    @csrf
                    <!-- nombre almacen -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del almacen</label>
                        <input type="text" class="form-control bg-white" id="nombre" name="nombre" required>
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
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Subir imagen</label>
                        <input type="file" class="form-control bg-white" id="imagen" name="imagen" accept="image/*">
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

<script>

    function makeUbicacion() {
        const pais = document.getElementById('pais').value
        const estado = document.getElementById('estado').value
        const ciudad = document.getElementById('ciudad').value
        const codigo_p = document.getElementById('codigo_p').value
        const colonia = document.getElementById('colonia').value

        const ubicacion = `${ciudad} ${estado}, ${pais}.  ${calle}, CP. ${codigoPostal}`.trim()
        document.getElementById('ubicacion').value = ubicacion
    }

    document.getElementById('pais').addEventListener('input', actualizarDireccionCompleta)
    document.getElementById('estado').addEventListener('input', actualizarDireccionCompleta)
    document.getElementById('ciudad').addEventListener('input', actualizarDireccionCompleta)
    document.getElementById('codigo_postal').addEventListener('input', actualizarDireccionCompleta)
    document.getElementById('calle').addEventListener('input', actualizarDireccionCompleta)

</script>
@endsection
