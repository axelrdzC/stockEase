<!-- el modal aka formulario edit user -->
<div class="modal fade" id="editUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- formulario -->
            <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
                @csrf @method('PATCH')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modificar sus datos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mt-3 mb-4">
                        <img src="{{ asset(Auth::user()->img ?? 'storage/img/persona-default.jpg') }}" alt="User Photo" class="rounded-circle" style="width: 120px; height: 120px;">
                    </div>
                    <!-- username -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control bg-white" id="name" name="name" value="{{ $user->name }}" required>
                    </div>
                    <!-- nombre -->
                    <div class="mb-3">
                        <label for="name_completo" class="form-label">Nombre</label>
                        <input type="text" class="form-control bg-white" id="name_completo" name="name_completo" value="{{ $user->name_completo }}">
                    </div>
                    <!-- telefono y correo -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control bg-white" id="telefono" name="telefono" value="{{ $user->telefono }}">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Correo</label>
                            <input type="text" class="form-control bg-white" id="email" name="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <!-- ubicacion -->
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Ubicacion</label>
                        <input type="text" class="form-control bg-white" id="direccion" name="direccion" value="{{ $user->ubicacion }}">
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