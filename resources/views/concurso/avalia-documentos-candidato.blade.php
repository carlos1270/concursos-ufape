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
                                    Dados Pessoais
                                </h6>
                                <h6 class="style_subtitulo_documento">
                                    Carteira de Identidade ou do Documento de Identidade Profissional (Conselhos de Classes) ou da Carteira Nacional de Habilitação - CNH ou caso o candidato seja estrangeiro, cópia autenticada do Passaporte ou de Cédula de Identidade de Estrangeiro, 
                                    cartão do Cadastro de Pessoa Física - CPF (dispensado para o candidato estrangeiro), documento comprobatório da quitação com serviço militar, para os candidatos do sexo masculino a partir de 1º dia de janeiro do ano em completar 18 (dezoito) anos de idade até 31 de dezembro do ano em que completar 45 (quarenta e cinco) anos conforme Lei nº 4.375/1964,
                                    documento oficial que comprove que o candidato não possui antecedentes criminais.
                                </h6>
                                @if ($arquivos == null || $arquivos->dados_pessoais == null)
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
                                    <a class="btn btn-primary" href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Dados-pessoais"])}}" target="_new">
                                        <div class="btn-group">
                                            <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                            <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <h6 class="style_titulo_documento">
                                    Curriculum vitae modelo Lattes
                                </h6>
                                <h6 class="style_subtitulo_documento">
                                    Curriculum Vitae modelo Lattes com as devidas comprovações.
                                </h6>
                                @if ($arquivos == null || $arquivos->curriculum_vitae_lattes == null)
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
                                    <a class="btn btn-primary" href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "lattes"])}}" target="_new">
                                        <div class="btn-group">
                                            <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                            <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <h6 class="style_titulo_documento">
                                    Formação acadêmica
                                </h6>
                                <h6 class="style_subtitulo_documento">
                                    A formação acadêmica pode ser comprovada através de cópias de documentos como o certificado de Graduação e/ou Mestrado e/ou Doutorado conforme exigência para a vaga, emitido pela Instituição de Ensino Superior, ou diploma de Graduação E/OU Mestrado E/OU Doutorado conforme exigência para a vaga, emitido pela Instituição de Ensino Superior. 
                                    Tais documentos devem ser reconhecidos nacionalmente ou, se obtidos no exterior, devem ser devidamente revalidados e, se em língua estrangeira, devem estar traduzidos por tradutor juramentado. Caso o(a) candidato(a) ainda não possua algum dos documentos a que se refere a alínea “g”, poderá apresentar, para esta fase, declaração de provável conclusão expedida pela Instituição de Ensino de origem do(a) candidato(a), 
                                    conforme o caso, devendo constar expressamente na declaração a data da conclusão ou provável conclusão e o cumprimento integral das exigências para tal.
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
                                    Documentos escaneados que comprovem a experência didática do candidato.
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
                                    Documentos escaneados de produções científicas do candidato.
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
                                    Documentos escaneados que comprovam a experiência profissional do candidato.
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
                            @else
                                <form method="POST" action="{{ route('avalia.documentos.inscricao', $arquivos->inscricoes_id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="ficha_avaliacao" class="form-label style_campo_titulo">Selecione o arquivo de pontuação</label>
                                        @if($avaliacao != null && $avaliacao->ficha_avaliacao != null)
                                            <a class="btn btn-primary" href="{{route('visualizar.ficha-avaliacao', $avaliacao->id)}}" target="_new">
                                                <div class="btn-group">
                                                    <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                                    <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                                </div>
                                            </a>
                                        @endif
                                        <input type="file" class="form-control form-control-sm" id="ficha_avaliacao" 
                                            style="margin-left:-10px;margin-bottom:1rem; border:0px solid #fff" name="ficha_avaliacao"  required/>
                                        @error('ficha_avaliacao')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="col-md-12 form-group">
                                                <label for="nota" class="style_campo_titulo">Pontuação total</label>
                                                <input type="number" id="nota" name="nota" min="0" max="100"
                                                    class="form-control style_campo" placeholder="Digite a pontuação do candidato" 
                                                    @if ($avaliacao)
                                                        value="{{ $avaliacao->nota }}"/>
                                                    @else
                                                        value="{{ old('nota') }}"/>
                                                    @endif 
                                            </div>
                                        </div>
                                        @if (!$avaliacao)
                                            <div class="form-row justify-content-end">
                                                <div class="col-md-12"><hr></div>
                                                <div class="col-md-6 form-group" style="margin-bottom: 2.5px;">
                                                    <button type="submit" class="btn btn-success shadow-sm" style="width: 100%;">Enviar</button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>
@endsection