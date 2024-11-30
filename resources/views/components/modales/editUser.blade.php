<!-- el modal aka formulario edit user -->
<div class="offcanvas offcanvas-end p-3" style="width: 30em" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasRightLabel">Modificar sus datos</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <!-- formulario -->
        <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
            @csrf @method('PATCH')
                <div class="text-center position-relative mt-3 mb-4">
                    <img src="{{ asset(Auth::user()->img ?? 'storage/img/persona-default.jpg') }}" alt="User Photo" 
                    class="rounded-circle profile-img" style="width: 120px; height: 120px;">
                    <label for="img" class="change-image-label position-absolute top-50 start-50 translate-middle h-100 d-flex align-items-center justify-content-center text-white fw-medium">
                        Cambiar
                        <input type="file" id="img" name="img" class="d-none" accept="image/*">
                    </label>
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
                    <input type="text" class="form-control bg-white" id="direccion" name="direccion" value="{{ $user->direccion }}">
                </div>
        
                <button type="submit" class="w-100 btn btn-primary">Aceptar</button>
        </form>    
    </div>
</div>¿