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
                              <h6 style="font-weight: normal; text-align:justify; color:#727272">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h6>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <h4 style="font-weight:normal">Principais funcionalidades:</h4>
                            <ul style="margin-left: -20px">
                                <li style="margin-top:15px; color:#727272">
                                    <div class="btn-group">
                                        <div style="margin-top:5px; margin-right:5px"><img src="{{ asset('img/icon_ponto.svg') }}" width="5px"></div>
                                        <div><h6>Funcionalidade 1</h6></div>
                                    </div>
                                </li>
                                <li style="color:#727272">
                                    <div class="btn-group">
                                        <div style="margin-top:5px; margin-right:5px"><img src="{{ asset('img/icon_ponto.svg') }}" width="5px"></div>
                                        <div><h6>Funcionalidade 2</h6></div>
                                    </div>
                                </li>
                                <li style="margin-bottom: 15px; color:#727272">
                                    <div class="btn-group">
                                        <div style="margin-top:5px; margin-right:5px"><img src="{{ asset('img/icon_ponto.svg') }}" width="5px"></div>
                                        <div><h6>Funcionalidade 3</h6></div>
                                    </div>
                                </li>
                            </ul> 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h4 style="font-weight:normal">Registro:</h4>
                            <a href="">Número de Registro</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h4 style="font-weight:normal">Código-fonte:</h4>
                            <a href="">Nome do sistema</a>
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
                            <h6 style="font-weight:normal; color:#727272">Docentes:</h6>
                            <div>
                                <ul style="margin-left: -20px">
                                    <li style="margin-top:15px; margin-bottom: 15px">
                                        <div class="btn-group">
                                            <div style="margin-right:10px"><img src="{{ asset('img/icon_ponto.svg') }}" width="5px"></div>
                                            <div><a href="">Dr. Anderson Fernandes de Alencar</a></div>
                                        </div>
                                    </li>
                                    <li style="margin-top:15px; margin-bottom: 15px">
                                        <div class="btn-group">
                                            <div style="margin-right:10px"><img src="{{ asset('img/icon_ponto.svg') }}" width="5px"></div>
                                            <div><a href="">Dr. Rodrigo Gusmão de Carvalho Rocha</a></div>
                                        </div>
                                    </li>
                                    <li style="margin-top:15px; margin-bottom: 15px">
                                        <div class="btn-group">
                                            <div style="margin-right:10px"><img src="{{ asset('img/icon_ponto.svg') }}" width="5px"></div>
                                            <div><a href="">Dr. Igor Medeiros Vanderlei</a></div>
                                        </div>
                                    </li>
                                    <li style="margin-top:15px; margin-bottom: 15px">
                                        <div class="btn-group">
                                            <div style="margin-right:10px"><img src="{{ asset('img/icon_ponto.svg') }}" width="5px"></div>
                                            <div><a href="">Dr. Jean Carlos Teixeira de Araujo</a></div>
                                        </div>
                                    </li>
                                    <li style="margin-top:15px; margin-bottom: 15px">
                                        <div class="btn-group">
                                            <div style="margin-right:10px"><img src="{{ asset('img/icon_ponto.svg') }}" width="5px"></div>
                                            <div><a href="">Dr. Mariel José Pimentel de Andrade</a></div>
                                        </div>
                                    </li>
                                </ul> 
                            </div>
                            <h6 style="font-weight:normal; color:#727272">Desenvolvedores:</h6>
                            <div>
                                <ul style="margin-left: -20px">
                                    <li style="margin-top:15px; margin-bottom: 15px">
                                        <div class="btn-group">
                                            <div style="margin-right:10px"><img src="{{ asset('img/icon_ponto.svg') }}" width="5px"></div>
                                            <div><a href="">Fulano</a></div>
                                        </div>
                                    </li>
                                    <li style="margin-top:15px; margin-bottom: 15px">
                                        <div class="btn-group">
                                            <div style="margin-right:10px"><img src="{{ asset('img/icon_ponto.svg') }}" width="5px"></div>
                                            <div><a href="">Fulano</a></div>
                                        </div>
                                    </li>
                                    <li style="margin-top:15px; margin-bottom: 15px">
                                        <div class="btn-group">
                                            <div style="margin-right:10px"><img src="{{ asset('img/icon_ponto.svg') }}" width="5px"></div>
                                            <div><a href="">Fulano</a></div>
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