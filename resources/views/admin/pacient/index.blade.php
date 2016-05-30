@extends('admin.template.main')

@section('title', 'Pacientes')

@section('container')
	
	
	<?php $data = array(
		'icon_class' => "fa fa-user", 
		'title_label' => 'Pacientes',
		'title_table' => 'Lista de Pacientes',
		'model_labels' => array("Nombre", "Cedula", "Email", "Telefono", "Sexo"),
	);
	?>

	@include('admin.template.index-model', $data)

@endsection