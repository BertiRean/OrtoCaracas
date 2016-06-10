<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Doctor;
use App\Speciality;
use App\Phone;
use App\Doctor_Speciality;
use App\Contact;
use App\Http\Requests\StoreDoctorRequest;


class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::where('status', 1)->paginate(10);

        $data = [
          'title_table' => 'Listado de Doctores',
          'button_delete' => 'Eliminar Doctor',
          'button_create' => 'Registrar Doctor',
          'model_labels' => array("Nombre", "Cedula", "Especialidad","Telefono 1", "Telefono 2", "Direccion", "Cuenta Bancaria", "Email" ,"Acciones"),
          'doctors' => $doctors,
          'icons' => ['fa fa-user-md' => 'Doctores']
        ];

        return view('admin.doctor.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $specs = Speciality::all();
        $specialities = array();
        foreach ($specs as $spec) 
        {
          $specialities[$spec->id_speciality] = $spec->name;
        }

        $data = [
          'specs' => $specialities,
          'icons' => ['fa fa-user-md' => 'Doctores', 'fa fa-plus-square-o' => 'Registro de Doctores']
        ];
        return view('admin.doctor.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        $doctor = new Doctor;
        $phone = new Phone;

        $doctor->name = $request->name;
        $doctor->ci = $request->ci;
        $doctor->bank_account = $request->bank_account;
        $doctor->status = 1;

        $contact = new Contact;

        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->save();

        $spec = Speciality::find($request->speciality);

        $doctor->contact_id = $contact->id_contact;
        $doctor->save();

        $doctor->specs()->attach($request->speciality, ['doctor_id' => $doctor->id_doctor]);

        $phone->phone_number = $request->phone;
        $phone->contact_id = $contact->id_contact;
        $phone->save();

        if(! is_null($request->phone2))
        {
          $phone2 = new Phone;
          $phone2->phone_number = $request->phone2;
          $phone2->contact_id = $contact->id_contact;
          $phone2->save();
        }

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
        $doctor = Doctor::findOrFail($id);
        return view('admin.pacient.show', $pacient);
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
        $doctor = Doctor::find($id);

        $doctor->status = 0;
        $doctor->bank_account = "";
        $doctor->save();

        return $this->index();    
      }
}
