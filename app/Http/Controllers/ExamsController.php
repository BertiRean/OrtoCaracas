<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreExamRequest;
use App\Exam;
use App\Department;
use App\Pacient;
use Carbon\Carbon;
use App\Earnings;
use Laracasts\Flash\Flash;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $exams = Exam::paginate(10);

        $data = [
          'title_table' => 'Listado de todos los Estudios',
          'button_delete' => 'Eliminar Examen',
          'button_create' => 'Crear Examen',
          'model_labels' => ['Paciente', 'Cedula', 'Fecha del Estudio', 'Descripcion', 'Costo', 'Tomado por:' ,'Acciones'],
          'exams' => $exams,
          'model_create' => 'admin.exams.create',
          'icons' => ['fa fa-file-o' => 'Examenes']
        ];

        return view('admin.exams.index', $data);
    }

    public function index_by_type($type)
    {
      if(is_null($type))
        return $this->index();

      $exams = Exam::where('department_id', $type)->paginate(10);
      $department = Department::find($type);

      $data = [
        'title_table' => 'Listado de Estudios realizados en ' . $department->name,
        'button_delete' => 'Eliminar Examen',
        'button_create' => 'Crear Examen',
        'model_labels' => ['Paciente', 'Cedula', 'Fecha del Estudio', 'Descripcion', 'Costo', 'Tomado por:' ,'Acciones'],
        'exams' => $exams,
        'model_create' => 'admin.exams.create',
        'icons' => ['fa fa-file-o' => 'Examenes'],
        'department' => $type,
      ];

      return view('admin.exams.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $spec_id)
    {
        $pacient = Pacient::find($id);
        $department = Department::find($spec_id);

        $data = [
          'pacient' => $pacient,
          'department' => $department,
          'icons' => ['fa fa-file-o' => 'Examenes', 'fa fa-plus-square-o' => 'Registro de Examenes']
        ];

        return view('admin.exams.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamRequest $request)
    {
        $exam = new Exam;
        $pacient = Pacient::find($request->pacient_id);


        $exam->description = $request->description;
        $exam->pacient_id = $request->pacient_id;
        $exam->date_exam = Carbon::createFromFormat('d/m/Y', $request->date_exam);
        $exam->personal = $request->taked_by;
        $exam->amount = $request->amount;
        $exam->department_id = $request->department_id;

        $exam->save();

        $actual_date = Carbon::createFromFormat('d/m/Y', $request->date_exam);

        $query_result = Earnings::where('department_id', '=', $exam->department_id)
                        ->whereDay('date', '=', $actual_date->day)
                        ->whereMonth('date', '=', $actual_date->month)
                        ->whereYear('date', '=', $actual_date->year);
                      

        if($query_result->count() < 1)
        {
          $earning = new Earnings;

          $earning->date = Carbon::createFromFormat('d/m/Y', $request->date_exam);
          $earning->mount = $earning->mount + $exam->amount;
          $earning->department_id = $exam->department_id;

          $earning->save();
        }
        else if ($query_result->count() == 1)
        {
          $earning = Earnings::find($query_result->get()[0]['id_earning']);

          $earning->mount = $earning->mount + $exam->amount;

          $earning->save();
        }

        Flash::success('Se ha creado con exito el examen del paciente ' . $pacient->name);
        return $this->index_by_type($request->department_id);
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
        $exam = Exam::find($id);

        $actual_date = Carbon::createFromFormat('d/m/Y', $exam->date_exam->format('d/m/Y'));

        $query_result = Earnings::where('department_id', '=', $exam->department_id)
                        ->whereMonth('date', '=', $actual_date->month)
                        ->whereYear('date', '=', $actual_date->year);

        if($query_result->count() == 1)
        {
          $earning = Earnings::find($query_result->get()[0]['id_earning']);

          $earning->mount = $earning->mount - $exam->amount;

          if($earning->mount <= 0)
          {
            $earning->delete();
          }
          else
          {
            $earning->save();
          }
        }

        $exam->delete();

        Flash::error('Se Ha eliminado el examen del registro');

        return $this->index_by_type($exam->department_id);
    }
}
