<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'diretorio_arquivo',
        'grupo_id',
        'inscricoes_id'
    ];

    public function inscricao()
    {
        return $this->belongsTo(Inscricao::class, 'inscricoes_id');
    }
}
