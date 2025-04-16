<?php

namespace App\Http\Requests\API\V1\Yacht;

use Illuminate\Foundation\Http\FormRequest;

class YachtSupplierOrderRequest extends FormRequest
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
           'orders' => 'required|array|min:1',
            'orders.*.user_id' => 'required|exists:users,id',
            'orders.*.product_id' => 'required|exists:products,id',
            'orders.*.subtotal' => 'required|numeric|min:0',
            'orders.*.shipping' => 'required|numeric|min:0',
            'orders.*.tax' => 'required|numeric|min:0',
            'orders.*.total' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'orders.required' => 'At least one order is required.',
            'orders.array' => 'Orders must be in array format.',
            'orders.*.user_id.required' => 'User ID is required for each order.',
            'orders.*.user_id.exists' => 'User must exist.',
            'orders.*.product_id.required' => 'Product ID is required for each order.',
            'orders.*.product_id.exists' => 'Product must exist.',
            'orders.*.subtotal.required' => 'Subtotal is required.',
            'orders.*.subtotal.numeric' => 'Subtotal must be a number.',
            'orders.*.shipping.required' => 'Shipping cost is required.',
            'orders.*.shipping.numeric' => 'Shipping cost must be a number.',
            'orders.*.tax.required' => 'Tax is required.',
            'orders.*.tax.numeric' => 'Tax must be a number.',
            'orders.*.total.required' => 'Total amount is required.',
            'orders.*.total.numeric' => 'Total must be a number.',
        ];
    }
}
