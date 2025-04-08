<?php

namespace App\Http\Requests\API\V1\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class ProductSupplierRequest extends FormRequest
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
            'product_name' => 'sometimes|required|string',  // 'sometimes' added for update
            'about' => 'nullable|string',
            'price' => 'sometimes|required|numeric',  // 'sometimes' added for update
            'quantity' => 'sometimes|required|numeric',  // 'sometimes' added for update
            'discount' => 'sometimes|required|numeric',  // 'sometimes' added for update
            'product_images' => 'sometimes|array',  // No need to be 'required' for update
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',  // Image validation for each image
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
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
            'product_images.image' => 'The product image must be a valid image.',
            'product_images.required' => 'Product images are required.',  // You can leave this nullable for update
        ];
    }
}
