@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-9">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Formulário de inscrição</h6>
                    <h6 class="style_card_container_header_campo_obrigatorio"><span style="color: red; font-weight: bold;">*</span> Campo obrigatório</h6></div>
                <div class="card-body">
                    <div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <h6 class="style_card_container_header_subtitulo">Informações pessoais</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('save.inscricao') }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-12 form-group">
                                            <label class="style_campo_titulo">Nome Completo</label>
                                            <input type="text" class="form-control style_campo"
                                                value="{{ Auth::user()->nome . ' ' . Auth::user()->sobrenome }}" disabled/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <h6 class="style_card_container_header_subtitulo">Escolha a Vaga</h6>
                                        </div>
                                    </div>
                                    <div  class="form-row">
                                        <div class="col-md-12 form-group">
                                            <label for="vagas">Opção <span style="color: red; font-weight: bold;">*</span></label>
                                            <select id="vagas" name="vaga" class="custom-select" required>
                                                <option value="" selected disabled>Selecione...</option>
                                                @foreach ($vagas as $vaga)
                                                    <option value="{{ $vaga->id }}">{{ $vaga->nome }}</option>
                                                @endforeach
                                            </select>
                                            @error('vaga')
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <h6 class="style_card_container_header_subtitulo">Isenção</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <input id="isencao" type="checkbox" name="desejo_isencao" @if(old('desejo_isencao') != null && old('desejo_isencao')) selected @endif>
                                            <label for="isencao">Solicitar isenção - Declaro atender às condições estabelecidas no edital.</label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <h6 class="style_card_container_header_subtitulo">Inscrição</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <label for="cotista" class="style_campo_titulo">Sou declaradamente preto ou pardo e desejo concorrer à vaga reservada pela Lei no 12.990/2014, caso
                                                exista em Edital Específico. <span style="color: red; font-weight: bold;">*</span></label>
                                            @error('cotista')
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <br>
                                            <input type="radio" id="cotista-false" name="cotista" value="false" required>
                                            <label for="cotista-false">Não</label>
                                            <br>
                                            <input type="radio" id="cotista-true" name="cotista" value="true" required>
                                            <label for="cotista-true">Sim</label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <label for="pcd" class="style_campo_titulo">Portador de necessidades especiais? <span style="color: red; font-weight: bold;">*</span></label>
                                            @error('pcd')
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <br>
                                            <input type="radio" id="pcd-false" name="pcd" value="false" required>
                                            <label for="pcd-false">Não</label>
                                            <br>
                                            <input type="radio" id="pcd-true" name="pcd" value="true" required>
                                            <label for="pcd-true">Sim</label>
                                        </div>
                                   </div>
                                    <hr/>
                                    <div class="form-row">
                                        <div class="col-md-6 form-group" style="margin-bottom: 9px;">
                                        </div>
                                        <div class="col-md-6 form-group" style="margin-bottom: 9px;">
                                            <button type="submit" class="btn btn-success shadow-sm" style="width: 100%;" onclick="this.disabled=true;this.form.submit();">Enviar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function($) {
        $('#cpf').mask('000.000.000-00');
        $('#rg').mask('00.000.000');
        $('#cep').mask('00000-000');
        $('#pis').mask('000.00000-00-0');
        var SPMaskBehavior = function(val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
                onKeyPress: function(val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };
        $('#celular').mask(SPMaskBehavior, spOptions);
    });
</script>
@endsection
