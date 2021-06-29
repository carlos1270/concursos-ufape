<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    public const SEXO_ENUM = ["Masculino", "Feminino", "Outros"];

    public static $rules = [
        'cpf' => 'required|numeric|min:0|digits_between:10,11|unique:candidatos',
        'celular' => 'required|integer|digits:11',
        'rg' => 'numeric|min:0|digits_between:7,11|unique:candidatos',
        'data_nascimento' => 'date',
        'pis' => 'numeric|min:0|digits:11|unique:candidatos',
        'sexo' => 'in:masculino,feminino,outros',
        'nome_mae' => 'string|min:5|max:100',
    ];

    public static $messages = [
        'cpf.required' => 'O CPF é um campo obrigatório.',
        'cpf.numeric' => 'O CPF deve conter apenas números.',
        'cpf.min' => 'O CPF não pode ser um número negativo.',
        'cpf.digits_between' => 'O CPF deve ter entre 10 e 11 dígitos.',
        'cpf.unique' => 'O CPF já está cadastrado',
        'celular.required' => 'O número de celular é um campo obrigatório.',
        'celular.integer' => 'O número de celular deve conter apenas números.',
        'celular.min' => 'O número de celular não pode ser um número negativo.',
        'celular.digits' => 'O número de celular deve ter 11 dígitos.',
        'rg.numeric' => 'O RG deve conter apenas números.',
        'rg.min' => 'O RG não pode ser um número negativo.',
        'rg.digits_between' => 'O RG deve ter entre 7 à 11 dígitos.',
        'rg.unique' => 'O RG já está cadastrado',
        'data_nascimento.date' => 'A data de nascimento deve ser no formato de data.',
        'pis.numeric' => 'O PIS deve conter apenas números.',
        'pis.min' => 'O PIS não pode ser um número negativo.',
        'pis.digits' => 'O PIS deve ter 11 dígitos.',
        'pis.unique' => 'O PIS já está cadastrado',
        'sexo.*' => 'Tipo de sexo inválido',
        'nome_mae.min' => 'O nome da mãe deve ter no mínimo 5 caracteres.',
        'nome_mae.max' => 'O nome da mãe deve ter no máximo 100 caracteres.'
    ];

    protected $fillable = [
        'cpf',
        'celular',
        'telefone',
        'documento_de_identificacao',
        'data_de_nascimento',
        'orgao_emissor',
        'nome_mae',
        'nome_do_pai',
        'estrangeiro',
        'users_id',
    ];
}
