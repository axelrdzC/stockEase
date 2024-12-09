<div class="modal fade" id="eliminar-{{ $producto->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirme su accion</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="">Esta seguro de querer borrar el siguiente producto: </p>
                <p class="m-0"> Nombre: {{ $producto->nombre }} </p>
                <p class="m-0"> SKU: {{ $producto->SKU }} </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-primary">Eliminar producto</button>
                </form>
            </div>
        </div>
    </div>
</div>