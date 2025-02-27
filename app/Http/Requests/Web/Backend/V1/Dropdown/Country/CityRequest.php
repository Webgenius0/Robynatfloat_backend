<?php

namespace App\Http\Requests\Web\Backend\V1\Dropdown\Country;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'country_id' => 'required|string',
            'state_id' => 'required|string',
        ];
    }


     /**
     * Define custom validation messages for the email and password fields.
     *
     * @return array The custom error messages for the validation rules.
     */

    public function messages(): array
    {
        return [
            'name.required' => 'Name field is required.',
            'name.string' => 'Please provide a valid string.',
            'country_id.required' => 'Country field is required.',
            'country_id.string' => 'Please provide a valid country ID.',
            'state_id.required' => 'State field is required.',
           'state_id.string' => 'Please provide a valid state ID.',
        ];
    }
}
