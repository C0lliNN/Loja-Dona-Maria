<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class handleClientesRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'nome' => ['required', 'string'],
            'email' => ['required', 'email:rfc,dns'],
            'data_nascimento' => ['required', 'date'],
            'telefone' => ['required', 'string'],
            'cep' => ['required', 'string'],
            'endereco' => ['required', 'string'],
            'bairro' => ['required', 'string'],
            'ponto_referencia' => ['nullable', 'string']
        ];
    }
}
