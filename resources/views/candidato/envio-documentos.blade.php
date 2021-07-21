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
                                        Durante esta fase devem ser enviados os documentos escaneados marcados como obrigatórios, em formato PDF com tamanho máximo de 10MB por arquivo. 
                                        São de inteira e exclusiva responsabilidade do(a) candidato(a) as informações e a documentação por ele(a) fornecidas para a inscrição.
                                        As inscrições que não cumprirem integralmente as condições previstas neste Edital são indeferidas pela Comissão de Seleção e Admissão, designada pelo Colegiado do Programa.
                                    </h6>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="dados_pessoais" class="style_campo_titulo" style="color: black; font-weight: bolder;"><span style="color: red; font-weight: bold;">*</span> Dados Pessoais</label>
                                    @if($arquivos != null) <a href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Dados-pessoais"])}}" target="_blank"><img src="{{asset('img/file-pdf-solid.svg')}}" alt="arquivo atual" style="width: 16px;"></a> @endif
                                    <h6 class="style_subtitulo_documento" style="color: black">
                                        Carteira de Identidade ou do Documento de Identidade Profissional (Conselhos de Classes) ou da Carteira Nacional de Habilitação - CNH ou caso o candidato seja estrangeiro, cópia autenticada do Passaporte ou de Cédula de Identidade de Estrangeiro, 
                                        cartão do Cadastro de Pessoa Física - CPF (dispensado para o candidato estrangeiro), documento comprobatório da quitação com serviço militar, para os candidatos do sexo masculino a partir de 1º dia de janeiro do ano em completar 18 (dezoito) anos de idade até 31 de dezembro do ano em que completar 45 (quarenta e cinco) anos conforme Lei nº 4.375/1964,
                                        documento oficial que comprove que o candidato não possui antecedentes criminais.
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
                                        Curriculum Vitae modelo Lattes com as devidas comprovações.
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
                                        A formação acadêmica pode ser comprovada através de cópias de documentos como o certificado de Graduação e/ou Mestrado e/ou Doutorado conforme exigência para a vaga, emitido pela Instituição de Ensino Superior, ou diploma de Graduação E/OU Mestrado E/OU Doutorado conforme exigência para a vaga, emitido pela Instituição de Ensino Superior. 
                                        Tais documentos devem ser reconhecidos nacionalmente ou, se obtidos no exterior, devem ser devidamente revalidados e, se em língua estrangeira, devem estar traduzidos por tradutor juramentado. Caso o(a) candidato(a) ainda não possua algum dos documentos a que se refere a alínea “g”, poderá apresentar, para esta fase, declaração de provável conclusão expedida pela Instituição de Ensino de origem do(a) candidato(a), conforme o caso, devendo constar expressamente na declaração a data da conclusão ou provável conclusão e o cumprimento integral das exigências para tal.
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
                                        Documentos escaneados que comprovem a experência didática do candidato.
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
                                        Documentos escaneados de produções científicas do candidato.
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
                                        Documentos escaneados que comprovam a experiência profissional do candidato.
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