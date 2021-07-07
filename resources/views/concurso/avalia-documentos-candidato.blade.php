@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-4" style="margin-bottom: 2rem;">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">2º Fase: Documentos</h6>
                </div>
                <div class="card-body">
                    <div class="form-row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <h6 class="style_titulo_documento">
                                    Formação acadêmica
                                </h6>
                                <h6 class="style_subtitulo_documento">
                                    O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo 
                                    a ser o texto padrão usado por estas indústrias desde o ano de 1500.
                                </h6>
                                @if ($arquivos == null || $arquivos->formacao_academica == null)
                                    <div class="d-flex justify-content-left">
                                        <div>
                                            <a class="btn btn-primary">
                                                <div class="btn-group">
                                                    <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                                    <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                                </div>
                                            </a>
                                        </div>
                                        <div style="margin-left:10px">
                                            <h6 style="color: red">Documento ainda <br>não foi enviado.</h6>
                                        </div>
                                    </div>
                                @else
                                    <a class="btn btn-primary" href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Formacao-academica"])}}" target="_new">
                                        <div class="btn-group">
                                            <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                            <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top: 5px">
                            <div class="form-group">
                                <h6 class="style_titulo_documento">
                                    Experiência Didática
                                </h6>
                                <h6 class="style_subtitulo_documento">
                                    O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo 
                                    a ser o texto padrão usado por estas indústrias desde o ano de 1500.
                                </h6>
                                @if ($arquivos == null || $arquivos->experiencia_didatica == null)
                                    <div class="d-flex justify-content-left">
                                        <div>
                                            <a class="btn btn-primary">
                                                <div class="btn-group">
                                                    <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                                    <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                                </div>
                                            </a>
                                        </div>
                                        <div style="margin-left:10px">
                                            <h6 style="color: red">Documento ainda <br>não foi enviado.</h6>
                                        </div>
                                    </div>
                                @else
                                    <a class="btn btn-primary" href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Experiencia-didatica"])}}" target="_new">
                                        <div class="btn-group">
                                            <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                            <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top: 5px">
                            <div class="form-group">
                                <h6 class="style_titulo_documento">
                                    Produção Ciêntifica
                                </h6>
                                <h6 class="style_subtitulo_documento">
                                    O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo 
                                    a ser o texto padrão usado por estas indústrias desde o ano de 1500.
                                </h6>
                                @if ($arquivos == null || $arquivos->producao_cientifica == null)
                                    <div class="d-flex justify-content-left">
                                        <div>
                                            <a class="btn btn-primary">
                                                <div class="btn-group">
                                                    <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                                    <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                                </div>
                                            </a>
                                        </div>
                                        <div style="margin-left:10px">
                                            <h6 style="color: red">Documento ainda <br>não foi enviado.</h6>
                                        </div>
                                    </div>
                                @else
                                    <a class="btn btn-primary" href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Producao-cientifica"])}}" target="_new">
                                        <div class="btn-group">
                                            <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                            <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top: 5px">
                            <div class="form-group">
                                <h6 class="style_titulo_documento">
                                    Experiência Profissional
                                </h6>
                                <h6 class="style_subtitulo_documento">
                                    O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo 
                                    a ser o texto padrão usado por estas indústrias desde o ano de 1500.
                                </h6>
                                @if ($arquivos == null || $arquivos->experiencia_profissional == null)
                                    <div class="d-flex justify-content-left">
                                        <div>
                                            <a class="btn btn-primary">
                                                <div class="btn-group">
                                                    <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                                    <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                                </div>
                                            </a>
                                        </div>
                                        <div style="margin-left:10px">
                                            <h6 style="color: red">Documento ainda <br>não foi enviado.</h6>
                                        </div>
                                    </div>
                                @else
                                    <a class="btn btn-primary" href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Experiencia-profissional"])}}" target="_new">
                                        <div class="btn-group">
                                            <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                            <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Pontuação</h6>
                </div>
                <div class="card-body">
                    <div>
                        <div class="form-row ">
                            <div class="col-md-12">
                                <label for="formFileSm" class="form-label style_campo_titulo">Selecione o arquivo de pontuação</label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file" style="margin-left:-10px;margin-bottom:1rem; border:0px solid #fff"/>
                            </div>
                           <div class="col-md-12">
                                @if ($avaliacao)
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>A pontuação já foi salva. </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if ($arquivos == null)
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong> Só é possível enviar a pontuação quando os arquivos estiverem disponíveis. </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form>
                                        @csrf
                                @else
                                    <form method="POST" action="{{ route('avalia.documentos.inscricao', $arquivos->inscricoes_id) }}">
                                    @csrf
                                @endif
                                    <div class="form-row">
                                        <div class="col-md-12 form-group">
                                            <label for="nota" class="style_campo_titulo">Pontuação total</label>
                                            <input type="number" id="nota" name="nota" min="0" max="100"
                                                class="form-control style_campo" placeholder="Digite a pontuação do candidato" @if ($avaliacao)
                                                    value="{{ $avaliacao->nota }}"/>
                                                @else
                                                    value="{{ old('nota') }}"/>
                                                @endif 
                                        </div>
                                    </div>
                                    @if (!$avaliacao)
                                        <div class="form-row justify-content-end">
                                            <div class="col-md-12"><hr></div>
                                            <div class="col-md-6 form-group" style="margin-bottom: 9px;">
                                                <button type="submit" class="btn btn-success shadow-sm" style="width: 100%;">Enviar</button>
                                            </div>
                                        </div>
                                    @endif
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