<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name'
        ];
    }
}

/*
first_name, last_name	必須 / string / max:255
gender	必須 / integer / in:1,2,3
email	必須 / string / email / max:255
tel	必須 / string / regex:/^[0-9]{10,11}$/
address	必須 / string / max:255
building	nullable / string / max:255
category_id	必須 / integer / exists:categories,id
detail	必須 / string / max:120

*/