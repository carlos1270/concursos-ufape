<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConcursoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo'                        => 'required|max:100',
            'quantidade_vagas'              => 'required',
            'descricao'                     => 'required|max:1000',
            'data_inicio_inscricao'         => 'required',
            'data_fim_inscricao'            => 'required|after:data_inicio_inscricao',
            'data_fim_isencao_inscricao'    => 'required|after:data_inicio_inscricao',
            'data_fim_pagamento_inscricao'  => 'required|after:data_inicio_inscricao',
            'data_inicio_envio_doc'         => 'required|after:data_fim_inscricao',
            'data_fim_envio_doc'            => 'required|after:data_inicio_envio_doc',
            'data_resultado_selecao'        => 'required|after:data_fim_envio_doc',
            'edital'                        => 'required|file|max:2048',
            'modelos_documentos'            => 'required|file|max:2048',
        ];
    }
}
