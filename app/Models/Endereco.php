<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    public static $rules = [
        'cep' => 'numeric|min:0|digits:11',
        'rua' => 'string|min:5|max:100',
        'bairro' => 'string|min:5|max:100',
        'estado' => 'string|min:5|max:100',
    ];

    public static $messages = [
        'cep.numeric' => 'O CEP deve conter apenas números.',
        'cep.min' => 'O CEP não pode ser um número negativo.',
        'cep.digits' => 'O CEP deve ter 8 dígitos.',
        'bairro.min' => 'O bairro deve ter no mínimo 5 caracteres.',
        'bairro.max' => 'O bairro deve ter no máximo 100 caracteres.',
        'estado.min' => 'O estado deve ter no mínimo 5 caracteres.',
        'estado.max' => 'O estado deve ter no máximo 100 caracteres.',
    ];

    protected $fillable = [
        'cep',
        'rua',
        'bairro',
        'cidade',
        'estado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
