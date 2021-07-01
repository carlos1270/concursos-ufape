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
        'edital_geral',
        'edital_especifico',
        'declaracao_veracidade',
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
        $this->titulo                           = $request->título;
        $this->qtd_vagas                        = $request->quantidade_de_vagas;
        $this->descricao                        = $request->descrição;
        $this->data_inicio_inscricao            = $request->data_de_início_da_inscrição;
        $this->data_fim_inscricao               = $request->data_de_término_da_inscrição;
        $this->data_fim_isencao_inscricao       = $request->data_limite_para_isenção;
        $this->data_fim_pagamento_inscricao     = $request->data_limite_para_pagamento;
        $this->data_inicio_envio_doc            = $request->data_de_início_para_envio_dos_documentos;
        $this->data_fim_envio_doc               = $request->data_final_para_envio_dos_documentos;
        $this->data_resultado_selecao           = $request->data_do_resultado_do_concurso;
        $this->users_id                         = auth()->user()->id;
    }

    public function salvarArquivos(StoreConcursoRequest $request)
    {
        if ($request->edital_geral != null) {
            $path = 'concursos/' . $this->id . '/';
            $nome = 'edital_geral.pdf';
            Storage::putFileAs('public/' . $path, $request->edital_geral, $nome);
            $this->edital_geral = $path . $nome;
        }
        if ($request->edital_especifico != null) {
            $path = 'concursos/' . $this->id . '/';
            $nome = 'edital_especifico.pdf';
            Storage::putFileAs('public/' . $path, $request->edital_especifico, $nome);
            $this->edital_especifico = $path . $nome;
        }
        if ($request->declaracao_de_veracidade != null) {
            $path = 'concursos/' . $this->id . '/';
            $nome = 'declaracao_veracidade.pdf';
            Storage::putFileAs('public/' . $path, $request->declaracao_de_veracidade, $nome);
            $this->declaracao_veracidade = $path . $nome;
        }
    }

    public function deletar()
    {
        if (Storage::disk()->exists('public/' . $this->edital_geral)) {
            Storage::delete('public/' . $this->edital_geral);
        }

        if (Storage::disk()->exists('public/' . $this->edital_especifico)) {
            Storage::delete('public/' . $this->edital_especifico);
        }

        if (Storage::disk()->exists('public/' . $this->declaracao_veracidade)) {
            Storage::delete('public/' . $this->declaracao_veracidade);
        }

        $this->delete();
    }

    public function chefeDaBanca() {
        return $this->belongsToMany(User::class, 'chefe_da_banca', 'concursos_id', 'users_id');
    }
}
