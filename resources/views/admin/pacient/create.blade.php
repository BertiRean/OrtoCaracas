@extends('admin.template.main')

@section('tittle', 'Registro de Pacientes')

@section('container')

	@include('admin.template.create-model', $data)

@endsection