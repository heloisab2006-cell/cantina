<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
{
    //Perfis e Usuários
    public function authorize()
    {
        return true;
    }

    //Validaçao se as regras estão sendo compridas
    public function rules()
    {
        return [
            'nome' => 'required|string|min:5',
            'cpf' => ['required','regex:/^[0-9]{11}$/'],
            'setor' => 'required|exists:setores,id',
            'quarto' => 'required|exists:quartos,id',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.regex' => 'O CPF deve conter apenas números e exatamente 11 dígitos.',
            'setor.required' => 'Selecione um setor.',
            'quarto.required' => 'Selecione um quarto.',
        ];
    }
}

