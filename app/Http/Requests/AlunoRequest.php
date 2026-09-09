<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|min:3',
            'curso_id' => 'required|integer|exists:cursos,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.min' => 'O nome deve ter no mínimo 3 caracteres.',
            'curso_id.required' => 'O campo curso é obrigatório.',
            'curso_id.exists' => 'O curso informado não existe no banco de dados.',
        ];
    }
}