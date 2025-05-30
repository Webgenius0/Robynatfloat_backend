<?php

namespace App\Http\Requests\API\V1\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class SupplierMyJobApplyRequest extends FormRequest
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
    public function rules(): array {
        return [
            'name'         => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email'        => 'required|email|max:255',
            'cv'           => 'required|file|mimes:pdf,doc,docx|max:20480',
        ];
    }
}
