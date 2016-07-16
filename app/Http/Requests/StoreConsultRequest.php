<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreConsultRequest extends Request
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
            'doctor' => 'required',
            'consult_date' => 'required',
            'description' => 'required',
            'amount' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'consult_date.required' => 'Debe Colocar la fecha de la consulta',
            'description.required' => 'Debe colocar el procedimiento realizado',
            'amount.required' => 'Debe Colocar un monto',
            'amount.numeric' => 'El monto debe ser numerico',
            'doctor.required' => 'Debe seleccionar un Doctor',
        ];
    }
}
