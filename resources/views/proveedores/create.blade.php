@extends('proveedores.form')

@section('formName')
    Agregar proveedor
@endsection

@section('crudAction')
    Agregar proveedor
@endsection

@section('action')
    action = "{{ route('proveedores.store') }}"
@endsection
