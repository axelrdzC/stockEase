@extends('productos.form')

@section('formName')
    Agregar producto
@endsection

@section('crudAction')
    Agregar producto
@endsection

@section('action')
    action = "{{ route('productos.store') }}"
@endsection
