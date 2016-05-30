@extends('admin.template.main')

@section('title', 'Doctores')

@section('container')
	
	
	<?php $data = array(
		'icon_class' => "fa fa-user-md", 
		'title_label' => 'Doctores',
		'title_table' => 'Lista de Doctores',
		'model_labels' => array("Nombre", "Especialidad", "Email", "Telefono", "Cuenta Bancaria"),
	);
	?>

	@include('admin.template.index-model', $data)

@endsection