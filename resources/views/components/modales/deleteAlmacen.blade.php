<div class="modal fade" id="eliminar-{{ $almacen->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirme su accion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="">Esta seguro de querer borrar el siguiente almacen: </p>
                    <div class="card-body d-flex flex-column p-0">
                        <img src="{{ asset('img/almacen.png') }}" alt="" class="rounded-3">
                    </div> 
                    <p class="mt-4"> Nombre: <strong> {{ $almacen->nombre }} </strong></p>
                    <p class="m-0 text-wrap"> Ubicación: <strong> {{ $almacen->pais }} , {{ $almacen->estado }}, {{ $almacen->ciudad }}, {{ $almacen->codigo_p }}, {{ $almacen->colonia }} </strong></p>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{ route('almacenes.destroy', $almacen) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-primary">Eliminar almacen</button>
                    </form>
                </div>
        </div>
    </div>
</div>