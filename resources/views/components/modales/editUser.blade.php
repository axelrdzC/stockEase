<!-- el modal aka formulario edit user -->
<div class="offcanvas offcanvas-end bg-white p-3" style="width: 30em" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasRightLabel">Modificar sus datos</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex align-items-center">
        <!-- formulario -->
        <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
            @csrf @method('PATCH')
                <div class="text-center position-relative mb-5">
                    <img src="{{ asset(Auth::user()->img ?? 'storage/img/persona-default.jpg') }}" alt="User Photo" 
                    class="rounded-circle profile-img" style="width: 180px; height: 180px; object-fit: cover;">
                    <label for="img" style="width: 180px" class="change-image-label position-absolute top-50 start-50 translate-middle h-100 d-flex align-items-center justify-content-center text-white fw-medium">
                        Cambiar
                        <input type="file" id="img" name="img" class="d-none" value="{{ $user->img }}" accept="image/*">
                    </label>
                </div>
                <!-- username -->
                <div class="float-label position-relative mb-3">
                    <input type="text" class="form-control bg-white" id="name" placeholder=" " value="{{ $user->name }}" name="name" required>
                    <label for="name" class="form-label m-0">Username</label>
                </div>
                <!-- nombre -->
                <div class="float-label position-relative mb-3">
                    <input type="text" class="form-control bg-white" id="name_completo" placeholder=" " value="{{ $user->name_completo }}" name="name_completo" required>
                    <label for="name_completo" class="form-label m-0">Nombre completo</label>
                </div>
                <!-- telefono y correo -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="float-label position-relative">
                            <input type="text" class="form-control bg-white" id="telefono" placeholder=" " value="{{ $user->telefono }}" name="telefono" required>
                            <label for="telefono" class="form-label m-0">Telefono</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="float-label position-relative">
                            <input type="email" class="form-control bg-white" id="email" placeholder=" " value="{{ $user->email }}" name="email" required>
                            <label for="email" class="form-label m-0">Correo</label>
                        </div>
                    </div>
                </div>
                <!-- ubicacion -->
                <div class="float-label position-relative mb-5">
                    <input type="direccion" class="form-control bg-white" id="direccion" placeholder=" " value="{{ $user->direccion }}" name="direccion" required>
                    <label for="direccion" class="form-label m-0">Ubicacion</label>
                </div>
        
                <button type="submit" class="w-100 btn btn-primary">Actualizar</button>
        </form>    
    </div>
</div>¿