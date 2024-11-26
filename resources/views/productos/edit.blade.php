@extends('productos.form')

@section('formName')
    Editar producto
@endsection

@section('crudAction')
    Editar producto
@endsection

@section('action')
    action = "{{ route('productos.update', $producto) }}"
@endsection

@section('method') @method('PATCH') @endsection