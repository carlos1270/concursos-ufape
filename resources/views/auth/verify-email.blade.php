@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Solicitação de criação de usuário feita com sucesso!</h6>
                </div>
                <div class="card-body">
                    <div>
                        <div class="col-md-12">
                            <p style="text-align: justify;">
                                Para efetivar a criação de sua conta, pedimos que acesse o link que acabamos de enviar para você. Caso o e-mail não esteja na caixa de entrada, verifique a pasta de spam ou outras do seu gerenciador de e-mails. Contudo, se não tiver realmente chegado, clique no botão abaixo para enviarmos o e-mail novamente.
                            </p>
                            @if (session('status') == 'verification-link-sent')
                                <p class="alert alert-success">
                                    Um novo link de verificação foi enviado para o endereço de e-mail fornecido durante o registro.
                                </p>
                            @endif
                        </div>
                        <div class="form-row">
                            
                            <div class="col-md-6">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <div class="col-md-12 form-group">
                                        <button type="submit" class="btn btn-success shadow-sm" style="width: 100%;">Reenviar email de verificação</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
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
