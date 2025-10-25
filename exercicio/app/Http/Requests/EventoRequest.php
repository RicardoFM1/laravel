<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventoRequest extends FormRequest
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
            'nome' => [
            'required'
        ], 
        "data_inicio" => [
             Rule::date()->format("Y-m-d"), 
             "required"
        ],
        "data_fim" => [
            Rule::date()->format("Y-m-d"), 
            "required", 
            "after:data_inicio"
        ]
        ];
    }
}
