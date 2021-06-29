@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Editar Perfil</h6>
                    <h6 class="style_card_container_header_campo_obrigatorio"><span style="color: red; font-weight: bold;">*</span> Campo obrigatório</h6></div>
                <div class="card-body">
                    <div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('user-password.update') }}">
                                    @csrf
                                    @method('PUT')
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
                                            <div class="col-md-12">
                                                <h6 class="style_card_container_header_subtitulo">Senha</h6>
                                            </div>
                                        </div>
                                    <div class="form-row">
                                        <div class="col-md-12 form-group">
                                            <label for="current_password" class="style_campo_titulo">Senha Atual <span style="color: red; font-weight: bold;">*</span></label>
                                            <input type="password" class="form-control style_campo" id="current_password" name="current_password"
                                                placeholder="Digite a senha atual"/>
                                            @error('current_password')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 form-group">
                                            <label for="password" class="style_campo_titulo">Nova Senha <span style="color: red; font-weight: bold;">*</span></label>
                                            <input type="password" class="form-control style_campo" id="password" name="password"
                                                placeholder="Digite a nova senha" autocomplete="new-password"/>
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
                                    <hr/>
                                    <div class="form-row">
                                        <div class="col-md-12 form-group" style="margin-bottom: 9px;">
                                            <button type="submit" class="btn btn-success shadow-sm" style="width: 100%;">Enviar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection