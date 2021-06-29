<?php

namespace App\Actions\Fortify;

use App\Http\Controllers\Controller;
use App\Models\Candidato;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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

        $input['cpf'] = preg_replace('/[^0-9]/', '', $input['cpf']);
        $input['celular'] = preg_replace('/[^0-9]/', '', $input['celular']);

        $candidatosRules = array_slice(Candidato::$rules, 0, 2);
        $candidatosMessages = array_slice(Candidato::$messages, 0, 9);

        Validator::make($input, User::$rules, User::$messages)
            ->after(function ($validator) use ($input) {
                if (!Controller::validar_cpf($input['cpf'])) {
                    $validator->errors()->add('cpf', __('Informe um CPF valido.'));
                }
            })->validate();

        Validator::make($input, $candidatosRules, $candidatosMessages)->validate();

        $input['password'] = Hash::make($input['password']);

        $usuario = User::create([
            'nome' => $input['nome'],
            'sobrenome' => $input['sobrenome'],
            'email' => $input['email'],
            'role' => $input['role'],
            'password' => $input['password']
        ]);

        Candidato::create([
            'cpf' => $input['cpf'],
            'celular' => $input['celular'],
            'users_id' => $usuario->id,
        ]);

        return $usuario;
    }
}
