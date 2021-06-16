<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'peso',
    ];

    public function avaliacao()
    {
        return $this->belongsToMany(Avaliacao::class, 'inscricoes_avalicoes', 'grupo_id', 'avaliacao_id')->withPivot('nota');
    }
}
