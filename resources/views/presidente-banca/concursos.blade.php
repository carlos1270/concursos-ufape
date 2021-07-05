@extends('templates.template-principal')
@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
        <div class="form-row justify-content-center">
            <div class="col-md-11">
                <div class="card shadow bg-white style_card_container">
                    <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                        <h6 class="style_card_container_header_titulo">Concursos</h6>
                    </div>
                    @if($concursos->count() > 0)
                        <!-- um ou mais concursos -->
                        <div class="card-body">
                            @if(session('mensage'))
                                <div class="row">
                                    <div class="col-md-12" style="margin-top: 5px;">
                                        <div class="alert alert-success" role="alert">
                                            <p>{{session('mensage')}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <table class="table table-bordered table-hover tabela_container">
                                <thead>
                                    <tr>
                                        <th scope="col" class="tabela_container_cabecalho_titulo">Id</th>
                                        <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 100%;">Concurso</th>
                                        <th scope="col" class="tabela_container_cabecalho_titulo">Nº de vagas</th>
                                        <th scope="col" class="tabela_container_cabecalho_titulo">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($concursos as $concurso)
                                        <tr>
                                            <th scope="row" id="tabela_container_linha"  style="text-align: center;">{{$concurso->id}}</th>
                                            <td id="tabela_container_linha">{{$concurso->titulo}}</td>
                                            <td id="tabela_container_linha" style="text-align: center;">{{$concurso->qtd_vagas}}</td>
                                            <td id="tabela_container_linha" style="text-align: center;">
                                                <div class="btn-group">
                                                    <div style="margin-right: 15px;">
                                                        <button class="btn btn-success" onclick ="location.href=''">
                                                            <img src="{{ asset('img/icon_candidato.svg') }}" alt="Candidatos inscritos no concurso {{$concurso->titulo}}" width="23x" >
                                                        </button>
                                                        <a class="btn btn-warning"><img src="{{ asset('img/icon_consultar_resultado.svg') }}" alt="Resultado do concurso {{$concurso->titulo}}" width="18px" ></a>
                                                    </div>
                                                    <div style="border-left: 1px solid #d1d1d1; margin-right: 15px;"></div>
                                                    <div >
                                                        <a class="btn btn-primary" href="{{route('concurso.show', ['concurso' => $concurso->id])}}"><img src="{{ asset('img/icon_visualizar.svg') }}" alt="Visualizar concurso" width="26px"></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer" style="background-color: #fff; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
                            <div><h6 style="font-weight: bold">Legenda:</h6></div>
                            <div class="form-row">
                                <div style="margin:5px">
                                    <button class="btn btn-success" style="margin-right: 10px" disabled>
                                        <img class="card-img-left example-card-img-responsive" src="img/icon_candidato.svg" width="20px"/>
                                    </button> Visualizar Candidatos
                                </div>
                                <div style="margin: 5px">
                                    <button class="btn btn-warning" style="margin-right: 10px" disabled>
                                    <img class="card-img-left example-card-img-responsive" src="img/icon_consultar_resultado.svg" width="15px"/>
                                    </button> Consultar o resultado final </div>
                                <div style="margin: 5px">
                                    <button class="btn btn-primary" style="margin-right: 10px" disabled>
                                    <img class="card-img-left example-card-img-responsive" src="img/icon_visualizar.svg" width="24px"/>
                                    </button> Visualizar Concurso
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card-body">
                            <div class="form-row" style="text-align: center;">
                                <div class="col-md-12" style="margin-top: 5rem; margin-bottom: 10rem;">
                                    <img src="img/img_default_meus_concursos.svg" alt="Imagem default" width="190px">
                                    <h6 class="style_campo_titulo" style="margin-top: 20px;">Nenhum concurso criado.</h6>
                                    <h6 class="style_campo_titulo" style="font-weight: normal;"><a href="{{route('concurso.create')}}">Clique aqui</a> para criar um concurso</h6>
                                </div>
                                
                            </div>
                        </div>
                    @endif    
                </div>
            </div>
        </div>
    </div>
@endsection