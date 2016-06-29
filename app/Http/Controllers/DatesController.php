<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dates;
use App\Pacient;
use App\Doctor;
use App\Http\Requests\StoreDateRequest;
use Carbon\Carbon;
use Validator;
use Laracasts\Flash\Flash;


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
    public function create($id)
    {
        $pacient = Pacient::find($id);
        $doctors = Doctor::all();


        $doctor_array = array();

        foreach ($doctors as $doctor ) {
          $doctor_array[$doctor->id_doctor] = $doctor->name . " - " . $doctor->specs[0]['name'];
        }

        $data = [
          'doctors' => $doctor_array,
          'pacient' => $pacient,
          'icons' => ['fa fa-user-md' => 'Citas', 'fa fa-plus-square-o' => 'Registro de Citas']
        ];
        return view('admin.dates.create', $data);
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
    public function store(StoreDateRequest $request)
    {
      $date = new Dates;
      $doctor = Doctor::find($request->doctor);
      $pacient = Pacient::find($request->pacient_id);
      $flag_spec = false;

      $date->doctor_id = $doctor->id_doctor;
      $date->pacient_id = $pacient->id_pacient;
      $date->date_consult = Carbon::createFromFormat('d/m/Y', $request->consult_date);

      foreach ($doctor->specs as $spec) 
      {
        if($spec['id_speciality'] == 2)
        {
            $flag_spec = true;
            break;
        }
      }

      if($flag_spec == true)
      {
        $month = Carbon::createFromFormat('d/m/Y', $request->consult_date);

        $dates_count = Dates::where('pacient_id', '=', $pacient->id_pacient)
        ->where('doctor_id', '=', $doctor->id_doctor)
        ->whereMonth('date_consult', '=', $month->month)
        ->count();

        if($dates_count > 0)
        {
          Flash::error('No Puede haber mas de una cita por mes con el Ortodoncista');
          return $this->create($pacient->id_pacient);
        }
        else
          $date->save();
      }
      else
        $date->save();

      Flash::success('Cita Creada Exitosamente:');

      return $this->index();
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
        $date = Dates::find($id);

        $doctors = Doctor::all();


        $doctor_array = array();

        foreach ($doctors as $doctor ) {
          $doctor_array[$doctor->id_doctor] = $doctor->name;
        }

        $data = [
          'doctors' => $doctor_array,
          'date' => $date
        ];

        return view('admin.dates.edit', $data);
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
        $messages = [
            'doctor.required' => 'Debe seleccionar un Doctor',
            'consult_date.required'  => 'No Puede dejar vacia la fecha',
        ];

        $rules = [
            'doctor' => 'required',
            'consult_date' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails())
          return redirect()->back()->withErrors($validator->errors);
        else
        {
          $doctor = Doctor::find($request->doctor);
          $date = Dates::find($id);
          $date->date_consult = Carbon::createFromFormat('d/m/Y', $request->consult_date);
          $flag_spec = false;

          foreach ($doctor->specs as $spec) 
          {
            if($spec['id_speciality'] == 2)
            {
                $flag_spec = true;
                break;
            }
          }

          if($flag_spec == true)
          {
            $month = Carbon::createFromFormat('d/m/Y', $request->consult_date);

            $dates_count = Dates::where('pacient_id', '=', $pacient->id_pacient)
            ->where('doctor_id', '=', $doctor->id_doctor)
            ->whereMonth('date_consult', '=', $month->month)
            ->count();

            if($dates_count > 0)
            {
              Flash::error('No Puede haber mas de una cita por mes con el Ortodoncista');
              return $this->create($pacient->id_pacient);
            }
            else
              $date->save();
          }
          $date->save();

          Flash::success('Se han actualizado correctamente los datos');
          return $this->index();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $date = Dates::find($id);

        $date->delete();

        Flash::error('La Cita se ha eliminado correctamente');

        return $this->index();
    }
}
