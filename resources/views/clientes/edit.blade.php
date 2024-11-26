@extends('clientes.form')

@section('formName') Editar cliente @endsection

@section('crudAction') Editar cliente @endsection

@section('action')
    action = "{{ route('clientes.update', $cliente) }}"
@endsection

@section('method') @method('PATCH') @endsection