<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreDoctorRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'ci' => 'required|unique:pacients',
            'bank_account' => 'required|unique:doctors|max:20',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'speciality' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El Nombre no puede dejarse en blanco',
            'ci.required'  => 'La cedula no puede dejarse en blanco',
            'phone.required' => 'Debe al menos colocar 1 telefono',
            'email.required' => 'Es obligatorio una direccion de email',
            'address.required' => 'La Direccion no puede dejarse en blanco',
            'ci.unique' => 'El Doctor ya se encuentra registrado en la base de datos',
            'speciality.required' => 'Debe Seleccionar al menos una specialidad',
            'bank_account.required' => 'Debe colocar la cuenta bancaria del doctor',
            'bank_account.max' => 'La Cuenta no debe tener mas de 20 numeros',
            'bank_account.unique' => 'La Cuenta Bancaria ya se encuentra asociada a un doctor'
        ];
    }
}
