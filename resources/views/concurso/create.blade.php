<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-sm-10">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Criar concurso') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container" style="margin-top: 40px; margin-bottom:40px;">
                    <form method="POST" action="{{route('concurso.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-8">
                                    <label for="titulo">Titulo</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Concurso professores substitutos 2021">
                                </div>
                                <div class="col-sm-4">
                                    <label for="quantidade_vagas">Quantidade vagas</label>
                                    <input type="number" class="form-control" id="quantidade_vagas" name="quantidade_vagas" placeholder="5">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="descricao">Descrição</label>
                                    <textarea type="text" class="form-control" id="descricao" name="descricao" placeholder="Esse concurso se refere há..." rows="5" cols="30"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="data_inicio_inscricao">Data de inicio das inscrições</label>
                                    <input type="date" class="form-control" id="data_inicio_inscricao" name="data_inicio_inscricao">
                                </div>
                                <div class="col-sm-6">
                                    <label for="data_fim_inscricao">Data de termino das inscrições</label>
                                    <input type="date" class="form-control" id="data_fim_inscricao" name="data_fim_inscricao">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="data_fim_isencao_inscricao">Data limite para isenção</label>
                                    <input type="date" class="form-control" id="data_fim_isencao_inscricao" name="data_fim_isencao_inscricao">
                                </div>
                                <div class="col-sm-6">
                                    <label for="data_fim_pagamento_inscricao">Data limite para pagamento</label>
                                    <input type="date" class="form-control" id="data_fim_pagamento_inscricao" name="data_fim_pagamento_inscricao">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="data_inicio_envio_doc">Data inicio para envio dos documentos</label>
                                    <input type="date" class="form-control" id="data_inicio_envio_doc" name="data_inicio_envio_doc">
                                </div>
                                <div class="col-sm-6">
                                    <label for="data_fim_envio_doc">Data fim para envio dos documentos</label>
                                    <input type="date" class="form-control" id="data_fim_envio_doc" name="data_fim_envio_doc">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="data_resultado_selecao">Data do resultado do concurso</label>
                                    <input type="date" class="form-control" id="data_resultado_selecao" name="data_resultado_selecao">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="edital">Edital</label>
                                    <input type="file" class="form-control" name="edital" id="edital">
                                </div>
                                <div class="col-sm-6">
                                    <label for="modelos_documentos">Modelo de documetnos</label>
                                    <input type="file" class="form-control" name="modelos_documentos" id="modelos_documentos">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success" style="width: 100%">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <button onclick="teste()">ok</button>
</x-app-layout>