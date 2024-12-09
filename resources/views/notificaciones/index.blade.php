@extends('layouts.app')

@section('title') Notificaciones @endsection

@section('content')
<div class="col px-5">
    <!-- Header de la sección -->
    <div class="row align-items-center pb-3">
        <div class="col">
            <div class="fs-2 fw-semibold">Notificaciones</div>
        </div>
    </div>

    <!-- Tarjeta de notificaciones -->
    <div class="d-flex pb-5">
        <div class="col bg-white rounded shadow-sm">
            <div class="card bg-white border-0">
                <div class="card-body p-4">
                    <h5 class="card-title fw-bold">Tus Notificaciones</h5>

                    @if(isset($notificaciones) && $notificaciones->isNotEmpty())
                        <ul class="list-group list-group-flush">
                            @foreach($notificaciones as $notificacion)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1 fw-bold">{{ $notificacion->data['titulo'] }}</h6>
                                        <p class="mb-0 text-muted small">
                                            {{ $notificacion->data['mensaje'] }}
                                        </p>
                                    </div>
                                    <a href="{{ route('notificaciones.mostrar', $notificacion->id) }}" class="btn btn-sm btn-primary">
                                        Ver Detalles
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">No tienes notificaciones en este momento.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
