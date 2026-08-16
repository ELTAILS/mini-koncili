<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TransferRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'order_code' => 'required|unique:transfers,order_code',
            'amount' => 'required|numeric|min:0',
            'transfer_date' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'O campo user_id é obrigatório.',
            'user_id.exists' => 'O user_id fornecido não existe.',
            'order_code.required' => 'O campo order_code é obrigatório.',
            'order_code.unique' => 'O order_code fornecido já existe.',
            'amount.required' => 'O campo amount é obrigatório.',
            'amount.numeric' => 'O campo amount deve ser um número.',
            'amount.min' => 'O campo amount deve ser maior ou igual a 0.',
            'transfer_date.required' => 'O campo transfer_date é obrigatório.',
            'transfer_date.date' => 'O campo transfer_date deve ser uma data válida.',
        ];
    }

}
