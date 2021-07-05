<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = 'avaliacoes';

    public static $rules = [
        'nota'       => 'required|min:0|max:100',
    ];

    public static $messages = [
        'nota.required'       => 'A pontuação total é obrigatória.',
        'nota.min'            => 'A pontuação total deve ser no mínimo 0.',
        'nota.max'            => 'A pontuação total deve ser no máximo 100.',
    ];

    protected $fillable = [
        'nota',
        'inscricoes_id'
    ];

    public function grupo()
    {
        return $this->belongsToMany(Grupo::class, 'inscricoes_avalicoes', 'avaliacao_id', 'grupo_id')->withPivot('nota');
    }
}
