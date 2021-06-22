<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concurso;
use Illuminate\Support\Facades\DB;

class OpcoesVagas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'concursos_id',
    ];

    public function concurso()
    {
        return $this->belongsTo(Concurso::class, 'concurso_id');
    }

    public function inscricoes()
    {
        return $this->hasMany(Inscricao::class, 'vagas_id');
    }

    public static function criarOpcoesVagas(Concurso $concurso, $opcoes_vaga)
    {
        foreach ($opcoes_vaga as $op_vaga) {
            $vaga = new OpcoesVagas();
            $vaga->nome = $op_vaga;
            $vaga->concursos_id = $concurso->id;
            $vaga->save();
        }
    }

    public static function deletarOpcoesVagas(Concurso $concurso)
    {
        DB::table('opcoes_vagas')->where('concursos_id', $concurso->id)->delete();
    }
}
