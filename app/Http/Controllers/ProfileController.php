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
            'nome'                  => 'nullable|string|min:4|max:50',
            'sobrenome'             => 'nullable|string|min:4|max:50',
            'nome_do_pai'           => 'nullable|string|min:8|max:100',
            'nome_da_mae'           => 'nullable|string|min:8|max:100',
            'data_de_nascimento'    => 'nullable|date',
            'telefone'              => 'nullable|min:10|max:20',
            'celular'               => 'nullable|min:10|max:20',
            'cep'                   => 'nullable|size:9',
            'logradouro'            => 'nullable|min:4|max:100',
            'bairro'                => 'nullable|min:4|max:100',
            'número'                => 'nullable|min:1|max:100',
            'cidade'                => 'nullable|min:4|max:100',
            'uf'                    => 'nullable',
            'complemento'           => 'nullable|min:2|max:150',
        ], User::$messages)->validate();

        $request['celular'] = preg_replace('/[^0-9]/', '', $request['celular']);
        $request['telefone'] = preg_replace('/[^0-9]/', '', $request['telefone']);

        $usuario = User::find(Auth::user()->id);;
        $usuario->nome = $request['nome'] ? $request['nome'] : $usuario->nome;
        $usuario->sobrenome = $request['sobrenome'] ? $request['sobrenome'] : $usuario->sobrenome;
        $usuario->save();

        $candidato = Candidato::where('users_id', $usuario->id)->first();
        $candidato->celular = $request['celular'] ? $request['celular'] : $candidato->celular;
        $candidato->telefone = $request['telefone'] ? $request['telefone'] : $candidato->telefone;
        $candidato->users_id = $usuario->id;
        $candidato->nome_do_pai = $request['nome_do_pai'] ? $request['nome_do_pai'] : $candidato->nome_do_pai;

        $candidato->data_de_nascimento = $request['data_de_nascimento'] ? $request['data_de_nascimento'] : $candidato->data_de_nascimento;

        $candidato->nome_da_mae = $request['nome_da_mae'] ? $request['nome_da_mae'] : $candidato->nome_da_mae;
        $candidato->save();

        $endereco = Endereco::where('users_id', $usuario->id)->first();
        $endereco->users_id = $usuario->id;
        $endereco->cep = $request['cep'] ? $request['cep'] : $endereco->cep;
        $endereco->logradouro = $request['logradouro'] ? $request['logradouro'] : $endereco->logradouro;
        $endereco->complemento = $request['complemento'] ? $request['complemento'] : $endereco->complemento;
        $endereco->numero = $request['numero'] ? $request['numero'] : $endereco->numero;
        $endereco->bairro = $request['bairro'] ? $request['bairro'] : $endereco->bairro;
        $endereco->cidade = $request['cidade'] ? $request['cidade'] : $endereco->cidade;
        $endereco->uf = $request['uf'] ? $request['uf'] : $endereco->uf;
        $endereco->save();

        return redirect(route('user.profile.edit'))->with(['success' => 'Informações atualizadas com sucesso!']);
    }
}
