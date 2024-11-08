@extends('layouts.app')

@section('content')
<div class="row align-items-center px-5 mb-4">
    <!-- titulo de la seccion -->
    <div class="col-md-8 p-0">
        <div class="fs-2 fw-semibold">{{ __('Dashboard') }}</div>
    </div>
    <!-- buscador -->
    <div class="col-md-4 p-0">
        <form class="d-flex" role="search">
            <div class="input-group"> 
                <input class="form-control border-secondary p-1 px-2 bg-white focus-ring focus-ring-primary input-blur" 
                    type="search" placeholder="Busca algun producto, orden, proveedor, etc." aria-label="Search">
                <button class="btn border border-secondary p-1 px-2 bg-white" type="button">
                    Buscar
                </button>
            </div>
        </form>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
