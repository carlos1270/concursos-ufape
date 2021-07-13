@extends('templates.template-principal')
@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
        <div class="form-row justify-content-center">
            <div class="col-md-11">
                <div class="card shadow bg-white style_card_container">
                    <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                        <h6 class="style_card_container_header_titulo">Resultado Final</h6>
                    </div>
                    @if($inscricoes->count() > 0)
                        <div class="card-body">
                            <table class="table table-bordered table-hover tabela_container">
                                <thead>
                                    <tr>
                                        <th scope="col" class="tabela_container_cabecalho_titulo">Posição</th>
                                        <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 50%;">Nome</th>
                                        <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 50%;">Vaga</th>
                                        <th scope="col" class="tabela_container_cabecalho_titulo">Nota</th>
                                        <th scope="col" class="tabela_container_cabecalho_titulo">Ficha de avaliação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inscricoes as $inscricao)
                                        <tr>
                                            <th scope="row" id="tabela_container_linha"  style="text-align: center;">{{$inscricao->id}}</th>
                                            <td id="tabela_container_linha">{{ $inscricao->user->nome }}</td>
                                            <td id="tabela_container_linha">{{ $inscricao->vaga->nome }}</td>
                                            <td id="tabela_container_linha">
                                                {{ $inscricao->avaliacao->nota }}
                                            </td>
                                            <td id="tabela_container_linha">
                                                <a class="btn btn-primary" href="{{route('visualizar.ficha-avaliacao', $inscricao->avaliacao->id)}}" target="_new">
                                                    <div class="btn-group">
                                                        <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                                        <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                                    </div>
                                                </a>
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
                                    <img src="{{asset('img/img_default_meus_etapas.svg')}}" alt="Imagem default" width="190px">
                                    <h6 class="style_campo_titulo" style="margin-top: 20px;">Resultado final ainda não está disponível.</h6>
                                </div>
                            </div>
                        </div>
                    @endif    
                </div>
            </div>
        </div>
    </div>
@endsection