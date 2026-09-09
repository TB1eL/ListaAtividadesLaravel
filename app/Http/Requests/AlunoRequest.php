<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize() { return true; }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules() {
        return [
            'nome' => 'required|min:3',
        ];
    }

    public function messages() {
        return [
            'nome.required' => 'O campo nome é obrigatório!',
            'nome.min' => 'O nome deve ter no mínimo 3 caracteres.'
        ];
    }
}
