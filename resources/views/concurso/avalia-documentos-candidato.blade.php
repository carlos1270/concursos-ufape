@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="@if($inscricao->concurso->users_id == auth()->user()->id) col-md-10 @elseif(auth()->user()->role == "presidenteBancaExaminadora") col-md-4 @endif" style="margin-bottom: 2rem;">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Etapa - Avaliação de Títulos</h6>
                    @if($inscricao->concurso->users_id == auth()->user()->id)
                        <a class="btn btn-primary" href="{{route('envio.documentos.inscricao', $inscricao->id)}}" style="margin-top: 10px;">Enviar documentos</a>
                        @if (!$arquivos)
                            <div class="d-flex justify-content-left">
                                <div>
                                    <a class="btn btn-primary">
                                        <div class="btn-group">
                                            <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                            <h6 style="margin-left: 5px; margin-top:1px; margin-bottom: 1px; color:#fff">Baixar documentos</h6>
                                        </div>
                                    </a>
                                </div>
                                <div style="margin-left:10px">
                                    <h6 style="color: red">Documentos ainda <br>não foram enviados.</h6>
                                </div>
                            </div>
                        @else
                            <a class="btn btn-primary" href="{{route('baixar.documentos.candidato', $inscricao->id)}}">
                                <div class="btn-group">
                                    <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                    <h6 style="margin-left: 5px; margin-top:1px; margin-bottom: 1px; color:#fff">Baixar documentos</h6>
                                </div>
                            </a>
                        @endif
                    @endif
                </div>
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
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h6 class="style_titulo_documento">
                                    Documentos Pessoais
                                </h6>
                                <h6>
                                    <ul style="margin-left: -20px;">
                                        <li>Carteira de Identidade ou do Documento de Identidade Profissional (Conselhos de Classes) ou da Carteira Nacional de Habilitação – CNH.</li>
                                        <li>Cópia autenticada do Passaporte ou de Cédula de Identidade de Estrangeiro, caso o candidato seja estrangeiro.</li>
                                        <li>Cartão do Cadastro de Pessoa Física - CPF (dispensado para o candidato estrangeiro).</li>
                                        <li>Certidão de quitação eleitoral (emitida pelo site do TRE ou cartório eleitoral).</li>
                                        <li>Documento comprobatório da quitação com serviço militar, para os candidatos do sexo masculino a partir de 1º dia de janeiro
                                            do ano em completar 18 (dezoito) anos de idade até 31 de dezembro do ano em que completar 45 (quarenta e cinco) anos.
                                        </li>
                                        <li>Documento oficial que comprove que o candidato não possui antecedentes criminais.</li>
                                        <li>Comprovante do pagamento da taxa de inscrição.</li>
                                        <li>Documento que comprove a formação na área/matéria conforme Edital Específico.
                                            A formação acadêmica pode ser comprovada através de cópias de documentos como: i) Certificado de Graduação e/ou
                                            Mestrado e/ou Doutorado conforme exigência para a vaga, emitido pela Instituição de Ensino Superior;
                                            ii) OU diploma de Graduação E/OU Mestrado E/OU Doutorado conforme exigência para a vaga,
                                            emitido pela Instituição de Ensino Superior.
                                        </li>
                                        <li>Histórico Escolar em que se verifique que o candidato cursou a disciplina objeto da seleção OU
                                            disciplina(s) equivalente(s) à matéria objeto da seleção.
                                        </li>
                                        <li>Declaração de Veracidade documental.</li>
                                    </ul>
                                </h6>
                                @if (!$arquivos || !$arquivos->dados_pessoais)
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
                                <h6>
                                    <ul style="margin-left: -20px;">
                                         <li>Cópia do Curriculum Vitae modelo Lattes com as devidas comprovações.
                                            Essas comprovações devem ser enviadas pelos arquivos abaixo.
                                        </li>
                                    </ul>
                                </h6>
                                @if (!$arquivos || !$arquivos->curriculum_vitae_lattes)
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
                                    <a class="btn btn-primary" href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Lattes"])}}" target="_new">
                                        <div class="btn-group">
                                            <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                            <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Baixar</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <h6 class="style_titulo_documento" style="color: black; margin-top: 5px;">
                                Documentos a serem pontuados na tabela de avaliação de títulos
                            </h6>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <h6 class="style_titulo_documento">
                                    Grupo I - Formação Acadêmica
                                </h6>
                                <h6>
                                    <ul style="margin-left: -20px;">
                                        <li>Graduação.</li>
                                        <li>Especialização.</li>
                                        <li>Mestrado.</li>
                                        <li>Doutorado em Programa reconhecido pelo CNE e credenciado pela CAPES.</li>
                                    </ul>
                                </h6>
                                @if (!$arquivos || !$arquivos->formacao_academica)
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
                                    Grupo II - Experiência Didática
                                </h6>
                                <h6>
                                    <ul style="margin-left: -20px;">
                                        <li>Tempo de exercício.</li>
                                        <li>Tempo de exercício como professor no Magistério Superior em Cursos a Distância.</li>
                                        <li>Participação em Bancas ou Comissões Examinadoras de Graduação e Pós-Graduação.</li>
                                        <li>Participação em Bancas ou Comissões Examinadoras de Seleção para o Magistério Superior.</li>
                                        <li>Orientação de Trabalhos Acadêmicos.</li>
                                        <li>Cursos ministrados (Extensão, Capacitação ou equivalentes na área da Seleção) / Para cada 10 horas.</li>
                                    </ul>
                                </h6>
                                @if (!$arquivos || !$arquivos->experiencia_didatica)
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
                                    Grupo III - Produção Científica
                                </h6>
                                <h6>
                                    <ul style="margin-left: -20px;">
                                        <li>Livros publicados.</li>
                                        <li>Capítulos de Livros publicados.</li>
                                        <li>Trabalhos publicados em Revistas e/ou periódicos de reconhecido valor científico ou cultural.</li>
                                        <li>Publicação de Livro Didático ou Material Didático na área da seleção com ISBN.</li>
                                        <li>Desenvolvimento de patentes com registro definitivo (carta patente).</li>
                                    </ul>
                                </h6>
                                @if (!$arquivos || !$arquivos->producao_cientifica)
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
                                    Grupo IV - Experiência Profissional
                                </h6>
                                <h6>
                                    <ul style="margin-left: -20px;">
                                        <li>Exercício de cargo ou função de Administração Acadêmica.</li>
                                        <li>Prêmios e Láureas acadêmicas.</li>
                                        <li>Bolsas de Pesquisa financiadas por Órgãos de Fomento (exceto Bolsas de Formação).</li>
                                        <li>Exercício Profissional extrauniversitário, com vínculo empregatício, em área relacionada à matéria da seleção.</li>
                                        <li>Consultorias relacionadas ao setor de estudos da Seleção.</li>
                                        <li>Projetos de pesquisa aprovados por Órgãos de Fomento.</li>
                                    </ul>
                                </h6>
                                @if (!$arquivos || !$arquivos->experiencia_profissional)
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

                        @if(auth()->user()->role == "chefeSetorConcursos")
                            <div class="col-md-12" style="margin-top: 15px">
                                <h6 class="style_titulo_documento">
                                    Avaliação do candidato
                                </h6>
                                <div class="form-row">
                                    <div class="col-md-12 form-group">
                                        <a href="{{route('baixar.anexo', ['name'=> 'Ficha_de_avaliacao.docx'])}}"  class="btn btn-success"
                                            target="_blank" style="color:white;">Baixar Ficha de avaliação</a>
                                    </div>
                                </div>
                                @if($inscricao->avaliacao && $inscricao->avaliacao->ficha_avaliacao)
                                    <a class="btn btn-primary" href="{{route('visualizar.ficha-avaliacao', $inscricao->avaliacao->id)}}" target="_new">
                                        <div class="btn-group">
                                            <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                            <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Arquivo de pontuação</h6>
                                        </div>
                                    </a>
                                @else
                                    <button class="btn btn-primary" href="#" disabled>
                                        <div class="btn-group">
                                            <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Avaliação não registrada.</h6>
                                        </div>
                                    </button>
                                @endif
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <label for="nota" class="style_campo_titulo" style="margin-top: 10px;">Pontuação total</label>
                                        @if($inscricao->avaliacao != null)
                                            <input type="number" step=any id="nota" name="nota" min="0" max="100"
                                            class="form-control style_campo" placeholder="Digite a pontuação do candidato"
                                            value="{{$inscricao->avaliacao->nota}}" disabled/>
                                        @else
                                            <input type="text" step=any id="nota" name="nota" min="0" max="100"
                                            class="form-control style_campo" placeholder="Digite a pontuação do candidato"
                                            value="Avaliação não registrada." disabled/>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if(auth()->user()->role != "chefeSetorConcursos")
            <div class="col-md-6">
                <div class="card shadow bg-white style_card_container">
                    <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                        <h6 class="style_card_container_header_titulo">Pontuação</h6>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="form-row">
                                <div class="col-md-12 form-group">
                                    <a href="{{route('baixar.anexo', ['name'=> 'Ficha_de_avaliacao.docx'])}}"  class="btn btn-success"
                                        target="_blank" style="color:white;">Baixar Ficha de avaliação</a>
                                </div>
                            </div>
                            @if (!$arquivos)
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong> Só é possível enviar a pontuação quando os arquivos estiverem disponíveis.</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @else
                                @if (date('Y-m-d', strtotime(now())) <= $inscricao->concurso->data_fim_envio_doc)
                                    <form method="POST" action="{{ route('avalia.documentos.inscricao', $arquivos->inscricoes_id) }}" enctype="multipart/form-data">
                                @else
                                    <form>
                                @endif
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            @if($inscricao->avaliacao && $inscricao->avaliacao->ficha_avaliacao)
                                                <a class="btn btn-primary" href="{{route('visualizar.ficha-avaliacao', $inscricao->avaliacao->id)}}" target="_new">
                                                    <div class="btn-group">
                                                        <img src="{{asset('img/icon_arquivo_download_branco.svg')}}" style="width:15px">
                                                        <h6 style="margin-left: 10px; margin-top:5px; color:#fff">Arquivo de pontuação</h6>
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                        @if(auth()->user()->role == "presidenteBancaExaminadora")
                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <label for="ficha_avaliacao" class="form-label style_campo_titulo">Selecione o arquivo de pontuação</label>
                                                <input type="file" accept=".pdf" class="form-control form-control-sm @error('ficha_avaliacao') is-invalid @enderror"
                                                    id="ficha_avaliacao" style="margin-left:-10px;margin-bottom:1rem; border:0px solid #fff"
                                                    name="ficha_avaliacao" @if ($inscricao->avaliacao && !$inscricao->avaliacao->ficha_avaliacao) required @endif/>
                                                @error('ficha_avaliacao')
                                                    <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endif
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="col-md-12 form-group">
                                                    <label for="nota" class="style_campo_titulo">Pontuação total</label>
                                                    <input type="number" step=any id="nota" name="nota" min="0" max="100"
                                                            class="form-control style_campo" placeholder="Digite a pontuação do candidato"
                                                        @if ($inscricao->avaliacao && !$inscricao->avaliacao->nota)
                                                            required
                                                        @endif
                                                        @if($inscricao->concurso->users_id == auth()->user()->id)
                                                            disabled
                                                        @endif
                                                        @if ($inscricao->avaliacao)
                                                            value="{{ $inscricao->avaliacao->nota }}"/>
                                                        @else
                                                            value="{{ old('nota') }}"/>
                                                        @endif
                                                </div>
                                            </div>
                                            @if(auth()->user()->role == "presidenteBancaExaminadora")
                                                <div class="form-row justify-content-center">
                                                    <div class="col-md-12"><hr></div>
                                                    <div class="col-md-6 form-group" style="margin-bottom: 2.5px;">
                                                        <button type="submit" class="btn btn-success shadow-sm" style="width: 100%;" id="submeterFormBotao">Enviar</button>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<script>
    $("input").change(function(){
        if(this.files[0].size > 2097152){
            alert("O arquivo deve ter no máximo 2MB!");
            this.value = "";
        };
    });
</script>
@endsection
