
<!-- el modal aka formulario create seccion -->
<div class="modal fade" id="crear-{{ $almacen->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-white">
            <!-- formulario -->
            <form method="POST" action="{{ route('secciones.store', $almacen) }}">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Crear seccion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex gap-3">
                    <div class="col">
                        <!-- nombre -->
                        <div class="col-md-4 float-label position-relative mt-2 mb-3">
                            <input type="text" class="form-control bg-white" id="nombre" placeholder=" " name="nombre" required>
                            <label for="nombre" class="form-label m-0">Nombre</label>
                        </div>
                        <!-- capacidad -->
                        <div class="col-md-4 float-label position-relative mb-3">
                            <input type="text" class="form-control bg-white" id="capacidad" placeholder=" " name="capacidad" required>
                            <label for="capacidad" class="form-label m-0">Capacidad</label>
                        </div>
                        <button type="submit" class="w-100 btn btn-primary" style="height: 2.5em">Aceptar</button>
                    </div>
                </div>
            </form>    
        </div>
    </div>
</div>   