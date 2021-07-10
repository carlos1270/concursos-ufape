@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-9">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Enviar documentos da segunda fase</h6>
                </div>
                <div class="card-body">
                    <div>
                        @if ($inscricao->data_inicio_envio_doc <= now() && now() <= $inscricao->data_fim_envio_doc)
                            <form method="POST" style="" action="{{ route('save.documentos') }}" enctype="multipart/form-data">
                        @else
                            <form method="POST" enctype="multipart/form-data">
                        @endif
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="dados_pessoais" class="style_campo_titulo">Dados Pessoais</label>
                                    @if($arquivos != null) <a href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Dados-pessoais"])}}" target="_blank">Arquivo atual</a> @endif
                                    <input type="file" class="form-control style_campo" id="dados_pessoais" name="dados_pessoais"  required/>
                                    @error('dados_pessoais')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                    @if($arquivos != null)<small>Para substituir o arquivo atual envie um novo</small>@endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="curriculum_vitae_lattes" class="style_campo_titulo">Curriculum vitae modelo Lattes</label>
                                    @if($arquivos != null) <a href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Lattes"])}}" target="_blank">Arquivo atual</a> @endif
                                    <input type="file" class="form-control style_campo" id="curriculum_vitae_lattes" name="curriculum_vitae_lattes" required/>
                                    @error('curriculum_vitae_lattes')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                    @if($arquivos != null)<small>Para substituir o arquivo atual envie um novo</small>@endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="formacao_academica" class="style_campo_titulo">Formação Acadêmica</label>
                                    @if($arquivos != null) <a href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Formacao-academica"])}}" target="_blank">Arquivo atual</a> @endif
                                    <input type="file" class="form-control style_campo" id="formacao_academica" name="formacao_academica" required/>
                                    @error('formacao_academica')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                    @if($arquivos != null)<small>Para substituir o arquivo atual envie um novo</small>@endif
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="experiencia_didatica" class="style_campo_titulo">Experiência Didática</label>
                                    @if($arquivos != null && $arquivos->experiencia_didatica != null) <a href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Experiencia-didatica"])}}" target="_blank">Arquivo atual</a> @endif
                                    <input type="file" class="form-control style_campo" id="experiencia_didatica" name="experiencia_didatica"/>
                                    @error('experiencia_didatica')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                    @if($arquivos != null)<small>Para substituir o arquivo atual envie um novo</small>@endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label for="producao_cientifica" class="style_campo_titulo">Produção Científica</label>
                                    @if($arquivos != null && $arquivos->producao_cientifica != null) <a href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Producao-cientifica"])}}" target="_blank">Arquivo atual</a> @endif
                                    <input type="file" class="form-control style_campo" id="producao_cientifica" name="producao_cientifica"/>
                                    @error('producao_cientifica')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                    @if($arquivos != null)<small>Para substituir o arquivo atual envie um novo</small>@endif
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="experiencia_profissional" class="style_campo_titulo">Experiência Profissional</label> 
                                    @if($arquivos != null && $arquivos->experiencia_profissional != null) <a href="{{route('visualizar.arquivo', ['arquivo' => $arquivos->id, 'cod' => "Experiencia-profissional"])}}" target="_blank">Arquivo atual</a> @endif
                                    <input type="file" class="form-control style_campo" id="experiencia_profissional" name="experiencia_profissional"/>
                                    @error('experiencia_profissional')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                    @if($arquivos != null)<small>Para substituir o arquivo atual envie um novo</small>@endif
                                </div>
                            </div>

                            <input type="hidden" id="inscricao" name="inscricao" value="{{ $inscricao->id }}"/>

                            <div class="form-row justify-content-center">
                                <div class="col-md-6 form-group" style="margin-bottom: 4px;">
                                    @if ($inscricao->data_inicio_envio_doc <= now() && now() <= $inscricao->data_fim_envio_doc)
                                        <button type="submit" class="btn btn-success shadow-sm" style="width: 100%;">Enviar</button>
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
@endsection