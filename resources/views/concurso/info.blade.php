@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">{{ $concurso->titulo }}</h6>
                </div>
                <div class="card-body">
                    <div>
                        <div class="col-md-12">
                            <p>{{ $concurso->descricao }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 justify-content-center">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Ações</h6>
                </div>
                <div class="card-body">
                    <div>
                        <div class="col-md-12">
                            <p>{{ $concurso->descricao }}</p>
                        </div>
                        <div class="form-group" style="margin-bottom: 4px;">
                            <button onclick ="location.href='{{ route('info.concurso', ['concurso' => $concurso->id]) }}'" 
                                class="btn btn-success shadow-sm" style="width: 100%;">Concorrer à vaga</button>
                        </div>
                        <div class="form-group" style="margin-bottom: 4px;">
                            <button type="submit" class="btn btn-primary shadow-sm" style="width: 100%;">Compartilhar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow bg-white style_card_container" style="margin-top: 10px">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Datas importantes</h6>
                </div>
                <div class="card-body">
                    <div>
                        <div class="col-md-12">
                            <p><strong>Submissão</strong></p>
                            <p>26/05/2021 - 28/05/2021</p>
                        </div>
                        <hr/>
                    </div>
                    <div>
                        <div class="col-md-12">
                            <p><strong>Revisão</strong></p>
                            <p>26/05/2021 - 28/05/2021</p>
                        </div>
                        <hr/>
                    </div>
                    <div>
                        <div class="col-md-12">
                            <p><strong>Resultado preliminar</strong></p>
                            <p>26/05/2021 - 28/05/2021</p>
                        </div>
                        <hr/>
                    </div>
                    <div>
                        <div class="col-md-12">
                            <p><strong>Recurso</strong></p>
                            <p>26/05/2021 - 28/05/2021</p>
                        </div>
                        <hr/>
                    </div>
                    <div>
                        <div class="col-md-12">
                            <p><strong>Resultado final</strong></p>
                            <p>26/05/2021 - 28/05/2021</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow bg-white style_card_container" style="margin-top: 10px">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Documentos</h6>
                </div>
                <div class="card-body">
                    <div>
                        <div class="col-md-12">
                            <p><strong>Edital de condições gerais</strong></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-12">
                            <p><strong>Edital específico</strong></p>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-12">
                            <p><strong>Documento de veracidade</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection