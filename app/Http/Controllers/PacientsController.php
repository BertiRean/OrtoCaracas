<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pacient;
use App\Http\Requests\StorePacientRequest;

class PacientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacients = Pacient::all();

        $data = [
          'title_table' => 'Listado de Pacientes',
          'button_delete' => 'Eliminar Paciente',
          'button_create' => 'Crear Paciente',
          'model_labels' => array("Nombre", "Cedula", "Telefono", "Sexo", "Edad"),
          'pacients' => $pacients,
          'icons' => ['fa fa-user' => 'Pacientes']
        ];

        return view('admin.pacient.index', $data);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
          'icons' => ['fa fa-user' => 'Pacientes', 'fa fa-plus-square-o' => 'Registro de Pacientes']
        ];
        return view('admin.pacient.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePacientRequest $request)
    {
        $pacient = Pacient::create($request->all());

        $data = [
          'title_table' => 'Listado de Pacientes',
          'button_delete' => 'Eliminar Paciente',
          'button_create' => 'Crear Paciente',
          'model_labels' => array("Nombre", "Cedula", "Telefono", "Sexo", "Edad"),
          'pacients' => Pacient::all(),
          'icons' => ['fa fa-user' => 'Pacientes']
        ];

        return redirect()->route('admin.pacient.index', $data);
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
      
    }
}
