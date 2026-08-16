<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'order_code' => 'required|string|max:100',
            'sale_date' => 'required|date',
            'gross_amount' => 'required|numeric|min:0',
            'commission_amount' => 'required|numeric|min:0',
            'fee_amount' => 'required|numeric|min:0'
        ];
    }

    public function messages(): array
    {
        return [
            'order_code.required' => 'O campo order_code é obrigatório.',
            'order_code.string' => 'O campo order_code deve ser uma string.',
            'order_code.max' => 'O campo order_code não pode ter mais de 100 caracteres.',
            'sale_date.required' => 'O campo sale_date é obrigatório.',
            'sale_date.date' => 'O campo sale_date deve ser uma data válida.',
            'gross_amount.required' => 'O campo gross_amount é obrigatório.',
            'gross_amount.numeric' => 'O campo gross_amount deve ser um número.',
            'gross_amount.min' => 'O campo gross_amount deve ser maior ou igual a 0.',
            'commission_amount.required' => 'O campo commission_amount é obrigatório.',
            'commission_amount.numeric' => 'O campo commission_amount deve ser um número.',
            'commission_amount.min' => 'O campo commission_amount deve ser maior ou igual a 0.',
            'fee_amount.required' => 'O campo fee_amount é obrigatório.',
            'fee_amount.numeric' => 'O campo fee_amount deve ser um número.',
            'fee_amount.min' => 'O campo fee_amount deve ser maior ou igual a 0.'
        ];
    }

}
