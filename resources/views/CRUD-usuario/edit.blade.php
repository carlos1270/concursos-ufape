@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Editar</h6>
                    <h6 class="style_card_container_header_campo_obrigatorio"><span style="color: red; font-weight: bold;">*</span> Campo obrigatório</h6></div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-row">
                            <div class="col-md-12">
                                <h6 class="style_card_container_header_subtitulo">Informações pessoais</h6>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('save.edit.user') }}">
                            @csrf
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
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label for="nome" class="style_campo_titulo">Nome <span style="color: red; font-weight: bold;">*</span></label>
                                    <input type="text" class="form-control style_campo" id="nome" name="nome"
                                        placeholder="Digite seu nome" value="{{ $usuario->nome }}" required autofocus autocomplete="nome"/>
                                    @error('nome')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="sobrenome" class="style_campo_titulo">Sobrenome <span style="color: red; font-weight: bold;">*</span></label>
                                    <input type="text" class="form-control style_campo" id="sobrenome" name="sobrenome"
                                        value="{{ $usuario->sobrenome }}" placeholder="Digite seu sobrenome" required />
                                    @error('sobrenome')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h6 class="style_card_container_header_subtitulo">Acesso ao sistema</h6>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 form-group">
                                    <label for="email" class="style_campo_titulo">E-mail <span style="color: red; font-weight: bold;">*</span></label>
                                    <input type="email" class="form-control style_campo" id="email" name="email"
                                        placeholder="Digite seu e-mail" value="{{ $usuario->email }}" required />
                                    @error('email')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label for="password" class="style_campo_titulo">Senha <span style="color: red; font-weight: bold;">*</span></label>
                                    <input type="password" class="form-control style_campo" id="password" name="password"
                                        placeholder="Digite sua senha" autocomplete="new-password"/>
                                    @error('password')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="password_confirmation" class="style_campo_titulo">Confirmar senha <span style="color: red; font-weight: bold;">*</span></label>
                                    <input type="password" class="form-control style_campo" id="password_confirmation" name="password_confirmation"
                                        placeholder="Confirme sua senha" autocomplete="new-password" />
                                </div>
                            </div>
                            
                            <input type="hidden" name="usuario" value="{{ $usuario->id }}"/>

                            <div class="col-md-12" style="margin-bottom: 5px;">
                                <hr>
                            </div>
                            <div class="col-md-12 form-group" style="margin-bottom: 9px;">
                                <button class="btn btn-success shadow-sm" style="width: 100%;">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection