<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pacient;
use App\Contact;
use App\Phone;
use App\Http\Requests\StorePacientRequest;
use Laracasts\Flash\Flash;
use Carbon\Carbon;

class PacientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacients = Pacient::where('status', 1)->paginate(10);

        $data = [
          'title_table' => 'Listado de Pacientes',
          'button_delete' => 'Eliminar Paciente',
          'button_create' => 'Crear Paciente',
          'model_labels' => array("Nombre", "Cedula", "Telefono 1", "Telefono 2", "Direccion", "Sexo", "Email", "Fecha de Nacimiento" ,"Cumpleaños", 'Acciones'),
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
        
        $pacient = new Pacient;
        $contact = new Contact;
        $phone = new Phone;
        $phone2 = new Phone;



        $pacient->name = $request->name;
        $pacient->ci = $request->ci;
        $pacient->sex = $request->sex;

        $pacient->birth_date = Carbon::createFromFormat('d/m/Y', $request->birth_date);
        $pacient->status = 1;

        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->save();

        $phone->phone_number = $request->phone;
        $phone->contact_id = $contact->id_contact;
        $phone->save();
        
        if (!is_null($request->phone2)) 
        {
            $phone2->phone_number = $request->phone2;
            $phone2->contact_id = $contact->id_contact;
            $phone2->save();
        }

        $pacient->contact_id = $contact->id_contact;

        $pacient->save();

        $data = [
          'title_table' => 'Listado de Pacientes',
          'button_delete' => 'Eliminar Paciente',
          'button_create' => 'Crear Paciente',
          'model_labels' => array("Nombre", "Cedula", "Telefono 1", "Telefono 2", "Direccion", "Sexo", "Email", "Fecha de Nacimiento" ,"Acciones"),

          'pacients' => Pacient::where('status', 1)->paginate(10),
          'icons' => ['fa fa-user' => 'Pacientes']
        ];

        Flash::success('Registro Exitoso del Paciente: '. $pacient->name);

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
        $pacient = Pacient::findOrFail($id);
        return view('admin.pacient.show', $pacient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pacient = Pacient::findOrFail($id);

        return view('admin.pacient.show', ['pacient' => $pacient]);
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
        $pacient = Pacient::find($id);
        $phones = Phone::where('contact_id', $pacient->contact_id)->get();
        $contact = Contact::find($pacient->contact_id);

        $contact->email = $request->email;
        $contact->address = $request->address;

        $pacient->name = $request->name;
        $pacient->ci = $request->ci;
        $pacient->sex = $request->sex;

        $phones[0]["phone_number"] = $request->phone1;
        $phones[1]["phone_number"] = $request->phone2;

        foreach ($phones as $phone) {
          $phone->save();
        }

        $pacient->save();
        $contact->save();

        $data = [
          'icons' => ['fa fa-user' => 'Pacientes', 'fa fa-plus-square-o' => 'Editar Paciente'],
          'pacient' => $pacient,
        ];

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
        $pacient = Pacient::find($id);

        $pacient->status = 0;
        $pacient->save();

        $pacients = Pacient::where('status', 1)->paginate(10);

        $data = [
          'title_table' => 'Listado de Pacientes',
          'button_delete' => 'Eliminar Paciente',
          'button_create' => 'Crear Paciente',
          'model_labels' => array("Nombre", "Cedula", "Telefono 1", "Telefono 2", "Direccion", "Sexo", "Email", "Fecha de Nacimiento" ,"Acciones"),

          'pacients' => $pacients,
          'icons' => ['fa fa-user' => 'Pacientes']
        ];

        Flash::error("Se ha eliminado el paciente: " . $pacient->name);

        return $this->index();
    }
}
