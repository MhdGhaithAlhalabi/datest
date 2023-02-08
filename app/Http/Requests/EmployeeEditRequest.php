<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeEditRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|regex:/^[a-zA-Z]+$/',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/',
            'company_id' => 'required',
            'email' => 'email|unique:employees,email,'.$this->employee->id,
            'phone_number' => 'regex:/^[0-9]/|min:10|max:10'
        ];
    }
}
