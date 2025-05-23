<?php

namespace App\Http\Requests\API\V1\Payment;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'type' => 'required|in:plan,order',
            'id' => 'required|integer',
            'amount' => 'required|integer',
            'connected_account_id' => 'nullable|string',
        ];
    }
}
