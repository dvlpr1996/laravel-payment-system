<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BasketCheckOutRequest extends FormRequest
{
    private array $allowGateway = ['saman', 'pasargad'];

    private array $allowPaymentMethod = ['online', 'cash', 'transfer'];

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'paymentMethod' => [
                'required',
                'string',
                Rule::in($this->allowPaymentMethod),
            ],
            'gateway' => [
                'required_if:paymentMethod,online',
                'string',
                Rule::in($this->allowGateway),
            ],
        ];
    }
}
