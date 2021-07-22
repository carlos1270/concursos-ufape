<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotaDeTestoStoreRequest extends FormRequest
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
            'título'                => 'required|max:100',
            'tipo'                  => 'required',
            'cor_do_fundo_da_nota'  => 'nullable',
            'texto_da_nota'         => 'required|max:1000',
            'anexo'                 => 'nullable',
        ];
    }
}
