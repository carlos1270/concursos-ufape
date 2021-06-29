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
                            <table class="table table-bordered table-hover tabela_container">
                                <thead>
                                    <tr>
                                        <th scope="col" class="tabela_container_cabecalho_titulo">Posição</th>
                                        <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 50%;">Nome</th>
                                        <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 50%;">Vaga</th>
                                        <th scope="col" class="tabela_container_cabecalho_titulo">Data</th>
                                        <th scope="col" class="tabela_container_cabecalho_titulo">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inscricoes as $inscricao)
                                        <tr>
                                            <th scope="row" id="tabela_container_linha"  style="text-align: center;">{{$inscricao->id}}</th>
                                            <td id="tabela_container_linha">{{ $inscricao->user->nome }}</td>
                                            <td id="tabela_container_linha">{{ $inscricao->vagas->nome }}</td>
                                            <td id="tabela_container_linha">
                                                {{date('d/m/Y', strtotime($inscricao->created_at))}}
                                            </td>
                                            <td id="tabela_container_linha" style="text-align: center;">
                                                <div class="btn-group">
                                                    <div>
                                                        <button class="btn btn-primary" onclick ="location.href='{{ route('inscricao.candidato', ['inscricao' => $inscricao->id]) }}'">
                                                            Avaliar 1º Etapa
                                                        </button>
                                                    </div>
                                                </div>
                                                @if ($inscricao->status == "aprovado")
                                                    <div class="btn-group">
                                                        <div style="margin-left: 5px">
                                                            <button class="btn btn-primary" onclick ="location.href=''">
                                                                Avaliar 2º Etapa
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endif
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