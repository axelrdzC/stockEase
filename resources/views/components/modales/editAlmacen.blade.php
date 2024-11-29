<!-- el modal aka formulario edit almacen -->
<div class="modal fade" id="editar-{{ $almacen->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- formulario -->
            <form method="POST" action="{{ route('almacenes.update', $almacen) }}" enctype="multipart/form-data">
                @csrf @method('PATCH')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar informacion del almacen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <!-- nombre almacen -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del almacen</label>
                            <input type="text" class="form-control bg-white" id="nombre" name="nombre" value="{{ $almacen->nombre }}" required>
                        </div>
                        <!-- pais y estado -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="pais" class="form-label">País</label>
                                <select class="form-select bg-white" id="pais" name="pais" required>
                                    <option selected disabled>Selecciona un país</option>
                                    <option value="México" {{ $almacen->pais == 'México' ? 'selected' : '' }}>México</option>
                                    <option value="Estados Unidos" {{ $almacen->pais == 'Estados Unidos' ? 'selected' : '' }}>Estados Unidos</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="estado" class="form-label">Estado</label>
                                <select class="form-select bg-white" id="estado" name="estado" required>
                                    <option selected disabled>Selecciona un estado</option>
                                    <option value="Tamaulipas" {{ $almacen->estado == 'Tamaulipas' ? 'selected' : '' }}>Tamaulipas</option>
                                    <option value="Nuevo León" {{ $almacen->estado == 'Nuevo León' ? 'selected' : '' }}>Nuevo Leon</option>
                                </select>
                            </div>
                        </div>
                        <!-- ciudad y CP -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="ciudad" class="form-label">Ciudad</label>
                                <select class="form-select bg-white" id="ciudad" name="ciudad" required>
                                    <option selected disabled>Selecciona una ciudad</option>
                                    <option value="Ciudad Victoria" {{ $almacen->ciudad == 'Ciudad Victoria' ? 'selected' : '' }}>Ciudad Victoria</option>
                                    <option value="Tampico" {{ $almacen->ciudad == 'Tampico' ? 'selected' : '' }}>Tampico</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="codigo_p" class="form-label">Código Postal</label>
                                <input type="number" class="form-control bg-white" id="codigo_p" name="codigo_p" value="{{ $almacen->codigo_p }}" required>
                            </div>
                        </div>
                        <!-- colonia / calles -->
                        <div class="mb-3">
                            <label for="colonia" class="form-label">Colonia y calle</label>
                            <input type="text" class="form-control bg-white" id="colonia" name="colonia" value="{{ $almacen->colonia }}"required>
                        </div>
                        <!-- subir img -->
                        <div class="mb-3">
                            <label for="img" class="form-label">
                                @isset($almacen->img)
                                    Reemplazar imagen
                                @else
                                    Subir imagen
                                @endisset
                            </label>
                            <div class="d-flex align-items-center gap-2">
                                @isset($almacen->img)
                                    <img src="{{ asset($almacen->img) }}" alt="Imagen del proveedor" class="rounded"
                                    style="width: 37px; height: 37px; object-fit: cover;">
                                @endisset
                                <input type="file" class="form-control bg-white" id="img" name="img" accept="image/*">
                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </form>    
        </div>
    </div>
</div>   