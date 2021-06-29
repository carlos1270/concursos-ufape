@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Redefinir senha</h6>
                </div>
                <div class="card-body">
                    <div>
                        <form method="POST" style="" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="form-group col-md-12">
                                <label for="email" class="style_campo_titulo">E-mail</label>
                                <input type="email" class="form-control style_campo" id="email" name="email" 
                                    value="{{ old('email', $request->email) }}" placeholder="Digite seu e-mail" required autofocus/>
                                @error('email')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="password" class="style_campo_titulo">Senha</label>
                                <input type="password" class="form-control style_campo" id="password" name="password"
                                    placeholder="Digite sua senha" required autocomplete="current-password" />
                                @error('password')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="password_confirmation" class="style_campo_titulo">Confirmar senha</label>
                                <input type="password" class="form-control style_campo" id="password_confirmation" name="password_confirmation"
                                    placeholder="Confirme sua senha" required autocomplete="new-password" />
                            </div>
                            <div class="col-md-12 form-group" style="margin-bottom: 4px;">
                                <button type="submit" class="btn btn-success shadow-sm" style="width: 100%;">Redefinir senha</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>
@endsection
