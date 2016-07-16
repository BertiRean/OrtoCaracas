<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Earnings;
use Carbon\Carbon;

class EarningsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $actual_date = new Carbon();
        $earnings = Earnings::whereDay('date', '=', $actual_date->day)->paginate(12);

        $anual_mount = array();

        foreach ($earnings as $earning) 
        {
            if(array_key_exists($earning->date->format('Y'), $anual_mount))
                $anual_mount[$earning->date->format('Y')] += $earning->mount;
            else
               $anual_mount[$earning->date->format('Y')] = $earning->mount;
        }

        $data = [
          'title_table' => 'Listado de Ingresos Diarios',
          'model_labels' => ['Dia', 'Monto Diario', 'Departamento o Doctor'],
          'earnings' => $earnings,
          'anual_mount' => $anual_mount,
          'icons' => ['fa fa-file-o' => 'Ingresos']
        ];

        return view('admin.earnings.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
