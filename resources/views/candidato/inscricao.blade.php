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
                                        <div class="col-md-6 form-group">
                                            <label for="sexo" class="style_campo_titulo">Sexo <span style="color: red; font-weight: bold;">*</span></label>
                                            <select id="sexo" name="sexo" class="custom-select" required>
                                                <option selected>Selecione...</option>
                                                <option value="masculino">Masculino</option>
                                                <option value="feminino">Feminino</option>
                                                <option value="outros">Outros</option>
                                            </select>
                                            @error('sexo')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="data_nascimento" class="style_campo_titulo">Data de Nascimento <span style="color: red; font-weight: bold;">*</span></label>
                                            <input type="date" class="form-control style_campo" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento') }}" required />
                                            @error('data_nascimento')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 form-group">
                                            <label for="rg" class="style_campo_titulo">RG <span style="color: red; font-weight: bold;">*</span></label>
                                            <input type="text" class="form-control style_campo" id="rg" name="rg" 
                                                placeholder="Digite o RG" value="{{ old('rg') }}" required />
                                            @error('rg')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="style_campo_titulo">CPF <span style="color: red; font-weight: bold;">*</span></label>
                                            <input type="text" class="form-control style_campo" value="{{ $candidato->cpf }}" disabled/>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="pis" class="style_campo_titulo">PIS <span style="color: red; font-weight: bold;">*</span></label>
                                            <input type="text" class="form-control style_campo" id="pis" name="pis" 
                                                placeholder="Digite o PIS" value="{{ old('pis') }}" required />
                                            @error('pis')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 form-group">
                                            <label for="nome_mae" class="style_campo_titulo">Nome da Mãe <span style="color: red; font-weight: bold;">*</span></label>
                                            <input type="text" class="form-control style_campo" id="nome_mae" name="nome_mae"
                                                placeholder="Digite o nome da sua mãe" value="{{ old('nome_mae') }}" required autofocus autocomplete="nome_mae"/>
                                            @error('nome_mae')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <h6 class="style_card_container_header_subtitulo">Endereço</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 form-group">
                                            <label for="cep" class="style_campo_titulo">CEP <span style="color: red; font-weight: bold;">*</span></label>
                                            <input type="text" class="form-control style_campo" id="cep" name="cep"
                                                placeholder="Digite o cep" value="{{ old('cep') }}" required autofocus autocomplete="cep"/>
                                            @error('cep')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="estado" class="style_campo_titulo">Estado <span style="color: red; font-weight: bold;">*</span></label>
                                            <input type="text" class="form-control style_campo" id="estado" name="estado"
                                                placeholder="" value="{{ old('estado') }}" required autofocus autocomplete="estado"/>
                                            @error('estado')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="cidade" class="style_campo_titulo">Cidade <span style="color: red; font-weight: bold;">*</span></label>
                                            <input type="text" class="form-control style_campo" id="cidade" name="cidade"
                                                placeholder="" value="{{ old('cidade') }}" required autofocus autocomplete="cidade"/>
                                            @error('cidade')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 form-group">
                                            <label for="bairro" class="style_campo_titulo">Bairro <span style="color: red; font-weight: bold;">*</span></label>
                                            <input type="text" class="form-control style_campo" id="bairro" name="bairro"
                                                placeholder="Digite o bairro" value="{{ old('bairro') }}" required autofocus autocomplete="bairro"/>
                                            @error('bairro')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <label for="rua" class="style_campo_titulo">Rua <span style="color: red; font-weight: bold;">*</span></label>
                                            <input type="text" class="form-control style_campo" id="rua" name="rua"
                                                placeholder="Digite o rua" value="{{ old('rua') }}" required autofocus autocomplete="rua"/>
                                            @error('rua')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <h6 class="style_card_container_header_subtitulo">Contato</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 form-group">
                                            <label class="style_campo_titulo">Celular <span style="color: red; font-weight: bold;">*</span></label>
                                            <input type="text" class="form-control style_campo"
                                                value="{{ $candidato->celular }}" disabled/>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="style_campo_titulo">E-mail <span style="color: red; font-weight: bold;">*</span></label>
                                            <input type="text" class="form-control style_campo"
                                                value="{{ Auth::user()->email }}" disabled/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <h6 class="style_card_container_header_subtitulo">Escolha a Vaga</h6>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <select id="vagas" name="vagas" class="custom-select" required>
                                                <option selected>Selecione...</option>
                                                @foreach ($vagas as $vaga)
                                                    <option value="{{ $vaga->id }}">{{ $vaga->nome }}</option>
                                                @endforeach
                                            </select>
                                            @if(Session::has('vagas'))
                                                <span style="color: red">{{ Session::get('vagas') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <h6 class="style_card_container_header_subtitulo">Outras Informações</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 form-group">
                                            <label for="area_conhecimento" class="style_campo_titulo">Área de Conhecimento <span style="color: red; font-weight: bold;">*</span></label>
                                            <input type="text" class="form-control style_campo" id="area_conhecimento" name="area_conhecimento"
                                                placeholder="Digite a área de conhecimento" value="{{ old('area_conhecimento') }}" required/>
                                            @error('area_conhecimento')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <label for="titulacao" class="style_campo_titulo">Selecione a sua titulação <span style="color: red; font-weight: bold;">*</span></label>
                                        @error('titulacao')
                                            <div class="form-row col-md-12">
                                                <span style="color: red">{{ $message }}</span>
                                            </div>
                                        @enderror
                                        <div class="col-md-12">
                                            <input type="radio" id="titulacao-graduacao" name="titulacao" value="graduacao">
                                            <label for="titulacao-graduacao">Graduação</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="radio" id="titulacao-especializacao" name="titulacao" value="especializacao">
                                            <label for="titulacao-especializacao">Especialização</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="radio" id="titulacao-mestrado" name="titulacao" value="mestrado">
                                            <label for="titulacao-mestrado">Mestrado</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="radio" id="titulacao-doutorado" name="titulacao" value="doutorado">
                                            <label for="titulacao-doutorado">Doutorado</label>
                                        </div>
                                    </div>
                                   <div class="form-row">
                                        <label for="cotista" class="style_campo_titulo">Sou declaradamente preto ou pardo e desejo concorrer à vaga reservada pela Lei no 12.990/2014, caso
                                            exista em Edital Específico. <span style="color: red; font-weight: bold;">*</span></label>
                                        @error('cotista')
                                            <div class="form-row col-md-12">
                                                <span style="color: red">{{ $message }}</span>
                                            </div>
                                        @enderror
                                        <div class="col-md-12">
                                            <input type="radio" id="cotista-false" name="cotista" value="false">
                                            <label for="cotista-false">Não</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="radio" id="cotista-true" name="cotista" value="true">
                                            <label for="cotista-true">Sim</label>
                                        </div>
                                   </div>
                                   <div class="form-row">
                                        <label for="pcd" class="style_campo_titulo">Portador de necessidades especiais <span style="color: red; font-weight: bold;">*</span></label>
                                        @error('pcd')
                                            <div class="form-row col-md-12">
                                                <span style="color: red">{{ $message }}</span>
                                            </div>
                                        @enderror
                                        <div class="col-md-12">
                                            <input type="radio" id="pcd-false" name="pcd" value="false">
                                            <label for="pcd-false">Não</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="radio" id="pcd-true" name="pcd" value="true">
                                            <label for="pcd-true">Sim</label>
                                        </div>
                                   </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <h6 class="style_card_container_header_subtitulo">Informações Adicionais</h6>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="form-row">
                                        <div class="col-md-6 form-group" style="margin-bottom: 9px;">
                                            <button class="btn btn-primary shadow-sm" style="width: 100%;">Salvar formulário para continuar depois</button>
                                        </div>
                                        <div class="col-md-6 form-group" style="margin-bottom: 9px;">
                                            <button type="submit" class="btn btn-success shadow-sm" style="width: 100%;">Enviar</button>
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