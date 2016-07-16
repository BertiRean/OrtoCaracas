<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Expense;
use Carbon\Carbon;
use App\Http\Requests\StoreExpenseRequest;
use Laracasts\Flash\Flash;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $actual_date = Carbon::now();
        $expenses = Expense::paginate(12);

        $anual_mount = 0;

        foreach ($expenses as $expense)
        {
            if($actual_date->month == $expense->date->format('m'))
                $anual_mount += $expense->amount;
        }

        $data = [
          'title_table' => 'Listado de Egresos',
          'model_labels' => ['Nombre', '# Factura', 'Monto', 'Fecha', 'Acciones'],
          'expenses' => $expenses,
          'button_create' => 'Registrar Egreso',
          'anual_mount' => $anual_mount,
          'icons' => ['fa fa-file-o' => 'Egresos']
        ];

        return view('admin.expenses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
          'icons' => ['fa fa-user' => 'Egresos', 'fa fa-plus-square-o' => 'Registro de Egresos']
        ];
        return view('admin.expenses.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenseRequest $request)
    {
        //
        $expense = new Expense;

        $expense->description = $request->description;
        $expense->bill_number = $request->bill_number;
        $expense->date = Carbon::createFromFormat('d/m/Y', $request->date_expense);
        $expense->amount = $request->amount;

        $expense->save();

        Flash::success('Se ha creado correctamente el egreso');

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
        $expense = Expense::find($id);

        $expense->delete();

        Flash::error('Egreso eliminado correctamente');

        return $this->index();
    }
}
