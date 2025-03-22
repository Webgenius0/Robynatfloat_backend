<?php

namespace App\Http\Requests\API\V1\Service;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
           'product_name' => 'required|string',
           'about' => 'nullable|string',
           'price'=>'required|numeric',
           'quantity'=>'required|numeric',
           'discount'=>'required|numeric',
           'service_images'=> 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        // dd($this->input('product_name'));
        return [

            'product_name.required' => 'Product Name is required.',
            'product_name.string' => 'Please provide a valid product name.',
            'about.string' => 'Please provide a valid about description.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Please provide a valid price.',
            'quantity.required' => 'Quantity is required.',
            'quantity.numeric' => 'Please provide a valid quantity.',
            'discount.required' => 'Discount is required.',
            'discount.numeric' => 'Please provide a valid discount.',
           'service_images.image' => 'The service image must be an image.',
        ];
    }
}
