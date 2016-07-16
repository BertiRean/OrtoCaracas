<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreExamRequest extends Request
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
            //
            'date_exam' => 'required',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'taked_by' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'date_exam.required' => 'Debe Colocar la fecha del estudio',
            'description.required' => 'La descripcion no puede estar vacia',
            'amount.required' => 'Debe Colocar un monto',
            'amount.numeric' => 'El monto debe ser numerico',
            'taked_by.required' => 'Debe Ingresar el nombre del personal que tomo el estudio',
        ];
    }
}
