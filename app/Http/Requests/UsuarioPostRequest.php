<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioPostRequest extends FormRequest
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
            'nome' => ['required', 'max:255'],
            'email' => [
                'required',
                'max:255',
                'email',
                'unique:App\Models\Usuario\Usuario,email',
                Rule::unique('usuario')->ignore($this->usuario),
            ],
            'telefone' => ['required', 'max:255'],
            'cpf' => [
                'required',
                'max:255',
                'unique:App\Models\Usuario\Usuario,cpf',
                Rule::unique('usuario')->ignore($this->usuario),
            ],
            'data_nascimento' => ['required'],
            'numero' => ['required', 'integer'],
            'rua' => ['required', 'max:255'],
            'bairro' => ['required', 'max:255'],
            'cep' => ['required', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome é obrigatório',
            'email.required' => 'Email é obrigatório',
            'telefone.required' => 'Telefone é obrigatório',
            'cpf.required' => 'CPF é obrigatório',
            'data_nascimento.required' => 'data de nascimento é obrigatório',
            'numero.required' => 'numero é obrigatório',
            'rua.required' => 'Rua é obrigatório',
            'bairro.required' => 'Bairro é obrigatório',
            'cep.required' => 'Cep é obrigatório',
            'email.email' => 'Email precisa ser válido',
            'email.unique' => 'Email já cadastrado',
            'numero.integer' => 'Numero precisa ser um número inteiro',
            'cpf.unique' => 'Cpf já cadastrado',
        ];
    }
}
