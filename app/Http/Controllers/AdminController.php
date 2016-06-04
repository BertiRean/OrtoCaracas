<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\View;

class AdminController extends Controller
{
    public function getIndex()
    {
    	return view('admin.index');
    }

    public function showDoctor()
    {
    	$data = array(
		'icon_class' => "fa fa-user-md", 
		'title_label' => 'Doctores',
		'title_table' => 'Lista de Doctores',
		'model_labels' => array("Nombre", "Especialidad", "Email", "Telefono", "Cuenta Bancaria"),
		'button_create' =>  'Registrar Doctor',
		'button_delete' => 'Eliminar Doctor');

		return view('admin.template.index-model', $data);
    }

    public function showPacient()
    {
    	$data = array(
		'icon_class' => "fa fa-user", 
		'title_label' => 'Pacientes',
		'title_table' => 'Lista de Pacientes',
		'model_labels' => array("Nombre", "Cedula", "Email", "Telefono", "Sexo"),
		'button_create' =>  'Registrar Paciente',
		'button_delete' => 'Eliminar Paciente');

		return view('admin.template.index-model', $data);
    }

    public function showDates()
    {
    	$data = array(
		'icon_class' => "fa fa-calendar", 
		'title_label' => 'Citas',
		'title_table' => 'Lista de Citas',
		'model_labels' => array("Paciente", "Doctor", "Fecha"),
		'button_create' => 'Registrar Cita',
		'button_delete' => 'Eliminar Cita');

		return view('admin.template.index-model', $data);
    }
}
