@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 3rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-9">
            <div class="card card_conteudo shadow bg-white" style="border-radius:12px; border-width:0px;">
                <div class="card-header" style="border-top-left-radius: 12px; border-top-right-radius: 12px; background-color: #fff">
                    <div class="d-flex justify-content-between align-items-center" style="margin-top: 9px; margin-bottom:6px">
                      <h5 class="card-title mb-0" style="font-size:25px; font-family:Arial, Helvetica, sans-serif; color:#1492E6">Sobre</h5>
                    </div>
                </div>
                <div class="card-body">
                  <div class="form-row">
                      <div class="col-md-12">
                          <div class="form-group">
                                <h4 style="font-weight:normal">Apresentação:</h4>
                                <h6 style="font-weight: normal; text-align:justify; color:#727272">
                                    O sistema UFAPE Concursos surgiu a partir de uma demanda da própria Universidade com o objetivo de viabilizar uma ferramenta para gerenciar o processo de inscrição, recebimento de documentos, avaliação e atribuição de notas pela banca examinadora.
                                </h6>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <h4 style="font-weight:normal">Principais funcionalidades:</h4>
                            <ul style="margin-left: -20px">
                                <li>
                                    <div class="btn-group">
                                        <div style="margin-top:5px; margin-right:5px"></div>
                                        <div><h6>Cadastro de concursos.</h6></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="btn-group">
                                        <div style="margin-top:5px; margin-right:5px"></div>
                                        <div><h6>Inscrição de candidatos.</h6></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="btn-group">
                                        <div style="margin-top:5px; margin-right:5px"></div>
                                        <div><h6>Envio de documentação.</h6></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="btn-group">
                                        <div style="margin-top:5px; margin-right:5px"></div>
                                        <div><h6>Avaliação de documentos submetidos.</h6></div>
                                    </div>
                                </li>
                            </ul> 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h4 style="font-weight:normal">Registro:</h4>
                            <h6 style="font-weight: normal">Em definição.</h6>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h4 style="font-weight:normal">Código-fonte:</h4>
                            <a target="_blanck" href="https://github.com/lmts-ufape/concursos-ufape">GitHub</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h4 style="font-weight:normal">Licença de uso:</h4>
                            <h6 style="font-weight: normal">Em definição.</h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h4 style="font-weight:normal">Equipe:</h4>
                            <h6 style="font-weight:normal;">Docentes:</h6>
                            <div>
                                <ul style="margin-left: -20px" style="list-style-type: none;">
                                    <li style="margin-top:15px; margin-bottom: 15px">
                                        <div class="btn-group">
                                            <div style="margin-right:10px"></div>
                                            <div><a href="http://lattes.cnpq.br/9517716593738845" target="_blanck">Dr. Anderson Fernandes de Alencar</a></div>
                                        </div>
                                    </li>
                                    <li style="margin-top:15px; margin-bottom: 15px">
                                        <div class="btn-group">
                                            <div style="margin-right:10px"></div>
                                            <div><a href="http://lattes.cnpq.br/4654692334430085" target="_blanck">Dr. Rodrigo Gusmão de Carvalho Rocha</a></div>
                                        </div>
                                    </li>
                                    <li style="margin-top:15px; margin-bottom: 15px">
                                        <div class="btn-group">
                                            <div style="margin-right:10px"></div>
                                            <div><a href="http://lattes.cnpq.br/7448139435512224" target="_blanck">Dr. Igor Medeiros Vanderlei</a></div>
                                        </div>
                                    </li>
                                    <li style="margin-top:15px; margin-bottom: 15px">
                                        <div class="btn-group">
                                            <div style="margin-right:10px"></div>
                                            <div><a href="http://lattes.cnpq.br/2498961747789618" target="_blanck">Dr. Jean Carlos Teixeira de Araujo</a></div>
                                        </div>
                                    </li>
                                    <li style="margin-top:15px; margin-bottom: 15px">
                                        <div class="btn-group">
                                            <div style="margin-right:10px"></div>
                                            <div><a href="http://lattes.cnpq.br/3111765717865989" target="_blanck">Dr. Mariel José Pimentel de Andrade</a></div>
                                        </div>
                                    </li>
                                </ul> 
                            </div>
                            <h6 style="font-weight:normal;">Desenvolvedores:</h6>
                            <div>
                                <ul style="margin-left: -20px">
                                    <li style="margin-top:15px; margin-bottom: 15px">
                                        <div class="btn-group">
                                            <div style="margin-right:10px"></div>
                                            <div><a href="https://www.linkedin.com/in/carlos-andr%C3%A9-611766196/" target="_blanck">Carlos André de Almeida Cavalcante</a></div>
                                        </div>
                                    </li>
                                    <li style="margin-top:15px; margin-bottom: 15px">
                                        <div class="btn-group">
                                            <div style="margin-right:10px"></div>
                                            <div><a href="https://www.linkedin.com/in/danillo-bion-92b8aa193/" target="_blanck">Danillo José Miranda Bion de Lima</a></div>
                                        </div>
                                    </li>
                                    <li style="margin-top:15px; margin-bottom: 15px">
                                        <div class="btn-group">
                                            <div style="margin-right:10px"></div>
                                            <div><a href="https://br.linkedin.com/in/kelwin-jonas-1b8656214" target="_blanck">Kelwin Jonas Silva Santos</a></div>
                                        </div>
                                    </li>
                                    <li style="margin-top:15px; margin-bottom: 15px">
                                        <div class="btn-group">
                                            <div style="margin-right:10px"></div>
                                            <div><a href="https://www.linkedin.com/in/lu%C3%ADs-fernando-b6538518a" target="_blanck">Luís Fernando Rocha Lima</a></div>
                                        </div>
                                    </li>
                                </ul> 
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