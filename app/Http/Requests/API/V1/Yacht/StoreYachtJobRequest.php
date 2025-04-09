<?php

namespace App\Http\Requests\API\V1\Yacht;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreYachtJobRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
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
            'job_title'            => 'required|string|max:255',
            'job_category'         => 'required|string|max:255',
            'location'             => 'required|string|max:255',
            'employment_type'      => 'required|in:rotational,permanent,temporary,day_work',
            'application_deadline' => 'required|date',
            'number_of_openings'   => 'required|integer',
            'start_date'           => 'required|date|after_or_equal:today',
            'end_date'             => 'required|date|after_or_equal:start_date',
            'rate_amount_from'     => 'required|numeric',
            'rate_amount_to'       => 'required|numeric',
            'job_description'      => 'required|string',
            'status'               => 'sometimes|in:active,inactive',
        ];
    }
}
