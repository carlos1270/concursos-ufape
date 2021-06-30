@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Cadastre-se</h6>
                    <h6 class="style_card_container_header_campo_obrigatorio"><span style="color: red; font-weight: bold;">*</span> Campo obrigatório</h6></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12">
                                <h6 class="style_card_container_header_subtitulo">Acesso ao sistema</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label for="email" class="style_campo_titulo">E-mail <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="email" class="form-control style_campo @error('email') is-invalid @enderror" id="email" name="email"
                                    placeholder="Digite seu e-mail" value="{{ old('email') }}" required />
                                @error('email')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="password" class="style_campo_titulo">Senha <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="password" class="form-control style_campo @error('password') is-invalid @enderror" id="password" name="password"
                                    placeholder="Digite sua senha" required autocomplete="new-password"/>
                                @error('password')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="password_confirmation" class="style_campo_titulo">Confirmar senha <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="password" class="form-control style_campo" id="password_confirmation" name="password_confirmation"
                                    placeholder="Confirme sua senha" required autocomplete="new-password" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <h6 class="style_card_container_header_subtitulo">Informações pessoais</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="nome" class="style_campo_titulo">Nome <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="text" class="form-control style_campo @error('nome') is-invalid @enderror" id="nome" name="nome"
                                    placeholder="Digite seu nome" value="{{ old('nome') }}" required autofocus autocomplete="nome"/>
                                @error('nome')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="sobrenome" class="style_campo_titulo">Sobrenome <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="text" class="form-control style_campo @error('sobrenome') is-invalid @enderror" id="sobrenome" name="sobrenome"
                                    value="{{ old('sobrenome') }}" placeholder="Digite seu sobrenome" required />
                                @error('sobrenome')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="nome_do_pai" class="style_campo_titulo">Nome do pai</label>
                                <input type="text" class="form-control style_campo @error('nome_do_pai') is-invalid @enderror" id="nome_do_pai" name="nome_do_pai"
                                    placeholder="Digite o nome de seu pai" value="{{ old('nome_do_pai') }}" />
                                @error('nome_do_pai')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="nome_da_mãe" class="style_campo_titulo">Nome do mãe <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="text" class="form-control style_campo @error('nome_da_mãe') is-invalid @enderror" id="nome_da_mãe" name="nome_da_mãe"
                                    placeholder="Digite o nome da sua mãe" value="{{ old('nome_da_mãe') }}" required />
                                @error('nome_da_mãe')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="data_de_nascimento" class="style_campo_titulo">Data de nascimento </label>
                                <input type="date" class="form-control style_campo @error('data_de_nascimento') is-invalid @enderror" id="data_de_nascimento" name="data_de_nascimento"
                                    placeholder="Digite seu CPF" value="{{ old('data_de_nascimento') }}" />
                                @error('data_de_nascimento')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <p for="estrangeiro" class="style_campo_titulo">Estrangeiro <span style="color: red; font-weight: bold;">*</span></p>
                                <input type="radio" class="style_campo" id="sim" name="estrangeiro" placeholder="Digite o seu número" value="sim" required onclick="exibirMsg(this)" @if(old('estrangeiro') == "sim") checked @endif/>
                                <label for="sim">Sim</label>
                                <input type="radio" class="style_campo" id="nao" name="estrangeiro" placeholder="Digite o seu número" value="não" required onclick="exibirMsg(this)" @if(old('estrangeiro') == "não") checked @endif/>
                                <label for="nao">Não</label>

                                @error('estrangeiro')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="documento_de_identificação" class="style_campo_titulo">Documento de identificação <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="text" class="form-control style_campo @error('documento_de_identificação') is-invalid @enderror" id="documento_de_identificação" name="documento_de_identificação"
                                    placeholder="Digite o número do documento de identificação" value="{{ old('documento_de_identificação') }}" required />
                                <small id="msg-estrangeiro-pasaporte" style="@if(old('documento_de_identificação') != null) display: inline; @else display: none; @endif">Caso candidato estrangeiro informar número de passaporte com letras e números.</small>
                                @error('documento_de_identificação')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="órgao_emissor" class="style_campo_titulo">Órgão emissor <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="text" class="form-control style_campo @error('órgao_emissor') is-invalid @enderror" id="órgao_emissor" name="órgao_emissor"
                                    placeholder="Digite o órgão emissor do documento" value="{{ old('órgao_emissor') }}" required />
                                @error('órgao_emissor')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="cpf" class="style_campo_titulo">CPF <span id="msg-cpf-obrigatorio" style="color: red; font-weight: bold; @if(old('estrangeiro') == "não") display: inline; @else display: none; @endif">*</span></label>
                                <input type="text" class="form-control style_campo @error('cpf') is-invalid @enderror" id="cpf" name="cpf"
                                    placeholder="Digite seu CPF" value="{{ old('cpf') }}" />
                                @error('cpf')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group"></div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="telefone" class="style_campo_titulo">Telefone </label>
                                <input type="text" class="form-control style_campo @error('telefone') is-invalid @enderror celular" id="telefone" name="telefone"
                                    placeholder="Digite o seu número de telefone" value="{{ old('telefone') }}" required />
                                @error('telefone')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="celular" class="style_campo_titulo">Celular <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="text" class="form-control style_campo @error('celular') is-invalid @enderror celular" id="celular" name="celular"
                                    placeholder="Digite o seu número de celular" value="{{ old('celular') }}" required />
                                @error('celular')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <h6 class="style_card_container_header_subtitulo">Endereço</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="cep" class="style_campo_titulo">CEP <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="text" class="form-control style_campo @error('cep') is-invalid @enderror" id="cep" name="cep"
                                    placeholder="Digite o número do CEP onde mora" value="{{ old('cep') }}" required onblur="pesquisacep(this.value);"/>
                                @error('cep')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="logradouro" class="style_campo_titulo">Logradouro (rua, avenida, etc) <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="text" class="form-control style_campo @error('logradouro') is-invalid @enderror" id="logradouro" name="logradouro"
                                    placeholder="Digite o nome do seu logradouro" value="{{ old('logradouro') }}" required />
                                @error('logradouro')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="bairro" class="style_campo_titulo">Bairro <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="text" class="form-control style_campo @error('bairro') is-invalid @enderror" id="bairro" name="bairro"
                                    placeholder="Digite o bairro onde mora" value="{{ old('bairro') }}" required />
                                @error('bairro')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="número" class="style_campo_titulo">Número </label>
                                <input type="text" class="form-control style_campo @error('número') is-invalid @enderror" id="número" name="número"
                                    placeholder="Digite a sua cidade" value="{{ old('número') }}" />
                                @error('número')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="cidade" class="style_campo_titulo">Cidade </label>
                                <input type="text" class="form-control style_campo @error('cidade') is-invalid @enderror" id="cidade" name="cidade"
                                    placeholder="Digite a sua cidade" value="{{ old('cidade') }}" />
                                @error('cidade')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="uf" class="style_campo_titulo">UF <span style="color: red; font-weight: bold;">*</span></label></label>
                                <select class="form-control style_campo @error('uf') is-invalid @enderror" id="uf" name="uf">
                                    <option value="" disabled selected hidden>-- Selecione o UF --</option>
                                    <option @if(old('uf') == 'AC') selected @endif value="AC">Acre</option>
                                    <option @if(old('uf') == 'AL') selected @endif value="AL">Alagoas</option>
                                    <option @if(old('uf') == 'AP') selected @endif value="AP">Amapá</option>
                                    <option @if(old('uf') == 'AM') selected @endif value="AM">Amazonas</option>
                                    <option @if(old('uf') == 'BA') selected @endif value="BA">Bahia</option>
                                    <option @if(old('uf') == 'CE') selected @endif value="CE">Ceará</option>
                                    <option @if(old('uf') == 'DF') selected @endif value="DF">Distrito Federal</option>
                                    <option @if(old('uf') == 'ES') selected @endif value="ES">Espírito Santo</option>
                                    <option @if(old('uf') == 'GO') selected @endif value="GO">Goiás</option>
                                    <option @if(old('uf') == 'MA') selected @endif value="MA">Maranhão</option>
                                    <option @if(old('uf') == 'MT') selected @endif value="MT">Mato Grosso</option>
                                    <option @if(old('uf') == 'MS') selected @endif value="MS">Mato Grosso do Sul</option>
                                    <option @if(old('uf') == 'MG') selected @endif value="MG">Minas Gerais</option>
                                    <option @if(old('uf') == 'PA') selected @endif value="PA">Pará</option>
                                    <option @if(old('uf') == 'PB') selected @endif value="PB">Paraíba</option>
                                    <option @if(old('uf') == 'PR') selected @endif value="PR">Paraná</option>
                                    <option @if(old('uf') == 'PE') selected @endif value="PE">Pernambuco</option>
                                    <option @if(old('uf') == 'PI') selected @endif value="PI">Piauí</option>
                                    <option @if(old('uf') == 'RJ') selected @endif value="RJ">Rio de Janeiro</option>
                                    <option @if(old('uf') == 'RN') selected @endif value="RN">Rio Grande do Norte</option>
                                    <option @if(old('uf') == 'RS') selected @endif value="RS">Rio Grande do Sul</option>
                                    <option @if(old('uf') == 'RO') selected @endif value="RO">Rondônia</option>
                                    <option @if(old('uf') == 'RR') selected @endif value="RR">Roraima</option>
                                    <option @if(old('uf') == 'SC') selected @endif value="SC">Santa Catarina</option>
                                    <option @if(old('uf') == 'SP') selected @endif value="SP">São Paulo</option>
                                    <option @if(old('uf') == 'SE') selected @endif value="SE">Sergipe</option>
                                    <option @if(old('uf') == 'TO') selected @endif value="TO">Tocantins</option>
                                </select>
                                @error('UF')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label for="complemento" class="style_campo_titulo">Complemento </label>
                                <textarea type="text" class="form-control style_campo @error('complemento') is-invalid @enderror" id="complemento" name="complemento"
                                    placeholder="Digite o complemento onde mora">{{ old('complemento') }}</textarea>
                                @error('complemento')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 5px;">
                            <hr>
                        </div>
                        <div class="col-md-12 form-group" style="margin-bottom: 9px;">
                            <button class="btn btn-success shadow-sm" style="width: 100%;">Cadastre-se</button>
                            <h6 style="font-size: 13px; color: #909090; font-weight: normal; margin-top: 15px; margin-bottom: -10px;">Ao clicar em Cadastre-se, você concorda com nossos Termos e Política de Cookies. </h6>
                        </div>
                    </form>
                </div>
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

    function exibirMsg(input) {
        if (input.value == "sim") {
            document.getElementById('msg-estrangeiro-pasaporte').style.display = "inline";
            document.getElementById('msg-cpf-obrigatorio').style.display = "none";
        } else {
            document.getElementById('msg-estrangeiro-pasaporte').style.display = "none";
            document.getElementById('msg-cpf-obrigatorio').style.display = "inline";
        }
    }

    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('logradouro').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('logradouro').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);

        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('logradouro').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";


                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
</script>
@endsection