<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    public static $rules = [
        'cep'    => 'required|numeric|min:0|digits:8',
        'rua'    => 'required|string|min:5|max:100',
        'bairro' => 'required|string|min:5|max:100',
        'cidade' => 'required|string|min:5|max:100',
        'estado' => 'required|string|min:5|max:100',
    ];

    public static $messages = [
        'cep.required'    => 'O CEP é um campo obrigatório',
        'cep.numeric'     => 'O CEP deve conter apenas números.',
        'cep.min'         => 'O CEP não pode ser um número negativo.',
        'cep.digits'      => 'O CEP deve ter 8 dígitos.',
        'bairro.required' => 'O bairro é um campo obrigatório',
        'bairro.min'      => 'O bairro deve ter no mínimo 5 caracteres.',
        'bairro.max'      => 'O bairro deve ter no máximo 100 caracteres.',
        'cidade.required' => 'A cidade é um campo obrigatório',
        'cidade.min'      => 'A cidade deve ter no mínimo 5 caracteres.',
        'cidade.max'      => 'A cidade deve ter no máximo 100 caracteres.',
        'estado.required' => 'O estado é um campo obrigatório',
        'estado.min'      => 'O estado deve ter no mínimo 5 caracteres.',
        'estado.max'      => 'O estado deve ter no máximo 100 caracteres.',
    ];

    protected $fillable = [
        'cep',
        'logradouro',
        'complemento',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'users_id'
    ];

    public function candidato()
    {
        return $this->hasOne(User::class, 'users_id');
    }
}
