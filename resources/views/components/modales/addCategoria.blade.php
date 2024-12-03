<div class="modal fade" id="addCategoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Añadir categoría</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('categorias.store') }}" class="shadow-sm p-4 rounded">
            @csrf
                <div class="modal-body">
                    <!-- nombre categoria -->
                    <div class="float-label position-relative mb-3">
                        <input type="text" class="form-control bg-white" id="nombre" placeholder=" " name="nombre" required>
                        <label for="nombre" class="form-label m-0">Nombre de la categoria</label>
                    </div>
                    <!-- desc -->
                    <div class="float-label position-relative mb-3">
                        <textarea class="form-control bg-white" id="descripcion" placeholder="" name="descripcion" rows="2"></textarea>
                        <label for="descripcion" class="form-label m-0">Descripcion</label>
                    </div>
                    <input type="text" hidden id="tipo" name="tipo" value="producto">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addTipo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Añadir un tipo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('categorias.store') }}" class="shadow-sm p-4 rounded">
            @csrf
                <div class="modal-body">
                    <!-- nombre categoria -->
                    <div class="float-label position-relative mb-3">
                        <input type="text" class="form-control bg-white" id="nombre" placeholder=" " name="nombre" required>
                        <label for="nombre" class="form-label m-0">Nombre de la categoria</label>
                    </div>
                    <!-- desc -->
                    <div class="float-label position-relative mb-3">
                        <textarea class="form-control bg-white" id="descripcion" name="descripcion" rows="2"></textarea>
                        <label for="descripcion" class="form-label m-0">Descripcion</label>
                    </div>
                    <input type="text" hidden id="tipo" name="tipo" value="persona">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>