<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreExpenseRequest extends Request
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
            'description' => 'required',
            'bill_number' => 'required',
            'date_expense' => 'required',
            'amount' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'Debe colocar una descripcion de la factura',
            'bill_number.required' => 'Debe colocar el número de factura',
            'amount.required' => 'Debe Colocar el monto cobrado de la factura',
            'date_expense.required' => 'Debe colocar la fecha de la factura',
        ];
    }
}
