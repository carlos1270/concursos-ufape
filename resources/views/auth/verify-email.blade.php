@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Obrigado por se registrar</h6>
                </div>
                <div class="card-body">
                    <div>
                        <div class="col-md-12">
                            <p>Antes de começar, você poderia verificar seu endereço de e-mail clicando no link que acabamos de
                                enviar para você? Se você não recebeu o e-mail, teremos o prazer de enviar outro.</p>
                        </div>
                        @if (session('status') == 'verification-link-sent')
                            <div class="col-md-12">
                                <p>Um novo link de verificação foi enviado para o endereço de e-mail fornecido durante o registro.</p>
                            </div>
                        @endif
                        <div class="form-row">
                            <div class="col-md-7 form-group">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <div class="col-md-12 form-group">
                                        <button type="submit" class="btn btn-success shadow-sm" style="width: 100%;">Reenviar email de verificação</button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-4 form-group">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <div class="col-md-12 form-group">
                                        <button type="submit" class="btn btn-success shadow-sm" style="width: 100%;">Sair</button>
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
