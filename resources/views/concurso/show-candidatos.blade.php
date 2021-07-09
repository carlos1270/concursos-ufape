@extends('templates.template-principal')
@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
        <div class="form-row justify-content-center">
            <div class="col-md-11">
                <div class="card shadow bg-white style_card_container">
                    <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                        <h6 class="style_card_container_header_titulo">Candidatos</h6>
                    </div>
                    @if($inscricoes->count() > 0)
                        <div class="card-body">
                            @if(session('mensage'))
                                <div class="row">
                                    <div class="col-md-12" style="margin-top: 5px;">
                                        <div class="alert alert-success" role="alert">
                                            <p>{{session('mensage')}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="row">
                                    <div class="col-md-12" style="margin-top: 5px;">
                                        <div class="alert alert-success" role="alert">
                                            <p>{{session('success')}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <table class="table table-hover table-responsive-md">
                                <thead>
                                    <tr class="shadow-sm" style="border: 1px solid #dee2e6">
                                        <th scope="col" class="tabela_container_cabecalho_titulo">Posição</th>
                                        <th scope="col" class="tabela_container_cabecalho_titulo" style="text-align:left">Nome / Vaga</th>
                                        <th scope="col" class="tabela_container_cabecalho_titulo">Data e hora</th>
                                        <th scope="col" class="tabela_container_cabecalho_titulo" style="text-align:center">Status</th>
                                        <th scope="col" class="tabela_container_cabecalho_titulo">Avaliar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inscricoes as $inscricao)
                                        <tr>
                                            <th scope="row" id="tabela_container_linha"  style="text-align: center;">{{$inscricao->id}}</th>
                                            <td id="tabela_container_linha">
                                                <div class="form-group">
                                                    <h6 style="font-weight: normal;">{{ $inscricao->user->nome }}</h6>
                                                    <h6 style="font-weight: normal; color:#909090; font-style: italic; font-size:14px; margin-top:-5px">{{ $inscricao->vaga->nome }}</h6>
                                                </div>
                                            </td>
                                            <td id="tabela_container_linha" style="text-align: center">
                                                 {{$inscricao->created_at->format('d/m/Y - h:m:s')}}
                                            </td>
                                            <td id="tabela_container_linha" style="text-align: center">
                                                @if($inscricao->status == "aprovado")
                                                    <img src="{{asset('img/icon_aprovado_verde.svg')}}" alt="..." width="25px" data-toggle="tooltip" data-placement="top" title="Candidato aprovado">
                                                @elseif($inscricao->status == "reprovado")
                                                    <img src="{{asset('img/icon_reprovado_vermelho.svg')}}" alt="..." width="25px" data-toggle="tooltip" data-placement="top" title="Candidato reprovado"> 
                                                @elseif($inscricao->status == "Aguardando pagamento")
                                                    <img src="{{asset('img/icon_pagamento_pendente_colorido.svg')}}" alt="..." width="55px" data-toggle="tooltip" data-placement="top" title="Aguardando pagamento">  
                                                @else
                                                    <img src="{{asset('img/icon_pendente_colorido.svg')}}" alt="..." width="25px" data-toggle="tooltip" data-placement="top" title="Pendente"> 
                                                @endif
                                            </td>
                                            <td id="tabela_container_linha" style="text-align: center;">
                                                <div class="btn-group">
                                                    @if (Auth::user()->role == "admin" || Auth::user()->role == "chefeSetorConcursos")
                                                        <div class="btn-group">
                                                            <div>
                                                                @if ($inscricao->concurso->data_inicio_inscricao <= now() && now() <= $inscricao->concurso->data_fim_inscricao)
                                                                    <button class="btn btn-primary" onclick ="location.href='{{ route('candidato.inscricao', $inscricao->id) }}'">
                                                                        @if (Auth::user()->role == "admin")
                                                                            1º Etapa
                                                                        @else
                                                                            Avaliar
                                                                        @endif
                                                                    </button>
                                                                @else
                                                                    <button class="btn btn-primary" disabled>
                                                                        @if (Auth::user()->role == "admin")
                                                                            1º Etapa
                                                                        @else
                                                                            Avaliar
                                                                        @endif
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if (Auth::user()->role == "admin" || Auth::user()->role == "chefeSetorConcursos" ||Auth::user()->role == "presidenteBancaExaminadora")
                                                        @if ($inscricao->status == "aprovado")
                                                            <div class="btn-group">
                                                                <div style="margin-left: 5px">
                                                                    @if ($inscricao->concurso->data_inicio_envio_doc <= now() && now() <= $inscricao->concurso->data_fim_envio_doc)
                                                                        <button class="btn btn-primary" onclick ="location.href='{{ route('avalia.documentos.inscricao', $inscricao->id) }}'">
                                                                            @if (Auth::user()->role == "admin" || Auth::user()->role == "chefeSetorConcursos")
                                                                                2º Etapa
                                                                            @else
                                                                                Avaliar
                                                                            @endif
                                                                        </button>
                                                                    @else
                                                                        <button class="btn btn-primary" disabled>
                                                                            @if (Auth::user()->role == "admin" || Auth::user()->role == "chefeSetorConcursos")
                                                                                2º Etapa
                                                                            @else
                                                                                Avaliar
                                                                            @endif
                                                                        </button>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif  
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
                                    <img src="img/img_default_meus_inscricoes.svg" alt="Imagem default" width="190px">
                                    <h6 class="style_campo_titulo" style="margin-top: 20px;">Nenhum candiadato inscreveu-se para esse concurso.</h6>
                                </div>
                            </div>
                        </div>
                    @endif    
                </div>
            </div>
        </div>
    </div>
@endsection