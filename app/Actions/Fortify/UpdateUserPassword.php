<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make(
            $input,
            ['password' => User::$rules['password']],
            array_slice(User::$messages, 11, 15)
        )->after(function ($validator) use ($user, $input) {
            if (!isset($input['current_password']) || !Hash::check($input['current_password'], $user->password)) {
                $validator->errors()->add('current_password', __('A senha fornecida não corresponde à sua senha atual.'));
            }
        })->validate();

        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();

        return redirect()->back()->with('success', 'Senha atualizada com sucesso!');
    }
}
