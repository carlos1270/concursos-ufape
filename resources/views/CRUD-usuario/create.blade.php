<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar') }}
        </h2>
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
                    @if(session('error'))
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                <p>{{session('error')}}</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row justify-content-center">
                    <div class="col-8 ">
                        <form method="post" action="{{ route('save.usuario') }}">
                            @csrf

                            <div class="mt-4">
                                <x-jet-label for="nome" value="{{ __('Nome') }}" />
                                <x-jet-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus autocomplete="nome" />
                                <x-jet-input-error for="nome" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="email" value="{{ __('Email') }}" />
                                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                <x-jet-input-error for="email" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="cpf" value="{{ __('CPF') }}" />
                                <x-jet-input id="cpf" class="block mt-1 w-full" type="number" name="cpf" :value="old('cpf')" required />
                                <x-jet-input-error for="cpf" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="celular" value="{{ __('Celular') }}" />
                                <x-jet-input id="celular" class="block mt-1 w-full" type="number" name="celular" :value="old('celular')" required />
                                <x-jet-input-error for="celular" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="password" value="{{ __('Senha') }}" />
                                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                <x-jet-input-error for="password" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="password_confirmation" value="{{ __('Confirme a senha') }}" />
                                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                <x-jet-input-error for="password_confirmation" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="tipos_usuario" value="{{ __('Tipo de usuário') }}" />
                                <select id="tipos_usuario" name="tipo_usuario" class="custom-select" required>
                                  <option selected>Selecione...</option>
                                  <option value="admin">Administrador</option>
                                  <option value="chefeSetorConcursos">Chefe do setor de concursos</option>
                                  <option value="presidenteBancaExaminadora">Presidente da banca examinadora</option>
                                  <option value="candidato">Candidato</option>
                                </select>
                                <x-jet-input-error for="tipos_usuario" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-jet-button class="ml-4">
                                    {{ __('Cadastrar') }}
                                </x-jet-button>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>