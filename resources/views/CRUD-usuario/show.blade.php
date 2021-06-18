<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('create.usuario') }}">
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Cadastrar usuário
                    </button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
            <div class="row">
                    @if(session('success'))
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">
                            <p>{{session('success')}}</p>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="row">
                    <table id="table-usuarios" class="table table-responsove-md">
                        <thead>
                            <tr>
                                <th scope="col" style="padding-left: 10px">Nome</th>
                                <th scope="col" style="padding-left: 10px">CPF</th>
                                <th scope="col" style="padding-left: 10px">Celular</th>
                                <th scope="col" style="padding-left: 10px">E-mail</th>
                                <th scope="col" style="text-align: center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($usuarios as $user)
                                <tr>
                                    <td>
                                        {{ $user->nome }}
                                    <td>
                                    <td>
                                        {{ $user->cpf }}
                                    <td>
                                    <td>
                                        {{ $user->celular }}
                                    <td>
                                    <td>
                                        {{ $user->email }}
                                    <td>
                                    <td>
                                    <button type="button"
                                            onclick ="location.href='{{ route('edit.usuario', ['usuario' => $user->id]) }}'">
                                            Editar
                                    </button>
                                        <button type="button"
                                            onclick="if(confirm('Tem certeza que deseja deletar o usuário?')) location.href='{{route('delete.usuario', $user->id)}}'">
                                            Remover
                                        </button>
                                    <td>
                                </tr>
                            @empty
                                <td colspan="5">Sem usuários cadastrados ainda</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>