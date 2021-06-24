@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Cadastre-se</h6>
                    <h6 class="style_card_container_header_campo_obrigatorio"><span style="color: red; font-weight: bold;">*</span> Campo obrigatório</h6></div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-row">
                            <div class="col-md-12">
                                <h6 class="style_card_container_header_subtitulo">Informações pessoais</h6>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label for="nome" class="style_campo_titulo">Nome <span style="color: red; font-weight: bold;">*</span></label>
                                    <input type="text" class="form-control style_campo" id="nome" name="nome"
                                        placeholder="Digite seu nome" value="{{ old('nome') }}" required autofocus autocomplete="nome"/>
                                    @error('nome')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="sobrenome" class="style_campo_titulo">Sobrenome <span style="color: red; font-weight: bold;">*</span></label>
                                    <input type="text" class="form-control style_campo" id="sobrenome" name="sobrenome"
                                        value="{{ old('sobrenome') }}" placeholder="Digite seu sobrenome" required />
                                    @error('sobrenome')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label for="cpf" class="style_campo_titulo">CPF <span style="color: red; font-weight: bold;">*</span></label>
                                    <input type="number" class="form-control style_campo" id="cpf" name="cpf"
                                        placeholder="Digite seu CPF" value="{{ old('cpf') }}" required />
                                    @error('cpf')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="celular" class="style_campo_titulo">Celular <span style="color: red; font-weight: bold;">*</span></label>
                                    <input type="number" class="form-control style_campo" id="celular" name="celular"
                                        placeholder="Digite o seu número" value="{{ old('celular') }}" required />
                                    @error('celular')
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
                                        placeholder="Digite seu e-mail" value="{{ old('email') }}" required />
                                    @error('email')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label for="password" class="style_campo_titulo">Senha <span style="color: red; font-weight: bold;">*</span></label>
                                    <input type="password" class="form-control style_campo" id="password" name="password"
                                        placeholder="Digite sua senha" required autocomplete="new-password"/>
                                    @error('password')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="password_confirmation" class="style_campo_titulo">Confirmar senha <span style="color: red; font-weight: bold;">*</span></label>
                                    <input type="password" class="form-control style_campo" id="password_confirmation" name="password_confirmation"
                                        placeholder="Confirme sua senha" required autocomplete="new-password" />
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom: 5px;">
                                <hr>
                            </div>
                            <div class="col-md-12 form-group" style="margin-bottom: 9px;">
                                <button class="btn btn-success shadow-sm" style="width: 100%;">Cadastre-se</button>
                                <h6 style="font-size: 13px; color: #909090; font-weight: normal; margin-top: 15px; margin-bottom: -10px;">Ao clicar em Cadastre-se, você concorda com nossos Termos e Política de Cookies. </h6>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection