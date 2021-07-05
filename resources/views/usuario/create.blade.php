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
                            <div class="form-group">
                                <label for="role" class="style_campo_titulo">Tipo de usuário <span style="color: red; font-weight: bold;">*</span></label>
                                <select id="role" name="role" class="custom-select" required>
                                  <option selected>Selecione...</option>
                                  <option value="admin">Administrador</option>
                                  <option value="chefeSetorConcursos">Chefe do setor de concursos</option>
                                  <option value="presidenteBancaExaminadora">Presidente da banca examinadora</option>
                                </select>
                                @error('role')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div id="concurso-presidente" class="form-group" style="display: none">
                                <label for="concurso-disponiveis" class="style_campo_titulo">Concurso a ser avaliado <span style="color: red; font-weight: bold;">*</span></label>
                                <select id="concurso-disponiveis" name="concurso-disponiveis" class="custom-select">
                                    @foreach ($concursos as $concurso)
                                        <option selected>Selecione...</option>
                                        <option value="{{ $concurso->id }}">{{ $concurso->titulo }}</option>
                                    @endforeach
                                </select>
                                @error('concurso')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div> --}}
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
{{-- <script>
    $('#role').change(function(){
        var role = $('#role').val();
        if(role == "presidenteBancaExaminadora"){
            $('#concurso-presidente').css('display','block')
            document.getElementById("concurso-disponiveis").required = true;
        } else {
            $('#concurso-presidente').css('display','none')
            document.getElementById("concurso-disponiveis").required = false;
        }
    });
</script> --}}
@endsection