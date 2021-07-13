@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Cadastrar Usuário</h6>
                    <h6 class="style_card_container_header_campo_obrigatorio"><span style="color: red; font-weight: bold;">*</span> Campo obrigatório</h6></div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-row">
                            <div class="col-md-12">
                                <h6 class="style_card_container_header_subtitulo">Informações pessoais</h6>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('user.store') }}">
                            @csrf
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
                                    <input type="text" class="form-control style_campo @error('nome') is-invalid @enderror" id="nome" name="nome"
                                        placeholder="Digite seu nome" value="{{ old('nome') }}" required autofocus autocomplete="nome"/>
                                    @error('nome')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="sobrenome" class="style_campo_titulo">Sobrenome <span style="color: red; font-weight: bold;">*</span></label>
                                    <input type="text" class="form-control style_campo @error('sobrenome') is-invalid @enderror" id="sobrenome" name="sobrenome"
                                        value="{{ old('sobrenome') }}" placeholder="Digite seu sobrenome" required />
                                    @error('sobrenome')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
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
                                    <input type="email" class="form-control style_campo @error('email') is-invalid @enderror" id="email" name="email"
                                        placeholder="Digite seu e-mail" value="{{ old('email') }}" required />
                                    @error('email')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label for="password" class="style_campo_titulo">Senha <span style="color: red; font-weight: bold;">*</span></label>
                                    <input type="password" class="form-control style_campo @error('password') is-invalid @enderror" id="password" name="password"
                                        placeholder="Digite sua senha" required autocomplete="new-password"/>
                                    @error('password')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="password_confirmation" class="style_campo_titulo">Confirmar senha <span style="color: red; font-weight: bold;">*</span></label>
                                    <input type="password" class="form-control style_campo" id="password_confirmation" name="password_confirmation"
                                        placeholder="Confirme sua senha" required autocomplete="new-password" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="role" class="style_campo_titulo">Tipo de usuário <span style="color: red; font-weight: bold;">*</span></label>
                                <select id="role" name="role" class="custom-select @error('role') is-invalid @enderror" required onchange="mostrarDivChefe(this)">
                                  <option selected disabled>Selecione...</option>
                                  <option @if(old('role') == "admin") selected @endif value="admin">Administrador</option>
                                  <option @if(old('role') == "chefeSetorConcursos") selected @endif value="chefeSetorConcursos">Chefe do setor de concursos</option>
                                  <option @if(old('role') == "presidenteBancaExaminadora") selected @endif value="presidenteBancaExaminadora">Presidente da banca examinadora</option>
                                </select>

                                @error('role')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div id="concurso-chefe" class="form-group" style="@if(old('role') == "presidenteBancaExaminadora") display: block; @else display: none; @endif">
                                <label for="concurso" class="style_campo_titulo @error('concurso') is-invalid @enderror">De qual concurso? <span style="color: red; font-weight: bold;">*</span></label>
                                <select id="concurso" name="concurso" class="custom-select">
                                    <option selected disabled>Selecione...</option>
                                    @foreach ($concursos as $concurso)
                                        <option @if(old('role') == $concurso->id) selected @endif value="{{$concurso->id}}">{{$concurso->titulo}}</option>
                                    @endforeach
                                </select>

                                @error('concurso')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div id="concurso-presidente" class="form-group" style="display: none">
                                <label for="concurso-disponiveis" class="style_campo_titulo">Concurso a ser avaliado <span style="color: red; font-weight: bold;">*</span></label>
                                <select id="concurso-disponiveis" name="concurso-disponiveis" class="custom-select">
                                    @foreach ($concursos as $concurso)
                                        <option selected>Selecione...</option>
                                        <option value="{{ $concurso->id }}">{{ $concurso->titulo }}</option>
                                    @endforeach
                                </select>
                                @error('concurso')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12" style="margin-bottom: 5px;">
                                <hr>
                            </div>
                            <div class="col-md-12 form-group" style="margin-bottom: 9px;">
                                <button class="btn btn-success shadow-sm" style="width: 100%;">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function mostrarDivChefe(select) {
        if (select.value == "presidenteBancaExaminadora") {
            document.getElementById('concurso-chefe').style.display = "block";
        } else {
            document.getElementById('concurso-chefe').style.display = "none";
        }
    }
</script>
@endsection