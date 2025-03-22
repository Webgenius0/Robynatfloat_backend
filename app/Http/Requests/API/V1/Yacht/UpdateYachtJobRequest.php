<?php

namespace App\Http\Requests\Api\V1\Yacht;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateYachtJobRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return $this->user() && $this->user()->role->slug === 'yacht';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'job_title'            => 'sometimes|required|string|max:255',
            'job_category'         => 'sometimes|required|string|max:255',
            'location'             => 'sometimes|required|string|max:255',
            'employment_type'      => 'sometimes|required|in:rotational,permanent,temporary,day_work',
            'application_deadline' => 'sometimes|required|date',
            'number_of_openings'   => 'sometimes|required|integer',
            'start_date'           => 'sometimes|required|date',
            'end_date'             => 'sometimes|required|date',
            'rate_amount_from'     => 'sometimes|required|numeric',
            'rate_amount_to'       => 'sometimes|required|numeric',
            'job_description'      => 'sometimes|required|string',
            'status'               => 'sometimes|in:active,inactive',
        ];
    }
}
