<?php

namespace App\Http\Requests\API\V1\Freelancer;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreJobApplicationRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return (bool) $this->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
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
