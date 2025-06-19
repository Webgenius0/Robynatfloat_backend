<?php

namespace App\Http\Requests\API\V1\Freelancer;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return $this->user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        $userId = $this->user() ? $this->user()->id : null;

        return [
            // User fields (users table)
            'first_name'             => 'sometimes|required|string|max:255',
            'last_name'              => 'sometimes|required|string|max:255',
            'email'                  => [
                'sometimes',
                'required',
                'email',
                Rule::unique('users')->ignore($userId),
            ],
            'location'               => 'sometimes|nullable|string|max:255',
            'phone_number'           => 'sometimes|nullable|string|max:50',
            'avatar'                 => 'sometimes|file|image|max:20480',
            'business_name'          => 'sometimes|nullable|string|max:255',
            'business_category'     => 'sometimes|nullable|string|max:255',
            'nationality'           => 'sometimes|nullable|string|max:255',
            'department'            => 'sometimes|nullable|string|max:255',
            'freelancer_name'         => 'sometimes|nullable|string|max:255',
            'freelancer_category'     => 'sometimes|nullable|string|max:255',
            'price_per_hour ' => 'sometimes|nullable|numeric|min:0',


            // Profile fields (profiles table)
            'about'                  => 'sometimes|nullable|string',
            'cv_url'                 => 'sometimes|file|mimes:pdf|max:20480',
            'facebook'               => 'sometimes|nullable|url',
            'instagram'              => 'sometimes|nullable|url',
            'youtube'                => 'sometimes|nullable|url',
            'linkedin'               => 'sometimes|nullable|url',
            'web'                    => 'sometimes|nullable|url',
            'yacht_length'           => 'sometimes|nullable|string|max:50',
            'yacht_year_build'       => 'sometimes|nullable|string|max:4',
            'yacht_location'         => 'sometimes|nullable|string|max:255',

            // Experiences – an array of experiences
            'experiences'            => 'sometimes|array',
            'experiences.*.position' => 'required_with:experiences|string|max:255',
            'experiences.*.company'  => 'required_with:experiences|string|max:255',
            'experiences.*.from'     => 'required_with:experiences|date',
            'experiences.*.to'       => 'required_with:experiences|date',
            'experiences.*.about'    => 'sometimes|nullable|string',

            // Many-to-many relations: certification, skills, languages (IDs)
            'certifications'         => 'sometimes|array',
            'certifications.*'       => 'nullable|string',

            'skills'                 => 'sometimes|array',
            'skills.*'               => 'nullable|string',

            'languages'              => 'sometimes|array',
            'languages.*'            => 'integer|exists:languages,id',
            //

        ];
    }
}
