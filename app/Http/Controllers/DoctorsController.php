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
use Validator;
use DB;
use Laracasts\Flash\Flash;


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

    public function orto_general()
    {
        $dentits = DB::table('doctor_specs')
        ->where('spec_id', 1)
        ->get();


        $ids = array();

        foreach ($dentits as $doctor)
        {
            $ids[] = $doctor->doctor_id;
        }

        $doctors = Doctor::where('id_doctor', $ids)->paginate(10);

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

    public function specialits()
    {
        $dentits = DB::table('doctor_specs')
        ->where('spec_id', '!=' , 1)
        ->get();


        $ids = array();

        foreach ($dentits as $doctor)
        {
            $ids[] = $doctor->doctor_id;
        }

        $doctors = Doctor::where('id_doctor', $ids)->paginate(10);

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
        $doctor = Doctor::findOrFail($id);
        $specs = Speciality::all();
        $specialities = array();
        foreach ($specs as $spec) 
        {
          $specialities[$spec->id_speciality] = $spec->name;
        }

        return view('admin.doctor.edit', ['doctor' => $doctor, 'specialities' => $specialities]);
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
      $doctor = Doctor::findOrFail($id);

      $rules = [
            'name' => 'required',
            'ci' => 'required|unique:doctors,ci,'.$doctor->id_doctor . ',id_doctor',
            'bank_account' => 'required|unique:doctors,bank_account,'.$doctor->id_doctor . ',id_doctor',
            'email' => 'required',
            'phone1' => 'required',
            'address' => 'required',
        ];

     $messages =[
            'name.required' => 'El Nombre no puede dejarse en blanco',
            'ci.required'  => 'La cedula no puede dejarse en blanco',
            'phone1.required' => 'Debe al menos colocar 1 telefono',
            'email.required' => 'Es obligatorio una direccion de email',
            'address.required' => 'La Direccion no puede dejarse en blanco',
            'ci.unique' => 'El Doctor ya se encuentra registrado en la base de datos',
            'speciality.required' => 'Debe Seleccionar al menos una specialidad',
            'bank_account.required' => 'Debe colocar la cuenta bancaria del doctor',
            'bank_account.max' => 'La Cuenta no debe tener mas de 20 numeros',
            'bank_account.unique' => 'La Cuenta Bancaria ya se encuentra asociada a un doctor'
        ];

      $validator = Validator::make($request->all(), $rules, $messages);

      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator->errors());
      }
      else
      {
        $doctor->name = $request->name;
        $doctor->ci = $request->ci;
        $doctor->bank_account = $request->bank_account;
        $doctor->save();

        $phones = $doctor->phones;

        $phones[0]["phone_number"] = $request->phone1;

        if(!is_null($request->phone2))
        {
          $phone[1]["phone_number"] = $request->phone2;
        }

        foreach ($phones as $phone)
          $phone->save();

        $contact = $doctor->contact;
        $contact["email"] = $request->email;
        $contact["address"] = $request->address;
        $contact->save();


        $specs = $doctor->specs;

        Db::table('doctor_specs')->where('doctor_id', $doctor->id_doctor)->update(['spec_id' => $request->speciality1]);

        Flash::success('Se han actualizado correctamente los datos del Doctor: '. $doctor->name);

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
        $doctor = Doctor::find($id);

        $doctor->status = 0;
        $doctor->bank_account = "";
        $doctor->save();

        Flash::error('Se ha eliminado a el Doctor: '. $doctor->name);

        return $this->index();    
      }
}
