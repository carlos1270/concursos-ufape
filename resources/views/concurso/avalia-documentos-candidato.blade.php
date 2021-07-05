@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Documentos</h6>
                </div>
                <div class="card-body">
                    <div>
                        <div class="form-row ">
                            <div class="form-group col-md-6">
                                @if ($arquivos == null || $arquivos->formacao_academica == null)
                                    <a class="btn btn-light">
                                        <img class="" src="{{asset('img/file-download-solid.svg')}}" style="width:20px"><br>
                                        Formação Acadêmica(Documento ainda não enviado)
                                    </a>
                                @else
                                    <a class="btn btn-light" href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Formacao-academica"])}}" target="_new">
                                        <img class="" src="{{asset('img/file-download-solid.svg')}}" style="width:20px"><br>
                                        Formação Acadêmica
                                    </a>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                @if ($arquivos == null || $arquivos->experiencia_didatica == null)
                                    <a class="btn btn-light">
                                        <img class="" src="{{asset('img/file-download-solid.svg')}}" style="width:20px"><br>
                                        Experiência Didática(Documento ainda não enviado)
                                    </a>
                                @else
                                    <a class="btn btn-light" href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Experiencia-didatica"])}}" target="_new">
                                        <img class="" src="{{asset('img/file-download-solid.svg')}}" style="width:20px"><br>
                                        Experiência Didática
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="col-md-6 form-group">
                                @if ($arquivos == null || $arquivos->producao_cientifica == null)
                                    <a class="btn btn-light">
                                        <img class="" src="{{asset('img/file-download-solid.svg')}}" style="width:20px"><br>
                                        Produção Ciêntifica(Documento ainda não enviado)
                                    </a>
                                @else
                                    <a class="btn btn-light" href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Producao-cientifica"])}}" target="_new">
                                        <img class="" src="{{asset('img/file-download-solid.svg')}}" style="width:20px"><br>
                                        Produção Ciêntifica
                                    </a>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                @if ($arquivos == null || $arquivos->experiencia_profissional == null)
                                    <a class="btn btn-light">
                                        <img class="" src="{{asset('img/file-download-solid.svg')}}" style="width:20px"><br>
                                        Experiência Profissional(Documento ainda não enviado)
                                    </a>
                                @else
                                    <a class="btn btn-light" href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Experiencia-profissional"])}}" target="_new">
                                        <img class="" src="{{asset('img/file-download-solid.svg')}}" style="width:20px"><br>
                                        Experiência Profissional
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Pontuação</h6>
                </div>
                <div class="card-body">
                    <div>
                        <div class="form-row ">
                           <div class="col-md-12">
                                @if ($avaliacao)
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong> A pontuação já foi salva. </strong>
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
                                        <div class="col-md-6 form-group">
                                            <label for="nota" class="style_campo_titulo">Pontuação Total</label>
                                            <input type="number" id="nota" name="nota" min="0" max="100"
                                                class="form-control style_campo" @if ($avaliacao)
                                                    value="{{ $avaliacao->nota }}"/>
                                                @else
                                                    value="{{ old('nota') }}"/>
                                                @endif 
                                        </div>
                                    </div>
                                    @if (!$avaliacao)
                                        <div class="form-row justify-content-center">
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