<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    public const SEXO_ENUM = ["Masculino", "Feminino", "Outros"];

    protected $fillable = [
        'cpf',
        'celular',
        'telefone',
        'documento_de_identificacao',
        'data_de_nascimento',
        'orgao_emissor',
        'nome_da_mae',
        'nome_do_pai',
        'estrangeiro',
        'users_id',
    ];
}
