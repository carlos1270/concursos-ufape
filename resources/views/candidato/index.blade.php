@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 10rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Minhas Inscrições</h6>
                </div>
                @if($inscricoes->count() > 0)
                    <div class="card-body">
                        @if(session('success'))
                            <div class="row">
                                <div class="col-md-12" style="margin-top: 5px;">
                                    <div class="alert alert-success" role="alert">
                                        <p>{{session('success')}}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <table class="table table-bordered table-hover tabela_container">
                            <thead>
                                <tr>
                                    <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 50%;">Concurso</th>
                                    <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 30%;">Vaga</th>
                                    <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 100%;">Pagamento</th>
                                    <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 100%;">Status</th>
                                    <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 100%;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inscricoes as $inscricao)
                                    <tr>
                                        <td id="tabela_container_linha">{{ mb_strimwidth($inscricao->concurso->titulo, 0, 38, "...") }}</td>
                                        <td id="tabela_container_linha">{{ mb_strimwidth($inscricao->vaga->nome, 0, 20, "...") }}</td>
                                        <td id="tabela_container_linha">
                                            @if ($inscricao->status == "aprovado")
                                                Pagamento aprovado
                                            @else 
                                                <a target="_black" href="http://consulta.tesouro.fazenda.gov.br/gru_novosite/gru_simples.asp">
                                                    Gerar boleto
                                                </a>
                                            @endif
                                        </td>
                                        <td id="tabela_container_linha">
                                            @if ($inscricao->status == "aprovado")
                                                Aprovado
                                            @else 
                                                {{$inscricao->status}}
                                            @endif
                                        </td>
                                        <td id="tabela_container_linha" style="text-align: center;">
                                            <div class="btn-group">
                                                <div>
                                                    <button class="btn btn-primary" 
                                                        onclick ="location.href='{{ route('candidato.show', $inscricao->id) }}'">
                                                        <img src="{{ asset('img/icon_visualizar.svg') }}" alt="Visualizar concurso" width="26px" >
                                                    </button>
                                                </div>
                                                @if ($inscricao->concurso->data_inicio_envio_doc <= now() && $inscricao->status == "aprovado")
                                                    <a class="btn btn-primary" style="margin-left: 5px; border-radius: 4px;" href="{{ route('envio.documentos.inscricao', $inscricao->id) }}">
                                                        Enviar documentos
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="card-body">
                        <div class="form-row" style="text-align: center;">
                            <div class="col-md-12" style="margin-top: 5rem; margin-bottom: 10rem;">
                                <img src="{{asset('img/img_default_meus_concursos.svg')}}" alt="Imagem default" width="190px">
                                <h6 class="style_campo_titulo" style="margin-top: 20px;">Você não se candidatou para nenhum concurso</h6>
                            </div>
                        </div>
                    </div>
                @endif    
            </div>
        </div>
    </div>
</div>
@endsection