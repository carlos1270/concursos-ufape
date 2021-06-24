<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\UsuarioCadastrado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function dashboardCRUDUUser()
    {
        return view('CRUD-usuario.dashboard');
    }

    public function createUser()
    {
        return view('CRUD-usuario.create');
    }

    public function showUser()
    {
        $usuarios = User::all()->except(Auth::id());

        return view('CRUD-usuario.show')->with(['usuarios' => $usuarios]);
    }

    public function editUser(Request $request)
    {
        $usuario = User::find($request->usuario);

        return view('CRUD-usuario.edit')->with(['usuario' => $usuario]);
    }

    public function saveUser(Request $request)
    {
        $validator = Validator::make($request->all(), User::$rules, User::$messages)->validate();

        $data = [
            'nome' => $request['nome'],
            'sobrenome' => $request['sobrenome'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role']
        ];

        $usuario = new User();
        $usuario->fill($data);
        $usuario->save();

        $usuario->password = $request['password'];

        Notification::send($usuario, new UsuarioCadastrado($usuario));

        return redirect()->back()->with('success', 'Cadastro realizado com sucesso');
    }

    public function saveEditUser(Request $request)
    {
        $usuario = User::find($request->usuario);
        $rules = User::$rules;
        $messages = User::$messages;

        if (!$request['password']) {
            $rules = array_slice(User::$rules, 0, 3);
            $messages = array_slice(User::$messages, 0, 10);
        }

        $rules['email'] = [
            'required', 'email', 'min:5', 'max:100',
            Rule::unique('users')->ignore($usuario->id),
        ];

        $request['role'] = $usuario->role;

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        $data = [
            'nome' => $request['nome'],
            'sobrenome' => $request['sobrenome'],
            'email' => $request['email'],
        ];

        if ($request['password'])
            $data['password'] = Hash::make($request['password']);

        $usuario->fill($data)->update();

        return redirect()->back()->with('success', 'Usuário editado com sucesso');
    }

    public function deleteUser($id)
    {

        $usuario = User::find($id);
        $usuario->delete();

        return redirect()->route('show.users')->with('success', 'Usuário deletado com sucesso!');
    }
}
