<?php

namespace App\Http\Controllers;


use App\Http\Requests;

use App\Http\Controllers\View;

use App\Pacient;

use App\Department;


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

    public function find_pacient($type, $id)
    {   
        $department = Department::find($id);
        $pacient = Pacient::paginate(10);
        $icons = array();
        $link_create;
        $text_button;


        if($type == 'Citas')
        {
            $link_create = 'admin.dates.create_date';
        	$icons['fa fa-calendar'] = $type;
            $text_button = 'Crear Cita';
        }
        if($type == 'Examenes')
        {
            $link_create = 'admin.exams.create_exam';
        	$icons['fa fa-file-o'] = $type;
            $text_button = 'Crear Examen';
        }
        if($type == 'Consultas')
        {
            $link_create = 'admin.consults.create_consult';
            $icons['fa fa-file-o'] = $type;
            $text_button = 'Crear Consulta';   
        }

        $data = [
          'title_table' => 'Listado de Pacientes',
          'model_labels' => ['Paciente', 'Cedula', 'Accion'],
          'pacients' => $pacient,
          'icons' => $icons,
          'link_model' => $link_create,
          'button_text_type' => $text_button,
          'department' => $department
        ];

        return view('admin.pacient_find', $data);
    }

    public function find_pacient_date($type)
    {   
        $pacient = Pacient::paginate(10);
        $icons = array();
        $link_create;
        $text_button;


        if($type == 'Citas')
        {
            $link_create = 'admin.dates.create_date';
            $icons['fa fa-calendar'] = $type;
            $text_button = 'Crear Cita';
        }
        else
        {
            $link_create = 'admin.exams.create_exam';
            $icons['fa fa-file-o'] = $type;
            $text_button = 'Crear Examen';
        }

        $data = [
          'title_table' => 'Listado de Pacientes',
          'model_labels' => ['Paciente', 'Cedula', 'Accion'],
          'pacients' => $pacient,
          'icons' => $icons,
          'link_model' => $link_create,
          'button_text_type' => $text_button,
          'department' => null
        ];

        return view('admin.pacient_find', $data);
    }
}
