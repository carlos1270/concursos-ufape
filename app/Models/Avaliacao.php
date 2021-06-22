<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'nota',
        'inscricoes_id'
    ];

    public function grupo()
    {
        return $this->belongsToMany(Grupo::class, 'inscricoes_avalicoes', 'avaliacao_id', 'grupo_id')->withPivot('nota');
    }
}
