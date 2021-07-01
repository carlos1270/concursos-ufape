@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-11">
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
                                    <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 100%;">Status</th>
                                    <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 100%;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inscricoes as $inscricao)
                                    <tr>
                                        <td id="tabela_container_linha">{{ $inscricao->concurso->titulo }}</td>
                                        <td id="tabela_container_linha">{{ $inscricao->vaga->nome }}</td>
                                        <td id="tabela_container_linha">{{ $inscricao->status }}</td>
                                        <td id="tabela_container_linha" style="text-align: center;">
                                            <div class="btn-group">
                                                <div>
                                                    <button class="btn btn-primary" 
                                                        onclick ="location.href='{{ route('minha.inscricao', ['inscricao' => $inscricao->id]) }}'">
                                                        <img src="{{ asset('img/icon_visualizar.svg') }}" alt="Visualizar concurso" width="26px" >
                                                    </button>
                                                </div>
                                                @if (/*$inscricao->data_inicio_envio_doc <= now() && now() <= $inscricao->data_fim_envio_doc 
                                                        &&*/ $inscricao->status == "aprovado")
                                                    <button class="btn btn-light" style="margin-left: 5px" 
                                                        onclick ="location.href='{{ route('envio.documentos') }}'">
                                                        <img src="{{asset('img/file-download-solid.svg')}}" alt="" width="26px" >
                                                    </button>
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
                                <img src="img/img_default_meus_concursos.svg" alt="Imagem default" width="190px">
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