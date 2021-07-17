@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Editar Perfil</h6>
                    <h6 class="style_card_container_header_campo_obrigatorio"><span style="color: red; font-weight: bold;">*</span> Campo obrigatório</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.profile.update') }}">
                        @csrf
                        @if(session('success'))
                            <div class="col-md-12">
                                <div class="alert alert-success" role="alert">
                                    <p>{{session('success')}}</p>
                                </div>
                            </div>
                        @endif
                        <div class="form-row">
                            <div class="col-md-12">
                                <h6 class="style_card_container_header_subtitulo">Informações pessoais</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="nome" class="style_campo_titulo">Nome <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="text" class="form-control style_campo @error('nome') is-invalid @enderror" id="nome" name="nome"
                                    placeholder="Digite seu nome" value="{{ Auth::user()->nome }}" minlength="5" maxlength="200" autocomplete="nome"/>
                                @error('nome')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="sobrenome" class="style_campo_titulo">Sobrenome <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="text" class="form-control style_campo @error('sobrenome') is-invalid @enderror" id="sobrenome" name="sobrenome"
                                    value="{{ Auth::user()->sobrenome }}" placeholder="Digite seu sobrenome" minlength="5" maxlength="200" />
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
                                    placeholder="Digite o nome de seu pai" value="{{ Auth::user()->candidato->nome_do_pai }}" minlength="10" maxlength="200" />
                                @error('nome_do_pai')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="nome_da_mãe" class="style_campo_titulo">Nome da mãe <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="text" class="form-control style_campo @error('nome_da_mãe') is-invalid @enderror" id="nome_da_mãe" name="nome_da_mãe"
                                    placeholder="Digite o nome da sua mãe" value="{{ Auth::user()->candidato->nome_da_mae }}" minlength="10" maxlength="200" />
                                @error('nome_da_mãe')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="data_de_nascimento" class="style_campo_titulo">Data de nascimento <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="date" class="form-control style_campo @error('data_de_nascimento') is-invalid @enderror" id="data_de_nascimento" name="data_de_nascimento"
                                    value="{{ Auth::user()->candidato->data_de_nascimento }}"/>
                                @error('data_de_nascimento')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="telefone" class="style_campo_titulo">Telefone</label>
                                <input type="text" class="form-control style_campo @error('telefone') is-invalid @enderror celular" id="telefone" name="telefone"
                                    placeholder="Digite o seu número de telefone" value="{{ Auth::user()->candidato->telefone }}"/>
                                @error('telefone')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="celular" class="style_campo_titulo">Celular <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="text" class="form-control style_campo @error('celular') is-invalid @enderror celular" id="celular" name="celular"
                                    placeholder="Digite o seu número de celular" value="{{ Auth::user()->candidato->celular }}" />
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
                                    placeholder="Digite o número do CEP onde mora" value="{{ Auth::user()->endereco->cep }}" onblur="pesquisacep(this.value);"/>
                                @error('cep')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="logradouro" class="style_campo_titulo">Logradouro (rua, avenida, etc) <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="text" class="form-control style_campo @error('logradouro') is-invalid @enderror" id="logradouro" name="logradouro"
                                    placeholder="Digite o nome do seu logradouro" value="{{ Auth::user()->endereco->logradouro }}" />
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
                                    placeholder="Digite o bairro onde mora" value="{{ Auth::user()->endereco->bairro }}" />
                                @error('bairro')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="número" class="style_campo_titulo">Número <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="text" class="form-control style_campo @error('número') is-invalid @enderror" id="número" name="número"
                                    placeholder="Digite o número de sua casa" value="{{ Auth::user()->endereco->numero}}"/>
                                @error('número')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="cidade" class="style_campo_titulo">Cidade <span style="color: red; font-weight: bold;">*</span></label>
                                <input type="text" class="form-control style_campo @error('cidade') is-invalid @enderror" id="cidade" name="cidade"
                                    placeholder="Digite a sua cidade" value="{{ Auth::user()->endereco->cidade }}"/>
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
                                    <option @if(Auth::user()->endereco->uf == 'AC') selected @endif value="AC">Acre</option>
                                    <option @if(Auth::user()->endereco->uf == 'AL') selected @endif value="AL">Alagoas</option>
                                    <option @if(Auth::user()->endereco->uf == 'AP') selected @endif value="AP">Amapá</option>
                                    <option @if(Auth::user()->endereco->uf == 'AM') selected @endif value="AM">Amazonas</option>
                                    <option @if(Auth::user()->endereco->uf == 'BA') selected @endif value="BA">Bahia</option>
                                    <option @if(Auth::user()->endereco->uf == 'CE') selected @endif value="CE">Ceará</option>
                                    <option @if(Auth::user()->endereco->uf == 'DF') selected @endif value="DF">Distrito Federal</option>
                                    <option @if(Auth::user()->endereco->uf == 'ES') selected @endif value="ES">Espírito Santo</option>
                                    <option @if(Auth::user()->endereco->uf == 'GO') selected @endif value="GO">Goiás</option>
                                    <option @if(Auth::user()->endereco->uf == 'MA') selected @endif value="MA">Maranhão</option>
                                    <option @if(Auth::user()->endereco->uf == 'MT') selected @endif value="MT">Mato Grosso</option>
                                    <option @if(Auth::user()->endereco->uf == 'MS') selected @endif value="MS">Mato Grosso do Sul</option>
                                    <option @if(Auth::user()->endereco->uf == 'MG') selected @endif value="MG">Minas Gerais</option>
                                    <option @if(Auth::user()->endereco->uf == 'PA') selected @endif value="PA">Pará</option>
                                    <option @if(Auth::user()->endereco->uf == 'PB') selected @endif value="PB">Paraíba</option>
                                    <option @if(Auth::user()->endereco->uf == 'PR') selected @endif value="PR">Paraná</option>
                                    <option @if(Auth::user()->endereco->uf == 'PE') selected @endif value="PE">Pernambuco</option>
                                    <option @if(Auth::user()->endereco->uf == 'PI') selected @endif value="PI">Piauí</option>
                                    <option @if(Auth::user()->endereco->uf == 'RJ') selected @endif value="RJ">Rio de Janeiro</option>
                                    <option @if(Auth::user()->endereco->uf == 'RN') selected @endif value="RN">Rio Grande do Norte</option>
                                    <option @if(Auth::user()->endereco->uf == 'RS') selected @endif value="RS">Rio Grande do Sul</option>
                                    <option @if(Auth::user()->endereco->uf == 'RO') selected @endif value="RO">Rondônia</option>
                                    <option @if(Auth::user()->endereco->uf == 'RR') selected @endif value="RR">Roraima</option>
                                    <option @if(Auth::user()->endereco->uf == 'SC') selected @endif value="SC">Santa Catarina</option>
                                    <option @if(Auth::user()->endereco->uf == 'SP') selected @endif value="SP">São Paulo</option>
                                    <option @if(Auth::user()->endereco->uf == 'SE') selected @endif value="SE">Sergipe</option>
                                    <option @if(Auth::user()->endereco->uf == 'TO') selected @endif value="TO">Tocantins</option>
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
                                    placeholder="Digite o complemento onde mora">{{ Auth::user()->endereco->complemento }}</textarea>
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
                            <button class="btn btn-success shadow-sm" style="width: 100%;">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function($) {
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
        $("#nome").mask("#", {
            maxlength: true,
            translation: {
                '#': { pattern: /^[A-Za-záâãéêíóôõúçÁÂÃÉÊÍÓÔÕÚÇ\s]+$/, recursive: true }
            }
        });
        $("#sobrenome").mask("#", {
            maxlength: true,
            translation: {
                '#': { pattern: /^[A-Za-záâãéêíóôõúçÁÂÃÉÊÍÓÔÕÚÇ\s]+$/, recursive: true }
            }
        });
        $("#nome_do_pai").mask("#", {
            maxlength: true,
            translation: {
                '#': { pattern: /^[A-Za-záâãéêíóôõúçÁÂÃÉÊÍÓÔÕÚÇ\s]+$/, recursive: true }
            }
        });
        $("#nome_do_mãe").mask("#", {
            maxlength: true,
            translation: {
                '#': { pattern: /^[A-Za-záâãéêíóôõúçÁÂÃÉÊÍÓÔÕÚÇ\s]+$/, recursive: true }
            }
        });
    });

    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('logradouro').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");

            document.getElementById('logradouro').removeAttribute("required");
            document.getElementById('bairro').removeAttribute("required");
            document.getElementById('cidade').removeAttribute("required");
            document.getElementById('uf').removeAttribute("required");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('logradouro').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);

            document.getElementById('logradouro').setAttribute("required", "");
            document.getElementById('bairro').setAttribute("required", "");
            document.getElementById('cidade').setAttribute("required", "");
            document.getElementById('uf').setAttribute("required", "");
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