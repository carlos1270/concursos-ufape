<?php

namespace App\Actions\Fortify;

use App\Http\Controllers\Controller;
use App\Models\Candidato;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\Endereco;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $input['role'] = User::ROLE_ENUM['candidato'];
    
        Validator::make($input, User::$rules, User::$messages)->validate();

        $input['cpf'] = preg_replace('/[^0-9]/', '', $input['cpf']);
        $input['celular'] = preg_replace('/[^0-9]/', '', $input['celular']);
        $input['telefone'] = preg_replace('/[^0-9]/', '', $input['telefone']);

        $candidatosRules = array_slice(Candidato::$rules, 0, 2);
        $candidatosMessages = array_slice(Candidato::$messages, 0, 9);

        // Validator::make($input, $candidatosRules, $candidatosMessages)->validate();

        $input['password'] = Hash::make($input['password']);

        $usuario = new User();
        $usuario->nome = $input['nome'];
        $usuario->sobrenome = $input['sobrenome'];
        $usuario->email = $input['email'];
        $usuario->role = $input['role'];
        $usuario->password = $input['password'];
        $usuario->save();

        $candidato = new Candidato();
        $candidato->cpf = $input['cpf'];
        $candidato->celular = $input['celular'];
        $candidato->telefone = $input['telefone'];
        $candidato->users_id = $usuario->id;
        $candidato->nome_do_pai = $input['nome_do_pai'];
        $candidato->documento_de_identificacao = $input['documento_de_identificação'];
        $candidato->data_de_nascimento = $input['data_de_nascimento'];
        $candidato->orgao_emissor = $input['órgao_emissor'];
        $candidato->nome_da_mae = $input['nome_da_mãe'];
        $candidato->estrangeiro = $input['estrangeiro'] == "sim";
        $candidato->save();

        $endereco = new Endereco();
        $endereco->users_id = $usuario->id;
        $endereco->cep = $input['cep'];
        $endereco->logradouro = $input['logradouro'];
        $endereco->complemento = $input['complemento'];
        $endereco->numero = $input['número'];
        $endereco->bairro = $input['bairro'];
        $endereco->cidade = $input['cidade'];
        $endereco->uf = $input['uf'];
        $endereco->save();

        return $usuario;
    }
}
