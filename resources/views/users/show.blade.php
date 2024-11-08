@extends('layouts.app')

@section('title')
Show User
@endsection

@section('content')
<div class="row align-items-center pb-3">
    <div class="col-sm-3 col-lg-5">
        <div class="fs-2 fw-semibold">Hola <span class="user-name">{{ Auth::user()->name }}</span> 👋</div>
    </div>
    <!-- /.col-->
    <div class="col-6 ms-auto">
        <div class="d-flex align-items-center">
            <div class="input-group me-3">
            </div>
            <button type="button" onclick="" class="btn btn-primary text-nowrap p-1 px-2 fw-medium">Editar perfil</button>
        </div>
    </div>
    <!-- /.col-->
</div>
<!-- /.row-->

<div class="bg-light rounded">
    <div class="card">
        <div class="card-body d-flex p-4">
            <div class="d-flex align-items-center pe-4 w-75" style="border-right: 1px solid #dee2e6;">
                <!-- Lado izquierdo: Foto y nombre -->
                <div class="text-center me-4">
                    <img src="{{ asset('img/default-avatar.jpg') }}" alt="User Photo" class="rounded-circle" style="width: 120px; height: 120px;">
                </div>
                <div>
                    <h2 class="mb-0">{{ $user->username }}</h2>
                    <small class="text-muted">{{ $user->name }}</small>
                </div>
            </div>

            <div class="ms-4 row d-flex justify-content-center align-items-center gap-0">
                <h5 class="card-title">Información del usuario</h5>
                <div>
                    <strong>Email:</strong> {{ $user->email }}
                </div>
                <div>
                    <strong>Username:</strong> {{ $user->username }}
                </div>
                <div>
                    <strong>Telefono:</strong>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-transparent border border-0 mt-4 p-0">
    <div class="card bg-transparent border border-0 p-0">
        <div class="card-body p-0">
            <h5 class="card-title">Actividad</h5>
            <hr class="my-3 border-bottom"> <!-- Borde inferior -->
            <div>
            </div>
        </div>
    </div>
</div>

@endsection