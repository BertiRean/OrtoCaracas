<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StorePacientRequest extends Request
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
            'sex' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
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
            'ci.unique' => 'El Paciente ya se encuentra registrado en la base de datos',
        ];
    }
}
