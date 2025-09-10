<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'company_name' => ['required', 'string', 'regex:/^[^@]/'],
            'contact_person' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'max:10'],
            'address' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'company_name.regex' => 'Company name cannot start with @',
            'phone.max' => 'Phone number cannot be longer than 10 digits',
        ];
    }
}