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
                                    <label for="nome" class="style_campo_titulo">Nome</label>
                                    <input type="text" class="form-control style_campo" id="nome" name="nome"
                                        placeholder="Digite seu nome" value="{{ old('nome') }}" required autofocus autocomplete="nome"/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="sobrenome" class="style_campo_titulo">Sobrenome</label>
                                    <input type="text" class="form-control style_campo" id="sobrenome" name="sobrenome"
                                        value="{{ old('sobrenome') }}" placeholder="Digite seu sobrenome" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label for="cpf" class="style_campo_titulo">CPF</label>
                                    <input type="text" class="form-control style_campo" id="cpf" name="cpf"
                                        placeholder="Digite seu CPF" value="{{ old('cpf') }}" required />
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="celular" class="style_campo_titulo">Celular</label>
                                    <input type="text" class="form-control style_campo" id="celular" name="celular"
                                        placeholder="Digite o seu número" value="{{ old('celular') }}" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h6 class="style_card_container_header_subtitulo">Acesso ao sistema</h6>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 form-group">
                                    <label for="email" class="style_campo_titulo">E-mail</label>
                                    <input type="email" class="form-control style_campo" id="email" name="email"
                                        placeholder="Digite seu e-mail" value="{{ old('email') }}" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label for="password" class="style_campo_titulo">Senha</label>
                                    <input type="password" class="form-control style_campo" id="password" name="password"
                                        placeholder="Digite sua senha" required autocomplete="new-password"/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="password_confirmation" class="style_campo_titulo">Confirmar senha</label>
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

<script>
    $(document).ready(function($) {
        $('#cpf').mask('000.000.000-00');
        var SPMaskBehavior = function(val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
                onKeyPress: function(val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };
        $('#celular').mask(SPMaskBehavior, spOptions);
    });
</script>
@endsection