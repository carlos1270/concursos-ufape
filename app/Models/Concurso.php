<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreConcursoRequest;

class Concurso extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'qtd_vagas',
        'descricao',
        'data_inicio_inscricao',
        'data_fim_inscricao',
        'data_fim_isencao_inscricao',
        'data_fim_pagamento_inscricao',
        'data_inicio_envio_doc',
        'data_fim_envio_doc',
        'data_resultado_selecao',
        'modelos_documentos',
        'edital',
        'users_id'
    ];

    public function inscricoes()
    {
        return $this->hasMany(Inscricao::class, 'concursos_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function vagas()
    {
        return $this->hasMany(OpcoesVagas::class, 'concursos_id');
    }

    public function setAtributes(StoreConcursoRequest $request)
    {
        $this->titulo                           = $request->titulo;
        $this->qtd_vagas                        = $request->quantidade_vagas;
        $this->descricao                        = $request->descricao;
        $this->data_inicio_inscricao            = $request->data_inicio_inscricao;
        $this->data_fim_inscricao               = $request->data_fim_inscricao;
        $this->data_fim_isencao_inscricao       = $request->data_fim_isencao_inscricao;
        $this->data_fim_pagamento_inscricao     = $request->data_fim_pagamento_inscricao;
        $this->data_inicio_envio_doc            = $request->data_inicio_envio_doc;
        $this->data_fim_envio_doc               = $request->data_fim_envio_doc;
        $this->data_resultado_selecao           = $request->data_resultado_selecao;
        $this->users_id                         = auth()->user()->id;
    }

    public function salvarEdital($file)
    {
        if ($file != null) {
            $path = 'concursos/' . $this->id . '/';
            $nome = 'edital.pdf';
            Storage::putFileAs('public/' . $path, $file, $nome);
            $this->edital = $path . $nome;
        }
    }

    public function salvarModelos($file)
    {
        if ($file != null) {
            $path = 'concursos/' . $this->id . '/';
            $nome = 'modelos.zip';
            Storage::putFileAs('public/' . $path, $file, $nome);
            $this->modelos_documentos = $path . $nome;
        }
    }

    public function deletar()
    {
        if (Storage::disk()->exists('public/' . $this->edital)) {
            Storage::delete('public/' . $this->edital);
        }

        if (Storage::disk()->exists('public/' . $this->modelos_documentos)) {
            Storage::delete('public/' . $this->modelos_documentos);
        }

        $this->delete();
    }
}
