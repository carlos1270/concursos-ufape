@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Entrar</h6>
                </div>
                <div class="card-body">
                    <div>
                        <div class="col-md-12">
                            <h6 class="style_card_container_header_subtitulo">Informações pessoais</h6>
                        </div>
                        <form method="POST" style="" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group col-md-12">
                                <label for="email" class="style_campo_titulo">E-mail</label>
                                <input type="email" class="form-control style_campo" id="email" name="email" 
                                    :value="old('email')" placeholder="Digite seu e-mail" required autofocus/>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="password" class="style_campo_titulo">Senha</label>
                                <input type="password" class="form-control style_campo" id="password" name="password"
                                    placeholder="Digite sua senha" required autocomplete="current-password" />
                            </div>
                            <div class="col-md-12" style="margin-top: -10px; margin-bottom: 15px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                        id="remember_me" name="remember" />
                                    <label class="form-check-label style_campo_titulo" for="remember_me">
                                        Lembre de mim
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group" style="margin-bottom: 4px;">
                                <button type="submit" class="btn btn-success shadow-sm" style="width: 100%;">Entrar</button>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="col-md-12 form-group" style="text-align: center; margin-top:5px; margin-bottom: -4px;">
                                    <h6 style="font-weight:normal; color: #909090;">
                                        Esqueceu sua senha? <a href="{{ route('password.request') }}">Clique aqui!</a>
                                    </h6>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>
@endsection