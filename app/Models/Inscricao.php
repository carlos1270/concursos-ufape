<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'titulacao',
        'cotista',
        'users_id',
        'concursos_id',
        'vagas_id'
    ];

    public function inscricao()
    {
        return $this->belongsTo(Concurso::class, 'concurso_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vagas()
    {
        return $this->belongsTo(OpcoesVagas::class, 'vagas_id');
    }
}
