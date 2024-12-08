<!-- Modal/Formulario Editar Usuario -->
<div class="offcanvas offcanvas-end bg-white p-3 {{ $errors->any() ? 'show' : '' }}" style="width: 30em" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" data-bs-backdrop="static">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Modificar sus datos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" id="closeOffcanvas" {{ $errors->any() ? 'disabled' : '' }}></button>
    </div>
    <div class="offcanvas-body d-flex align-items-center">
        <!-- Formulario -->
        <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
            @csrf @method('PATCH')
            <!-- Foto de perfil -->
            <div class="text-center position-relative mb-5">
                <img src="{{ asset(Auth::user()->img ?? 'storage/img/persona-default.jpg') }}" alt="User Photo" 
                class="rounded-circle profile-img" style="width: 180px; height: 180px; object-fit: cover;">
                <label for="img" style="width: 180px" class="change-image-label position-absolute top-50 start-50 translate-middle h-100 d-flex align-items-center justify-content-center text-white fw-medium">
                    Cambiar
                    <input type="file" id="img" name="img" class="d-none" accept="image/*">
                </label>
                @if ($errors->has('img'))
                    <span class="text-danger d-block mt-1">{{ $errors->first('img') }}</span>
                @endif
            </div>
            <!-- Username -->
            <div class="float-label position-relative mb-3">
                <input type="text" class="form-control bg-white {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" placeholder=" " value="{{ old('name', $user->name) }}" name="name" required>
                <label for="name" class="form-label m-0">Username</label>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <!-- Nombre -->
            <div class="float-label position-relative mb-3">
                <input type="text" class="form-control bg-white {{ $errors->has('name_completo') ? 'is-invalid' : '' }}" id="name_completo" placeholder=" " value="{{ old('name_completo', $user->name_completo) }}" name="name_completo" required>
                <label for="name_completo" class="form-label m-0">Nombre completo</label>
                @if ($errors->has('name_completo'))
                    <span class="text-danger">{{ $errors->first('name_completo') }}</span>
                @endif
            </div>
            <!-- Teléfono y Correo -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="float-label position-relative">
                        <input type="text" class="form-control bg-white {{ $errors->has('telefono') ? 'is-invalid' : '' }}" id="telefono" placeholder=" " value="{{ old('telefono', $user->telefono) }}" name="telefono">
                        <label for="telefono" class="form-label m-0">Teléfono</label>
                        @if ($errors->has('telefono'))
                            <span class="text-danger">{{ $errors->first('telefono') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="float-label position-relative">
                        <input type="email" class="form-control bg-white {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder=" " value="{{ old('email', $user->email) }}" name="email" required>
                        <label for="email" class="form-label m-0">Correo</label>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Ubicación -->
            <div class="float-label position-relative mb-5">
                <input type="text" class="form-control bg-white {{ $errors->has('direccion') ? 'is-invalid' : '' }}" id="direccion" placeholder=" " value="{{ old('direccion', $user->direccion) }}" name="direccion">
                <label for="direccion" class="form-label m-0">Ubicación</label>
                @if ($errors->has('direccion'))
                    <span class="text-danger">{{ $errors->first('direccion') }}</span>
                @endif
            </div>
            <!-- Botón de actualización -->
            <button type="submit" class="w-100 btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
