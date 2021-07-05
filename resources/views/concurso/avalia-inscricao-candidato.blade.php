@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-9">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">{{ $inscricao->user->nome . ' ' . $inscricao->user->sobrenome }}</h6>
                </div>
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
                                            value="{{$inscricao->user->nome . ' ' . $inscricao->user->sobrenome}}" disabled/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <label for="nome_mae" class="style_campo_titulo">Nome do Pai </label>
                                        <input type="text" class="form-control style_campo" value="{{$candidato->nome_do_pai}}" disabled/>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="nome_mae" class="style_campo_titulo">Nome da Mãe </label>
                                        <input type="text" class="form-control style_campo" value="{{$candidato->nome_da_mae}}" disabled/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <label for="data_nascimento" class="style_campo_titulo">Data de Nascimento </label>
                                        <input type="date" class="form-control style_campo" value="{{$candidato->data_de_nascimento}}" disabled />
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <p for="estrangeiro" class="style_campo_titulo">Estrangeiro <span style="color: red; font-weight: bold;">*</span></p>
                                        <input type="radio" class="style_campo" id="sim" name="estrangeiro" placeholder="Digite o seu número" value="sim" disabled @if($candidato->estrangeiro) checked @endif/>
                                        <label for="sim">Sim</label>
                                        <input type="radio" class="style_campo" id="nao" name="estrangeiro" placeholder="Digite o seu número" value="não" disabled @if(!$candidato->estrangeiro) checked @endif/>
                                        <label for="nao">Não</label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <label for="rg" class="style_campo_titulo">@if($candidato->estrangeiro)Número do passaporte @else Documento de identificação @endif</label>
                                        <input type="text" class="form-control style_campo"  value="{{$candidato->documento_de_identificacao}}" disabled />
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="style_campo_titulo">Órgão emissor </label>
                                        <input type="text" class="form-control style_campo" value="{{$candidato->orgao_emissor}}" disabled/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <label class="style_campo_titulo">CPF </label>
                                        <input id="cpf" type="text" class="form-control style_campo" value="{{$candidato->cpf}}" disabled/>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="style_campo_titulo">E-mail </label>
                                        <input id="cpf" type="text" class="form-control style_campo" value="{{$inscricao->user->email}}" disabled/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <label class="style_campo_titulo">Telefone </label>
                                        <input id="cpf" type="text" class="form-control style_campo celular" value="{{$candidato->telefone}}" disabled/>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="style_campo_titulo">Celular </label>
                                        <input id="cpf" type="text" class="form-control style_campo celular" value="{{$candidato->celular}}" disabled/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h6 class="style_card_container_header_subtitulo">Endereço</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <label for="cep" class="style_campo_titulo">CEP </label>
                                        <input type="text" class="form-control style_campo" value="{{$endereco->cep}}" disabled/>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="estado" class="style_campo_titulo">Logradouro </label>
                                        <input type="text" class="form-control style_campo" value="{{$endereco->logradouro}}" disabled/>
                                    </div>
                                    
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <label for="bairro" class="style_campo_titulo">Bairro </label>
                                        <input type="text" class="form-control style_campo" value="{{$endereco->bairro}}" disabled/>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="rua" class="style_campo_titulo">Número </label>
                                        <input type="text" class="form-control style_campo" value="{{$endereco->numero}}" disabled/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <label for="cidade" class="style_campo_titulo">Cidade </label>
                                        <input type="text" class="form-control style_campo" value="{{$endereco->cidade}}" disabled/>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="estado" class="style_campo_titulo">Estado </label>
                                        <select name="" id="estado" class="form-control" disabled> 
                                            <option @if($endereco->uf == 'AC') selected @endif value="AC">Acre</option>
                                            <option @if($endereco->uf == 'AL') selected @endif value="AL">Alagoas</option>
                                            <option @if($endereco->uf == 'AP') selected @endif value="AP">Amapá</option>
                                            <option @if($endereco->uf == 'AM') selected @endif value="AM">Amazonas</option>
                                            <option @if($endereco->uf == 'BA') selected @endif value="BA">Bahia</option>
                                            <option @if($endereco->uf == 'CE') selected @endif value="CE">Ceará</option>
                                            <option @if($endereco->uf == 'DF') selected @endif value="DF">Distrito Federal</option>
                                            <option @if($endereco->uf == 'ES') selected @endif value="ES">Espírito Santo</option>
                                            <option @if($endereco->uf == 'GO') selected @endif value="GO">Goiás</option>
                                            <option @if($endereco->uf == 'MA') selected @endif value="MA">Maranhão</option>
                                            <option @if($endereco->uf == 'MT') selected @endif value="MT">Mato Grosso</option>
                                            <option @if($endereco->uf == 'MS') selected @endif value="MS">Mato Grosso do Sul</option>
                                            <option @if($endereco->uf == 'MG') selected @endif value="MG">Minas Gerais</option>
                                            <option @if($endereco->uf == 'PA') selected @endif value="PA">Pará</option>
                                            <option @if($endereco->uf == 'PB') selected @endif value="PB">Paraíba</option>
                                            <option @if($endereco->uf == 'PR') selected @endif value="PR">Paraná</option>
                                            <option @if($endereco->uf == 'PE') selected @endif value="PE">Pernambuco</option>
                                            <option @if($endereco->uf == 'PI') selected @endif value="PI">Piauí</option>
                                            <option @if($endereco->uf == 'RJ') selected @endif value="RJ">Rio de Janeiro</option>
                                            <option @if($endereco->uf == 'RN') selected @endif value="RN">Rio Grande do Norte</option>
                                            <option @if($endereco->uf == 'RS') selected @endif value="RS">Rio Grande do Sul</option>
                                            <option @if($endereco->uf == 'RO') selected @endif value="RO">Rondônia</option>
                                            <option @if($endereco->uf == 'RR') selected @endif value="RR">Roraima</option>
                                            <option @if($endereco->uf == 'SC') selected @endif value="SC">Santa Catarina</option>
                                            <option @if($endereco->uf == 'SP') selected @endif value="SP">São Paulo</option>
                                            <option @if($endereco->uf == 'SE') selected @endif value="SE">Sergipe</option>
                                            <option @if($endereco->uf == 'TO') selected @endif value="TO">Tocantins</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h6 class="style_card_container_header_subtitulo">Vaga Escolhida</h6>
                                    </div>
                                    
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <select id="vagas" name="vagas" class="form-control" required disabled>
                                            <option value=""></option>
                                            <option value="{{$inscricao->vaga->id}}" selected>{{$inscricao->vaga->nome}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h6 class="style_card_container_header_subtitulo">Issenção</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 form-group">
                                        <input id="isencao" type="checkbox" name="desejo_isencao" @if($inscricao->solicitou_isencao) checked @endif disabled>
                                        <label for="isencao">Solicito issenção da taxa de pagamento.</label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h6 class="style_card_container_header_subtitulo">Outras Informações</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                    <label for="cotista" class="style_campo_titulo">Sou declaradamente preto ou pardo e desejo concorrer à vaga reservada pela Lei no 12.990/2014, caso
                                        exista em Edital Específico. </label>
                                        <br>
                                        <input type="radio" @if($inscricao->cotista) checked @endif disabled>
                                        <label>Sim</label>
                                        <br>
                                        <input type="radio" @if(!$inscricao->cotista) checked @endif disabled>
                                        <label>Não</label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="pcd" class="style_campo_titulo">Portador de necessidades especiais </label>
                                        <br>
                                        <input type="radio" @if($inscricao->pcd) checked @endif disabled>
                                        <label>Sim</label>
                                        <br>
                                        <input type="radio" @if(!$inscricao->pcd) checked @endif disabled>
                                        <label>Não</label>
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-row">
                                    <div class="col-md-6 form-group" style="margin-bottom: 9px;">
                                        <button class="btn btn-danger shadow-sm" style="width: 100%;" 
                                            data-toggle="modal" data-target="#reprovar-candidato-{{$candidato->id}}">
                                            Reprovado
                                        </button>
                                    </div>
                                    <div class="col-md-6 form-group" style="margin-bottom: 9px;">
                                        <button class="btn btn-success shadow-sm" style="width: 100%;"
                                            data-toggle="modal" data-target="#aprovar-candidato-{{$candidato->id}}">
                                            Aprovado
                                        </button>
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

<div class="modal fade" id="reprovar-candidato-{{$candidato->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reprovar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-reprova-candidato-{{$candidato->id}}" method="POST" action="{{ route('aprovar-reprovar-candidato.inscricao', $inscricao->id) }}">
                    <input type="hidden" name="aprovar" value="false">
                    @csrf
                    Tem certeza que deseja reprovar o candidato {{  $inscricao->user->nome . ' ' . $inscricao->user->sobrenome }}?
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                <button type="submit" class="btn btn-danger" form="form-reprova-candidato-{{$candidato->id}}">Sim</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="aprovar-candidato-{{$candidato->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Aprovar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-aprova-candidato-{{$candidato->id}}" method="POST" action="{{ route('aprovar-reprovar-candidato.inscricao', $inscricao->id) }}">
                    <input type="hidden" name="aprovar" value="true">
                    @csrf
                    Tem certeza que deseja Aprovar o candidato {{  $inscricao->user->nome . ' ' . $inscricao->user->sobrenome }}?
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                <button type="submit" class="btn btn-success" form="form-aprova-candidato-{{$candidato->id}}">Sim</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function($) {
        $('#cpf').mask('000.000.000-00');
        var SPMaskBehavior = function(val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
                onKeyPress: function(val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };
        $('.celular').mask(SPMaskBehavior, spOptions);
        $('#cep').mask('00000-000');
    });
</script>
@endsection