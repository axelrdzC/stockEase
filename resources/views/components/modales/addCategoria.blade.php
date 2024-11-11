<div class="modal fade" id="addCategoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Añadir categoría</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('categorias.store') }}" class="shadow-sm bg-white p-4 rounded">
            @csrf
                <div class="modal-body">
                    <!-- nombre categoria -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la categoria</label>
                        <input type="text" class="form-control bg-white" id="nombre" name="nombre" required>
                    </div>
                    <!-- desc -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea class="form-control bg-white" id="descripcion" name="descripcion" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>