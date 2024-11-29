@extends('clientes.form')

@section('formName') Agregar cliente @endsection

@section('crudAction') Agregar cliente @endsection

@section('action')
    action = "{{ route('clientes.store') }}"
@endsection
