<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name'        => 'nullable|string|max:100',
            'last_name'         => 'nullable|string|max:100',
            'phone'             => 'nullable|string|max:20',
            'birth_date'        => 'nullable|string',
            'investiture_date'  => 'nullable|string',
            'user_id'           => 'required|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.string' => 'O primeiro nome precisa ser um texto válido.',
            'last_name.string'  => 'O segundo nome precisa ser um texto válido.',
            'birth_date.date'   => 'Informe uma data de nascimento válida.',
            'investiture_date.date' => 'Informe uma data de investidura válida.',
        ];
    }
}
