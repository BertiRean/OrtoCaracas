<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Consult;
use App\Pacient;
use App\Doctor;
use App\Http\Requests\StoreConsultRequest;
use Carbon\Carbon;
use App\Earnings;
use Laracasts\Flash\Flash;
use Validator;

class ConsultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consults = Consult::paginate(20);

        $data = [
          'title_table' => 'Listado de todas los Consultas',
          'button_delete' => 'Eliminar Consulta',
          'button_create' => 'Crear Consulta',
          'model_labels' => ['Doctor', 'Paciente', 'Cedula', 'Fecha', 'Observaciones', 'Costo', 'Acciones'],
          'consults' => $consults,
          'model_create' => 'admin.exams.create',
          'icons' => ['fa fa-file-o' => 'Examenes']
        ];

        return view('admin.consult.index', $data);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $pacient = Pacient::find($id);
        $doctors = Doctor::all();


        $doctor_array = array();

        foreach ($doctors as $doctor ) 
        {
          $doctor_array[$doctor->id_doctor] = $doctor->name . " - " . $doctor->specs[0]['name'];
        }

        $data = [
          'doctors' => $doctor_array,
          'pacient' => $pacient,
          'icons' => ['fa fa-user-md' => 'Citas', 'fa fa-plus-square-o' => 'Registro de Citas']
        ];

        return view('admin.consult.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConsultRequest $request)
    {
        //
        $consult  = new Consult;

        $pacient = Pacient::find($request->pacient_id);
        $doctor  = Doctor::find($request->doctor);

        $consult->doctor_id = $request->doctor;
        $consult->pacient_id = $request->pacient_id;
        $consult->description = $request->description;
        $consult->observations = $request->observations;
        $consult->amount = $request->amount;
        $consult->date_consult = Carbon::createFromFormat('d/m/Y', $request->consult_date);

        $consult->save();

        $actual_date = Carbon::createFromFormat('d/m/Y', $request->consult_date);

        $query_result = Earnings::where('doctor_id', '=', $request->doctor)
                        ->whereDay('date', '=', $actual_date->day)
                        ->whereMonth('date', '=', $actual_date->month)
                        ->whereYear('date', '=', $actual_date->year);
                      

        if($query_result->count() < 1)
        {
          $earning = new Earnings;

          $earning->date = Carbon::createFromFormat('d/m/Y', $request->consult_date);
          $earning->mount = $earning->mount + $consult->amount;
          $earning->doctor_id = $consult->doctor_id;

          $earning->save();
        }
        else if ($query_result->count() == 1)
        {
          $earning = Earnings::find($query_result->get()[0]['id_earning']);

          $earning->mount = $earning->mount + $consult->amount;

          $earning->save();
        }

        Flash::success('Se ha creado con exito la consulta del paciente ' . $pacient->name);
        
        return $this->index();
        //return $this->index_by_type($consult->doctor_id);
    }

    public function view_pacient($id)
    {
        $pacient = Pacient::find($id);
        $consults = Consult::where('pacient_id', '=', $id)->paginate(10);

        $data = [
          'title_table' => 'Consultas del Paciente' . ' ' . $pacient->name,
          'model_labels' => ['Doctor', 'Cedula', 'Fecha', 'Abono', 'Procedimiento Realizado', 'Observaciones'],
          'consults' => $consults,
          'icons' => ['fa fa-file-o' => 'Examenes']
        ];

        return view('admin.consult.view_pacient', $data);
    }

    public function view_doctor($id)
    {
        $doctor = Doctor::find($id);
        $consults = Consult::where('doctor_id', '=', $id)
                           ->whereDay('date_consult', '=', Carbon::now()->day)
                           ->paginate(10);

        $data = [
          'title_table' => 'Doctor:' . ' ' . $doctor->name . ' - ' . $doctor->specs[0]['name'],
          'model_labels' => ['Fecha', 'Monto', 'Paciente', 'Cedula', 'Observaciones'],
          'consults' => $consults,
          'icons' => ['fa fa-user-md' => 'Consultas del Doctor']
        ];

        return view('admin.consult.view_doctor', $data);
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
        $consult = Consult::find($id);

        $doctors = Doctor::all();


        $doctor_array = array();

        foreach ($doctors as $doctor )
        {
          $doctor_array[$doctor->id_doctor] = $doctor->name;
        }

        return view('admin.consult.show', ['consult' => $consult, 'doctors' => $doctor_array]);
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
        $consult = Consult::findOrFail($id);
        $rules = [
            'doctor' => 'required',
            'consult_date' => 'required',
            'description' => 'required',
            'amount' => 'required',
        ];

        $messages = [
            'consult_date.required' => 'Debe Colocar la fecha de la consulta',
            'description.required' => 'Debe colocar el procedimiento realizado',
            'amount.required' => 'Debe Colocar un monto',
            'amount.numeric' => 'El monto debe ser numerico',
            'doctor.required' => 'Debe seleccionar un Doctor',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors());
        }
        else
        {
            $before_amount = $consult->amount;

            $consult->description = $request->description;
            $consult->observations = $request->observations;
            $consult->amount = $request->amount;
            $consult->date_consult = Carbon::createFromFormat('d/m/Y', $request->consult_date);

            $consult->save();

            $actual_date = Carbon::createFromFormat('d/m/Y', $request->consult_date);

            $query_result = Earnings::where('doctor_id', '=', $request->doctor)
                            ->whereDay('date', '=', $actual_date->day)
                            ->whereMonth('date', '=', $actual_date->month)
                            ->whereYear('date', '=', $actual_date->year);
                          

            if($query_result->count() < 1)
            {
              $earning = new Earnings;

              $earning->date = Carbon::createFromFormat('d/m/Y', $request->consult_date);
              $earning->mount = $earning->mount + $consult->amount;
              $earning->doctor_id = $consult->doctor_id;

              $earning->save();
            }
            else if ($query_result->count() == 1)
            {
              $earning = Earnings::find($query_result->get()[0]['id_earning']);

              if($before_amount < $consult->amount)
              {
                $earning->mount += ($consult->amount - $before_amount);
              }
              else
              {
                $earning->mount -= ($before_amount - $consult->amount);
              }

              $earning->save();
            }
        }

        Flash::success('Datos Actualizados correctamente');
        return $this->index();
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
        $consult = Consult::find($id);


        $actual_date = Carbon::createFromFormat('d/m/Y', $consult->date_consult->format('d/m/Y'));

        $query_result = Earnings::where('doctor_id', '=', $consult->doctor_id)
                        ->whereDay('date', '=', $actual_date->day)
                        ->whereMonth('date', '=', $actual_date->month)
                        ->whereYear('date', '=', $actual_date->year);

        if($query_result->count() == 1)
        {
          $earning = Earnings::find($query_result->get()[0]['id_earning']);

          $earning->mount = $earning->mount - $consult->amount;

          if($earning->mount <= 0)
          {
            $earning->delete();
          }
          else
            $earning->save();
        }

        $consult->delete();

        Flash::error('La Consulta fue eliminada con exito');

        return $this->index();
    }
}
