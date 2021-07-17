<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Endereco;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function showPassword()
    {
        return view('profile.update-password');
    }

    public function showProfileInfo()
    {
        return view('profile.update-profile-information');
    }

    public function updateProfileInfo(Request $request)
    {
        Validator::make($request->all(), [
            'nome'                  => 'required|string|min:4|max:50',
            'sobrenome'             => 'required|string|min:4|max:50',
            'nome_do_pai'           => 'required|string|min:8|max:100',
            'nome_da_mãe'           => 'required|string|min:8|max:100',
            'data_de_nascimento'    => 'required|date',
            'telefone'              => 'nullable|min:10|max:20',
            'celular'               => 'required|min:10|max:20',
            'cep'                   => 'required|size:9',
            'logradouro'            => 'required|min:4|max:100',
            'bairro'                => 'required|min:4|max:100',
            'número'                => 'required|min:1|max:100',
            'cidade'                => 'required|min:4|max:100',
            'uf'                    => 'required',
            'complemento'           => 'nullable|min:2|max:150',
        ], User::$messages)->validate();

        $request['celular'] = preg_replace('/[^0-9]/', '', $request['celular']);
        $request['telefone'] = preg_replace('/[^0-9]/', '', $request['telefone']);

        $usuario = User::find(Auth::user()->id);;
        $usuario->nome = $request['nome'];
        $usuario->sobrenome = $request['sobrenome'];
        $usuario->save();

        $candidato = Candidato::where('users_id', $usuario->id)->first();
        $candidato->celular = $request['celular'];
        $candidato->telefone = $request['telefone'];
        $candidato->users_id = $usuario->id;
        $candidato->nome_do_pai = $request['nome_do_pai'];

        $candidato->data_de_nascimento = $request['data_de_nascimento'];

        $candidato->nome_da_mae = $request['nome_da_mãe'];
        $candidato->save();

        $endereco = Endereco::where('users_id', $usuario->id)->first();
        $endereco->users_id = $usuario->id;
        $endereco->cep = $request['cep'];
        $endereco->logradouro = $request['logradouro'];
        $endereco->complemento = $request['complemento'];
        $endereco->numero = $request['número'];
        $endereco->bairro = $request['bairro'];
        $endereco->cidade = $request['cidade'];
        $endereco->uf = $request['uf'];
        $endereco->save();

        return redirect(route('user.profile.edit'))->with(['success' => 'Informações atualizadas com sucesso!']);
    }
}
