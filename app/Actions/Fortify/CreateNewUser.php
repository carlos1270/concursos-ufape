<?php

namespace App\Actions\Fortify;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
        $input['tipo_usuario'] = User::TIPO_ENUM['candidato'];

        Validator::make($input, User::$rules, User::$messages)->validate();

        if (!Controller::validar_cpf($input['cpf'])) {
            return redirect()->back()->with('error', 'Número de CPF inválido')->withrequest();
        }

        $input['password'] = Hash::make($input['password']);

        return User::create($input);
    }
}
