@extends('proveedores.form')

@section('formName')
    Editar proveedor
@endsection

@section('crudAction')
    Editar proveedor
@endsection

@section('action')
    action = "{{ route('proveedores.update', $proveedor) }}"
@endsection

@section('method') @method('PATCH') @endsection