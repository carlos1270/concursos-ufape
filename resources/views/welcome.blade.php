@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 3rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center" style="text-align: center;">
        <div class="col-md-12">
            <img src="{{ asset('img/logo_ufape_concursos.png') }}" alt="Orientação" width="30%"> 
        </div>
        <div class="col-md-8" style="margin-top: 20px;">
            <h6 style="color: #909090;">O sistema de gestão de concursos da UFAPE visa auxiliar no processo de cadastramento de edital, inscrição de candidatos e recebimento de documentos para os processos seletivos para concursos e seleções públicas para professor do magistério superior da referida Universidade.</h6>
        </div>
        
        <div class="col-md-12" style="text-align: left; margin-top: 1.5rem;margin-bottom: -1.1rem;">
            <h6 style="color: #6C6C6C; font-size: 40px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">Concursos abertos</h6>
        </div>
        <div class="col-md-12"><hr style="border-width: 5px; border-color: #6C6C6C;"></div>
        <div class="col-md-12">
            <div class="form-row justify-content-left">
                @if ($concursosAbertos->count() > 0)
                    @foreach ($concursosAbertos as $concurso)
                        <div class="card style_card">
                            <div class="card-body">
                                <div class="d-flex justify-content-left" style="margin-bottom: -20px;">
                                    <div style="margin-right: 5px;">
                                        <img src="img/img_default.png" alt="Imagem default" width="70px"> 
                                    </div>
                                    <div class="form-group" style="text-align: left;">
                                        <h6 class="style_card_titulo">{{$concurso->titulo}}</h6>
                                        <h6 class="style_card_subtitulo">{{$concurso->qtd_vagas}} @if($concurso->qtd_vagas < 2) vaga. @else vagas.@endif</h6>
                                        <hr>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-left" style="text-align: left;">
                                    <div><h6 class="style_card_data">{{date('d/m/Y',strtotime($concurso->data_inicio_inscricao))}}</h6></div>
                                    <div class="style_card_maior_que"><img src="img/icon_maior_que.svg" width="8px"> </div>
                                    <div><h6 class="style_card_data">{{date('d/m/Y',strtotime($concurso->data_fim_inscricao))}}</h6></div>
                                </div>
                                <div class="d-flex justify-content-left">
                                    <h6 class="style_card_detalhe" style="font-family: Arial, Helvetica, sans-serif;">{{mb_strimwidth($concurso->descricao, 0, 170, "...")}}</h6>
                                </div>
                                <div style="text-align: left;">
                                    <hr class="style_card_linha">
                                    <a href="{{route('concurso.show', ['concurso' => $concurso->id])}}"><h6 class="style_card_tipo">Visualizar concurso</h6></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else 
                    Nenhum concurso cadastrado.
                @endif
                
            </div>
        </div>
        @if ($concursosEncerrados->count() > 0)
            <div class="col-md-12" style="text-align: left; margin-top: 1.5rem;margin-bottom: -1.1rem;">
                <h6 style="color: #6C6C6C; font-size: 40px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">Concursos encerrados</h6>
            </div>
            <div class="col-md-12"><hr style="border-width: 5px; border-color: #6C6C6C;"></div>
            <div class="col-md-12">
                <div class="form-row justify-content-left">
                        @foreach ($concursosEncerrados as $concurso)
                            <div class="card style_card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-left" style="margin-bottom: -20px;">
                                        <div style="margin-right: 5px;">
                                            <img src="img/img_default.png" alt="Imagem default" width="70px"> 
                                        </div>
                                        <div class="form-group" style="text-align: left;">
                                            <h6 class="style_card_titulo">{{$concurso->titulo}}</h6>
                                            <h6 class="style_card_subtitulo">{{$concurso->qtd_vagas}} @if($concurso->qtd_vagas < 2) vaga. @else vagas.@endif</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-left" style="text-align: left;">
                                        <div><h6 class="style_card_data">{{date('d/m/Y',strtotime($concurso->data_inicio_inscricao))}}</h6></div>
                                        <div class="style_card_maior_que"><img src="img/icon_maior_que.svg" width="8px"> </div>
                                        <div><h6 class="style_card_data">{{date('d/m/Y',strtotime($concurso->data_fim_inscricao))}}</h6></div>
                                    </div>
                                    <div class="d-flex justify-content-left">
                                        <h6 class="style_card_detalhe">{{$concurso->descricao}}</h6>
                                    </div>
                                    <div style="text-align: left;">
                                        <hr class="style_card_linha">
                                        <a href="{{route('concurso.show', ['concurso' => $concurso->id])}}"><h6 class="style_card_tipo">Visualizar concurso</h6></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection