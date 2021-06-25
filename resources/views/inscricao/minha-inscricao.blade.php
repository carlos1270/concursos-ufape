@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-9">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Formulário de inscrição</h6>
                    <h6 class="style_card_container_header_campo_obrigatorio"> Campo obrigatório</h6></div>
                <div class="card-body">
                    <div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <h6 class="style_card_container_header_subtitulo">Informações pessoais</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-row">
                                    <div class="col-md-12 form-group">
                                        <label class="style_campo_titulo">Nome Completo</label>
                                        <input type="text" class="form-control style_campo" 
                                            value="{{ Auth::user()->nome . ' ' . Auth::user()->sobrenome }}" disabled/>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <label for="sexo" class="style_campo_titulo">Sexo </label>
                                        <select class="custom-select">
                                            @if($candidato->sexo == "masculino")
                                                <option selected>Masculino</option>
                                            @else
                                                @if ($candidato->sexo == "feminino")
                                                    <option selected>Feminino</option>
                                                @else
                                                    <option selected>Outros</option>
                                                @endif
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="data_nascimento" class="style_campo_titulo">Data de Nascimento </label>
                                        <input type="date" class="form-control style_campo" value="{{ $candidato->data_nascimento }}" disabled />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 form-group">
                                        <label for="rg" class="style_campo_titulo">RG </label>
                                        <input type="text" class="form-control style_campo"  value="{{ $candidato->rg }}" disabled />
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="style_campo_titulo">CPF </label>
                                        <input type="text" class="form-control style_campo" value="{{ $candidato->cpf }}" disabled/>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="pis" class="style_campo_titulo">PIS </label>
                                        <input type="text" class="form-control style_campo" value="{{ $candidato->pis }}" disabled/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 form-group">
                                        <label for="nome_mae" class="style_campo_titulo">Nome da Mãe </label>
                                        <input type="text" class="form-control style_campo" value="{{ $candidato->nome_mae }}" disabled/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h6 class="style_card_container_header_subtitulo">Endereço</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 form-group">
                                        <label for="cep" class="style_campo_titulo">CEP </label>
                                        <input type="text" class="form-control style_campo" value="{{ $endereco->cep }}" disabled/>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="estado" class="style_campo_titulo">Estado </label>
                                        <input type="text" class="form-control style_campo" value="{{ $endereco->estado }}" disabled/>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="cidade" class="style_campo_titulo">Cidade </label>
                                        <input type="text" class="form-control style_campo" value="{{ $endereco->cidade }}" disabled/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 form-group">
                                        <label for="bairro" class="style_campo_titulo">Bairro </label>
                                        <input type="text" class="form-control style_campo" value="{{ $endereco->bairro }}" disabled/>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <label for="rua" class="style_campo_titulo">Rua </label>
                                        <input type="text" class="form-control style_campo" value="{{ $endereco->rua }}" disabled/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h6 class="style_card_container_header_subtitulo">Contato</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <label class="style_campo_titulo">Celular </label>
                                        <input type="text" class="form-control style_campo"
                                            value="{{ $candidato->celular }}" disabled/>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="style_campo_titulo">E-mail </label>
                                        <input type="text" class="form-control style_campo"
                                            value="{{ Auth::user()->email }}" disabled/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h6 class="style_card_container_header_subtitulo">Vaga Escolhida</h6>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <select id="vagas" name="vagas" class="custom-select" required>
                                            <option selected>{{ $inscricao->vagas->nome }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h6 class="style_card_container_header_subtitulo">Outras Informações</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 form-group">
                                        <label for="area_conhecimento" class="style_campo_titulo">Área de Conhecimento </label>
                                        <input type="text" class="form-control style_campo"
                                            value="{{ $inscricao->area_conhecimento }}" disabled/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="titulacao" class="style_campo_titulo">Selecione a sua titulação </label>
                                    <div class="col-md-12">
                                        @if ($inscricao->titulacao == "graduacao")
                                            <input type="radio" checked>
                                            <label>Graduação</label>
                                        @else
                                            @if ($inscricao->titulacao == "especializacao")
                                                <input type="radio" checked>
                                                <label>Especialização</label>
                                            @else
                                                @if ($inscricao->titulacao == "mestrado")
                                                    <input type="radio" checked>
                                                    <label>Mestrado</label>
                                                @else
                                                    <input type="radio" checked>
                                                    <label>Doutorado</label>
                                                @endif
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="cotista" class="style_campo_titulo">Sou declaradamente preto ou pardo e desejo concorrer à vaga reservada pela Lei no 12.990/2014, caso
                                        exista em Edital Específico. </label>
                                    <div class="col-md-12">
                                        @if ($inscricao->cotista)
                                            <input type="radio" checked>
                                            <label>Sim</label>
                                        @else
                                            <input type="radio" checked>
                                            <label>Não</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="pcd" class="style_campo_titulo">Portador de necessidades especiais </label>
                                    <div class="col-md-12">
                                        @if ($inscricao->pcd)
                                            <input type="radio" checked>
                                            <label>Sim</label>
                                        @else
                                            <input type="radio" checked>
                                            <label>Não</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h6 class="style_card_container_header_subtitulo">Informações adicionais</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection