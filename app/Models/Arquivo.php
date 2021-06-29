<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
    use HasFactory;

    public static $rules = [
        'formacao_academica'       => 'file|mimes:pdf|max:2048',
        'expericencia_didatica'    => 'file|mimes:pdf|max:2048',
        'producao_cientifica'      => 'file|mimes:pdf|max:2048',
        'experiencia_profissional' => 'file|mimes:pdf|max:2048',
    ];

    public static $messages = [
        'formacao_academica.required'       => 'O arquivo de formação acadêmica é obrigatório.',
        'formacao_academica.max'            => 'O tamanho máximo do arquivo de formação acadêmica são 2MB.',
        'formacao_academica.mimes'          => 'O arquivo de formação acadêmica só pode ser um PDF.',
        'expericencia_didatica.required'    => 'O arquivo de experiência didática é obrigatório.',
        'expericencia_didatica.max'         => 'O tamanho máximo do arquivo de experiência didática são 2MB.',
        'expericencia_didatica.mimes'       => 'O arquivo de experiência didática só pode ser um PDF.',
        'producao_cientifica.required'      => 'O arquivo de produção didática é obrigatório.',
        'producao_cientifica.max'           => 'O tamanho máximo do arquivo de produção didática são 2MB.',
        'producao_cientifica.mimes'         => 'O arquivo de produção didática só pode ser um PDF.',
        'experiencia_profissional.required' => 'O arquivo de experiência profissional é obrigatório.',
        'experiencia_profissional.max'      => 'O tamanho máximo do arquivo de experiência profissional são 2MB.',
        'experiencia_profissional.mimes'    => 'O arquivo de experiência profissional só pode ser um PDF.',
    ];

    protected $fillable = [
        'formacao_academica',
        'expericencia_didatica',
        'producao_cientifica',
        'experiencia_profissional',
        'inscricoes_id'
    ];

    public function inscricao()
    {
        return $this->belongsTo(Inscricao::class, 'inscricoes_id');
    }
}
