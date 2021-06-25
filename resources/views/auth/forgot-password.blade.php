@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Esqueceu sua senha?</h6>
                </div>
                <div class="card-body">
                    <div>
                        <div class="col-md-12">
                            <p>Sem problemas. Basta nos informar seu endereço de e-mail e nós 
                            enviaremos um link de redefinição de senha que permitirá que você escolha uma nova.</p>
                        </div>
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="col-md-12 form-group">
                                        <label for="email" class="style_campo_titulo">E-mail</label>
                                        <input type="email" class="form-control style_campo" id="email" name="email" 
                                            :value="old('email')" placeholder="Digite seu e-mail" required autofocus/>
                                        @error('email')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <button type="submit" class="btn btn-success shadow-sm" style="width: 100%;">Enviar link de redefinição</button>
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
