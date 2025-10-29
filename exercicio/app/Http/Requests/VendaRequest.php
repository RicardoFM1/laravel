<?php

namespace App\Http\Requests;

use App\Rules\CpfValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class VendaRequest extends FormRequest
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
            "ingresso_id" => [
                "required"
            ],
            "valor" => [
                "required",
                "numeric",
                "gt:0"
            ],
            "evento_id" => [
                "required"
            ],
            "cpf" => [
                "required",
                new CpfValidationRule
            ]
        ];
    }
    public function messages()
    {
        return [
            'cpf.required' => "O campo cpf deve ser preenchido",
            'ingresso_id.required' => "A referência do ingresso deve ser informada",
            'evento_id.required' => "A referência do evento deve ser informada",
            "valor.required" => "O valor deve ser informado",
            'cpf.min' => "O cpf deve conter no mínimo 11 caractéres",
            'valor.gt' => "O valor não pode ser menor que 1"
        ];
    }
}
