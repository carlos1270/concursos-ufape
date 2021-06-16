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
        return $this->hasOne(Concurso::class, 'concurso_id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function vagas()
    {
        return $this->hasMany(OpcoesVagas::class, 'vagas_id');
    }
}
