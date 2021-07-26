<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Models\Concurso;

class StoreInscricaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->concurso_id != null) {
            $concurso = Concurso::find($this->concurso_id);
            return auth()->user()->role == User::ROLE_ENUM['candidato'] || auth()->user()->id == $concurso->users_id;
        }
        return auth()->user()->role == User::ROLE_ENUM['candidato'];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vaga'              => 'required',
            'cotista'           => 'required|in:true,false',
            'pcd'               => 'required|in:true,false',
        ];
    }
}
