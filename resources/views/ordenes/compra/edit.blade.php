@extends('ordenes.compra.form')

@section('formName') Editar Órden de Compra @endsection

@section('crudAction') Editar Órden de Compra @endsection

@section('action')
    action = "{{ route('ordenes.compra.update', $orden) }}"
@endsection

@section('method') @method('PATCH') @endsection
