<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
        ];
    }

    protected function validate(?Employee $employee = null): array
    {
        $employee ??= new Employee();
        return request()->validate([
            'company_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required',
                'regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/',
                Rule::unique('employees', 'email')->ignore($employee)
            ],
            'phone_number' => 'required'

        ]);
    }

    public function messages()
    {
        return [
            'company_id.required' => 'A companies is required',
            'first_name.required' => 'A first name is required',
            'last_name.required' => 'A last name is required',
            'email.required' => 'An email is required',
            'phone_number.required' => 'required',
        ];
    }
}
