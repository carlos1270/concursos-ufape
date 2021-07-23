@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Enviar documentos da segunda fase</h6>
                    <h6 class="style_card_container_header_campo_obrigatorio"><span style="color: red; font-weight: bold;">*</span> Campo obrigatório</h6>
                </div>
                <div class="card-body">
                    <div>
                        <form action="{{route('documentos.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-1s2">
                                    <h6 style="text-align:justify;">
                                        Os documentos devem estar legíveis, devidamente escaneados e em PDF. As versões escaneadas devem
                                        ser enviadas em seis (06) arquivos, com tamanho máximo de cada arquivo: 2MB.
                                    </h6>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="dados_pessoais" class="style_campo_titulo" style="color: black; font-weight: bolder;"><span style="color: red; font-weight: bold;">*</span> Dados Pessoais</label>
                                    @if($arquivos != null) <a href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Dados-pessoais"])}}" target="_blank"><img src="{{asset('img/file-pdf-solid.svg')}}" alt="arquivo atual" style="width: 16px;"></a> @endif
                                    <h6 class="style_subtitulo_documento" style="color: black">
                                        <ul>
                                            <li>Carteira de Identidade ou do Documento de Identidade Profissional (Conselhos de Classes) ou da Carteira Nacional de Habilitação - CNH.</li>
                                            <li>Cópia autenticada do Passaporte ou de Cédula de Identidade de Estrangeiro, caso o candidato seja estrangeiro.</li>
                                            <li>Cartão do Cadastro de Pessoa Física - CPF (dispensado para o candidato estrangeiro).</li>
                                            <li>Certidão de quitação eleitoral (emitida pelo site do TRE ou cartório eleitoral).</li>
                                            <li>Documento comprobatório da quitação com serviço militar, para os candidatos do sexo masculino a partir de 1º dia de janeiro do ano em 
                                                completar 18 (dezoito) anos de idade até 31 de dezembro do ano em que completar 45 (quarenta e cinco) anos.
                                            </li>
                                            <li>Documento oficial que comprove que o candidato não possui antecedentes criminais.</li>
                                            <li>Comprovante do pagamento da taxa de inscrição.</li>
                                        </ul>
                                    </h6>
                                    <input type="file" accept=".pdf" class="form-control style_campo @error('dados_pessoais') is-invalid @enderror" 
                                        id="dados_pessoais" name="dados_pessoais" required/>
                                    @error('dados_pessoais')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if($arquivos != null)<small>Para substituir o arquivo atual envie um novo</small>@endif
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="curriculum_vitae_lattes" class="style_campo_titulo" style="color: black; font-weight: bolder;"><span style="color: red; font-weight: bold;">*</span> Curriculum vitae modelo Lattes</label>
                                    @if($arquivos != null) <a href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Lattes"])}}" target="_blank"><img src="{{asset('img/file-pdf-solid.svg')}}" alt="arquivo atual" style="width: 16px;"></a> @endif
                                    <h6 class="style_subtitulo_documento" style="color: black">
                                        <ul>
                                            <li>Curriculum Vitae modelo Lattes com as devidas comprovações(as comprovações devem ser enviadas nos pŕoximos arquivos).</li>
                                        </ul>
                                    </h6>
                                    <input type="file" accept=".pdf" class="form-control style_campo @error('curriculum_vitae_lattes') is-invalid @enderror" id="curriculum_vitae_lattes" 
                                        name="curriculum_vitae_lattes" required/>
                                    @error('curriculum_vitae_lattes')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if($arquivos != null)<small>Para substituir o arquivo atual envie um novo</small>@endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="formacao_academica" class="style_campo_titulo" style="color: black; font-weight: bolder;"><span style="color: red; font-weight: bold;">*</span> Formação Acadêmica</label>
                                    @if($arquivos != null) <a href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Formacao-academica"])}}" target="_blank"><img src="{{asset('img/file-pdf-solid.svg')}}" alt="arquivo atual" style="width: 16px;"></a> @endif
                                    <h6 class="style_subtitulo_documento" style="color: black">
                                        <ul>
                                            <li>Certificado/Diploma de Graduação e/ou Especialização e/ou Mestrado e/ou Doutorado conforme exigência para a vaga, emitido pela Instituição de Ensino Superior.</li>
                                        </ul>
                                    </h6>
                                    <input type="file" accept=".pdf" class="form-control style_campo @error('formacao_academica') is-invalid @enderror" 
                                        id="formacao_academica" name="formacao_academica" required/>
                                    @error('formacao_academica')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if($arquivos != null)<small>Para substituir o arquivo atual envie um novo</small>@endif
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="experiencia_didatica" class="style_campo_titulo" style="color: black; font-weight: bolder;">Experiência Didática</label>
                                    @if($arquivos != null) <a href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Experiencia-didatica"])}}" target="_blank"><img src="{{asset('img/file-pdf-solid.svg')}}" alt="arquivo atual" style="width: 16px;"></a> @endif
                                    <h6 class="style_subtitulo_documento" style="color: black">
                                        <ul>
                                            <li>Tempo de exercício.</li>
                                            <li>Tempo de exercício como professor no Magistério Superior em Cursos a Distância.</li>
                                            <li>Participação em Bancas ou Comissões Examinadoras de Graduação e Pós-Graduação.</li>
                                            <li>Participação em Bancas ou Comissões Examinadoras de Seleção para o Magistério Superior.</li>
                                            <li>Orientação de Trabalhos Acadêmicos.</li>
                                            <li>Cursos ministrados (Extensão, Capacitação ou equivalentes na área da Seleção) / Para cada 10 horas</li>
                                        </ul>
                                    </h6>
                                    <input type="file" accept=".pdf" class="form-control style_campo @error('experiencia_didatica') is-invalid @enderror" 
                                        id="experiencia_didatica" name="experiencia_didatica"/>
                                    @error('experiencia_didatica')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if($arquivos != null)<small>Para substituir o arquivo atual envie um novo</small>@endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 form-group">
                                    <label for="producao_cientifica" class="style_campo_titulo" style="color: black; font-weight: bolder;">Produção Científica</label> 
                                    @if($arquivos != null) <a href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Producao-cientifica"])}}" target="_blank"><img src="{{asset('img/file-pdf-solid.svg')}}" alt="arquivo atual" style="width: 16px;"></a> @endif
                                    <h6 class="style_subtitulo_documento" style="color: black">
                                        <ul>
                                            <li>Livros publicados.</li>
                                            <li>Capítulos de Livros publicados.</li>
                                            <li>Trabalhos publicados em Revistas e/ou periódicos de reconhecido valor científico ou cultural.</li>
                                            <li>Publicação de Livro Didático ou Material Didático na área da seleção com ISBN.</li>
                                            <li>Desenvolvimento de patentes com registro definitivo (carta patente).</li>
                                        </ul>
                                    </h6>
                                    <input type="file" accept=".pdf" class="form-control style_campo @error('producao_cientifica') is-invalid @enderror" 
                                        id="producao_cientifica" name="producao_cientifica"/>
                                    @error('producao_cientifica')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if($arquivos != null)<small>Para substituir o arquivo atual envie um novo</small>@endif
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="experiencia_profissional" class="style_campo_titulo" style="color: black; font-weight: bolder;">Experiência Profissional</label> 
                                    @if($arquivos != null) <a href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Experiencia-profissional"])}}" target="_blank"><img src="{{asset('img/file-pdf-solid.svg')}}" alt="arquivo atual" style="width: 16px;"></a> @endif
                                    <h6 class="style_subtitulo_documento" style="color: black">
                                        <ul>
                                            <li>Exercício de cargo ou função de Administração Acadêmica.</li>
                                            <li>Prêmios e Láureas acadêmicas.</li>
                                            <li>Bolsas de Pesquisa financiadas por Órgãos de Fomento (exceto Bolsas de Formação)</li>
                                            <li>Exercício Profissional extrauniversitário, com vínculo empregatício, em área relacionada à matéria da seleção.</li>
                                            <li>Consultorias relacionadas ao setor de estudos da Seleção.</li>
                                            <li>Projetos de pesquisa aprovados por Órgãos de Fomento.</li>
                                        </ul>
                                    </h6>
                                    <input type="file" accept=".pdf" class="form-control style_campo @error('experiencia_profissional') is-invalid @enderror" 
                                        id="experiencia_profissional" name="experiencia_profissional"/>
                                    @error('experiencia_profissional')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if($arquivos != null)<small>Para substituir o arquivo atual envie um novo</small>@endif
                                </div>
                            </div>

                            <input type="hidden" id="inscricao" name="inscricao" value="{{ $inscricao->id }}"/>
                            <div><hr></div>
                            <div class="form-row justify-content-center">
                                <div class="col-md-6 form-group" style="margin-bottom: 4px;">
                                    @if ($inscricao->data_inicio_envio_doc <= date('Y-m-d', strtotime(now())) && date('Y-m-d', strtotime(now())) >= $inscricao->data_fim_envio_doc)
                                        <button type="submit" class="btn btn-success shadow-sm" style="width: 100%;">
                                            Enviar
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>   
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