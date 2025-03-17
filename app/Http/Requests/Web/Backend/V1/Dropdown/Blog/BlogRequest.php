<?php

namespace App\Http\Requests\Web\Backend\V1\Dropdown\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'blog_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

     /**
     * Define custom validation messages for the title and content fields.
     *
     * @return array The custom error messages for the validation rules.
     */
    public function messages(): array
    {
        return [
            'content.required' => 'Content field is required.',
            'content.string' => 'Please provide a valid string.',
            'title.required' => 'Title field is required.',
            'title.string' => 'Please provide a valid string.'
        ];
    }
}
