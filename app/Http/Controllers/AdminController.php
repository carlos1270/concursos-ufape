<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\UsuarioCadastrado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function dashboardCRUDUsuario()
    {
        return view('CRUD-usuario.dashboard');
    }

    public function createUsuario()
    {
        return view('CRUD-usuario.create');
    }

    public function showUsuario()
    {
        $usuarios = User::all()->except(Auth::id());

        return view('CRUD-usuario.show')->with(['usuarios' => $usuarios]);
    }

    public function editUsuario(Request $request)
    {
        $usuario = User::find($request->usuario);

        return view('CRUD-usuario.edit')->with(['usuario' => $usuario]);
    }

    public function saveUsuario(Request $request)
    {
        $validator = Validator::make($request->all(), User::$rules, User::$messages)->validate();

        if (!Controller::validar_cpf($request['cpf'])) {
            return redirect()->back()->with('error', 'Número de CPF inválido')->withInput();
        }

        $data = [
            'nome' => $request['nome'],
            'sobrenome' => $request['sobrenome'],
            'email' => $request['email'],
            'cpf' => $request['cpf'],
            'celular' => $request['celular'],
            'password' => Hash::make($request['password']),
            'tipo_usuario' => $request['tipo_usuario']
        ];

        $usuario = new User();
        $usuario->fill($data);
        $usuario->save();

        $usuario->password = $request['password'];

        Notification::send($usuario, new UsuarioCadastrado($usuario));

        return redirect()->back()->with('success', 'Cadastro realizado com sucesso');
    }

    public function saveEditUsuario(Request $request)
    {
        $usuario = User::find($request->usuario);
        $rules = User::$rules;
        $messages = User::$messages;

        if (!$request['password']) {
            $rules = array_slice(User::$rules, 0, 5);
            $messages = array_slice(User::$messages, 0, 20);
        }

        $rules['cpf'] = [
            'required', 'numeric', 'min:0', 'digits_between:10,11',
            Rule::unique('users')->ignore($usuario->id),
        ];

        $rules['email'] = [
            'required', 'email', 'min:5', 'max:100',
            Rule::unique('users')->ignore($usuario->id),
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        if (!Controller::validar_cpf($request['cpf'])) {
            return redirect()->back()->with('error', 'Número de CPF inválido')->withInput();
        }

        $data = [
            'nome' => $request['nome'],
            'sobrenome' => $request['sobrenome'],
            'email' => $request['email'],
            'cpf' => $request['cpf'],
            'celular' => $request['celular']
        ];

        if ($request['password'])
            $data['password'] = Hash::make($request['password']);

        $usuario->fill($data)->update();

        return redirect()->back()->with('success', 'Usuário editado com sucesso');
    }

    public function deleteUsuario($id)
    {

        $usuario = User::find($id);
        $usuario->delete();

        return redirect()->route('show.usuarios')->with('success', 'Usuário deletado com sucesso!');
    }
}
