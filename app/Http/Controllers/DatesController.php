<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dates;
use App\Pacient;

class DatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates = Dates::paginate(10);

        $data = [
          'title_table' => 'Listado de Citas',
          'button_delete' => 'Eliminar Cita',
          'button_create' => 'Registrar Cita',
          'model_labels' => ['Doctor Asignado', 'Paciente', 'Fecha de la Cita', 'Acciones'],
          'dates' => $dates,
          'icons' => ['fa fa-calendar' => 'Citas']
        ];

        return view('admin.dates.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->find_pacient();
    }

    public function find_pacient()
    {
        $pacient = Pacient::paginate(10);

        $data = [
          'title_table' => 'Listado de Pacientes',
          'model_labels' => ['Paciente', 'Cedula', 'Accion'],
          'pacients' => $pacient,
          'icons' => ['fa fa-calendar' => 'Citas']
        ];

        return view('admin.dates.pacient_find', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
