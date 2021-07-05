@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Documentos</h6>
                </div>
                <div class="card-body">
                    <div>
                        <div class="form-row ">
                            <div class="form-group col-md-6">
                                <a class="btn btn-light" href="{{asset('storage/'. $arquivos->formacao_academica)}}" target="_new">
                                    <img class="" src="{{asset('img/file-download-solid.svg')}}" style="width:20px"><br>
                                    Formação Acadêmica
                                </a>
                            </div>
                            <div class="col-md-6 form-group">
                                <a class="btn btn-light" href="{{asset('storage/'. $arquivos->experiencia_didatica)}}" target="_new">
                                    <img class="" src="{{asset('img/file-download-solid.svg')}}" style="width:20px"><br>
                                    Experiência Didática
                                </a>
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="col-md-6 form-group">
                                <a class="btn btn-light" href="{{asset('storage/'. $arquivos->producao_cientifica)}}" target="_new">
                                    <img class="" src="{{asset('img/file-download-solid.svg')}}" style="width:20px"><br>
                                    Produção Ciêntifica
                                </a>
                            </div>
                            <div class="col-md-6 form-group">
                                <a class="btn btn-light" href="{{asset('storage/'. $arquivos->experiencia_profissional)}}" target="_new">
                                    <img class="" src="{{asset('img/file-download-solid.svg')}}" style="width:20px"><br>
                                    Experiência Profissional
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Pontuação</h6>
                </div>
                <div class="card-body">
                    <div>
                        <div class="form-row ">
                           <div class="col-md-12">
                                <form method="POST" action="{{ route('avalia.documentos.inscricao', $arquivos->inscricoes_id) }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-6 form-group">
                                            <label for="nota" class="style_campo_titulo">Pontuação Total</label>
                                            <input type="number" id="nota" name="nota" min="0" max="100"
                                                class="form-control style_campo" value="{{ old('nota') }}"/>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center">
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
@endsection