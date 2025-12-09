<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // permite que qualquer usuário autenticado use
    }

    public function rules(): array
    {
        return [
            'parash'   => 'required|string|max:255',
            'diocese'  => 'required|string|max:255',
            'city'     => 'required|string|max:255',
            'state'    => 'required|string|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'parash.required'  => 'O nome da paróquia é obrigatório.',
            'diocese.required' => 'A diocese é obrigatória.',
            'city.required'    => 'A cidade é obrigatória.',
            'state.required'   => 'O estado é obrigatório.',
        ];
    }
}
