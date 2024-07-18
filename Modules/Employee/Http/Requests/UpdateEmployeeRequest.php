<?php

namespace Modules\Employee\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'companies_id' => ['required'],
            'email' => ['required', 'email', 'max:100'],
            'phone' => ['required', 'regex:/^05\d{8}$/'],
            // 'phone' => ['required', 'numeric', 'digits:10', 'starts_with:05'],
            'image' => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:3000'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
