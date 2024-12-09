 <!-- Modal -->
 <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Gestión de Usuarios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <img src="{{ asset($user->img ?? 'storage/img/persona-default.jpg') }}" 
                                             alt="Foto de {{ $user->name }}" 
                                             class="rounded-circle" 
                                             style="width: 50px; height: 50px; object-fit: cover;">
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @php
                                            $roles = [
                                                'super-admin' => 'SUPER ADMIN',
                                                'admin' => 'ADMIN',
                                                'empleado' => 'EMPLEADO'
                                            ];
                                            $userRoles = $user->getRoleNames();
                                        @endphp
                                        @foreach ($userRoles as $userRole)
                                            @if (array_key_exists($userRole, $roles))
                                                {{ $roles[$userRole] }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>                            
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar-{{ $user->id }}">                                        
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@foreach ($users as $user)
<div class="modal fade" id="eliminar-{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" aria-labelledby="staticBackdropLabel">Confirme su acción</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p>¿Está seguro de que desea eliminar al siguiente usuario?</p>
                <div class="card-body d-flex flex-column align-items-center p-0">
                    <img src="{{ asset($user->img ?? 'storage/img/persona-default.jpg') }}" 
                        alt="Foto de {{ $user->name }}" 
                        class="rounded-circle mb-3" 
                        style="width: 100px; height: 100px; object-fit: cover;">
                </div>
                <p class="mt-4"> Nombre: <strong>{{ $user->name }}</strong></p>
                <p class="mb-1"> Correo: <strong>{{ $user->email }}</strong></p>
                <p class="mb-0"> Teléfono: <strong>{{ $user->telefono ?? 'No disponible' }}</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Eliminar usuario</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach