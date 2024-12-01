<!-- el modal aka formulario edit almacen -->
<div class="modal fade" id="editar-{{ $almacen->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-white">
            <!-- formulario -->
            <form method="POST" action="{{ route('almacenes.update', $almacen) }}" enctype="multipart/form-data">
                @csrf @method('PATCH')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar informacion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex gap-3">
                    <div class="col">
                        <!-- subir img -->
                        <div class="mb-3">
                            <label for="img" class="form-label">
                                @isset($almacen->img)
                                    Reemplazar imagen
                                @else
                                    Subir imagen
                                @endisset
                            </label>
                            <div class="d-flex flex-column align-items-center">
                                @isset($almacen->img)
                                    <img src="{{ asset($almacen->img) }}" alt="Imagen del almacen" id="preview-{{ $almacen->id }}" 
                                    class="rounded img-thumbnail w-100 rounded-bottom-0" 
                                    style="height: 23.25em; object-fit: cover;">
                                @endisset
                                <input type="file" class="form-control rounded-top-0 bg-white" id="img-{{ $almacen->id }}" name="img" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- nombre almacen -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del almacen</label>
                            <input type="text" class="form-control bg-white" id="nombre" name="nombre" value="{{ $almacen->nombre }}" required>
                        </div>
                        <!-- capacidad total -->
                        <div class="mb-3">
                            <label for="capacidad" class="form-label">Capacidad total (unidades)</label>
                            <input type="number" class="form-control bg-white" id="capacidad" name="capacidad" value="{{ $almacen->capacidad }}" required>
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
                    </div>
                </div>
                <div class="modal-footer">
                    <a type="button" href="{{ route('almacenes.show' , $almacen ) }}" class="btn btn-outline-primary">Administrar secciones</a>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </form>    
        </div>
    </div>
</div>   