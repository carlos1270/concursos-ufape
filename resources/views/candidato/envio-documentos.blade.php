@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-9">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Enviar documentos da segunda fase</h6>
                </div>
                <div class="card-body">
                    <div>
                        <form method="POST" style="" action="{{ route('save.documentos') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="formacao_academica" class="style_campo_titulo">Formação Acadêmica</label>
                                    <input type="file" class="form-control style_campo" id="formacao_academica" name="formacao_academica" 
                                        value="{{ old('formacao_academica') }}" required/>
                                    @error('formacao_academica')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="experiencia_didatica" class="style_campo_titulo">Experiência Didática</label>
                                    <input type="file" class="form-control style_campo" id="experiencia_didatica" name="experiencia_didatica" required/>
                                    @error('experiencia_didatica')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label for="producao_cientifica" class="style_campo_titulo">Produção Científica</label>
                                    <input type="file" class="form-control style_campo" id="producao_cientifica" name="producao_cientifica" required/>
                                    @error('producao_cientifica')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="experiencia_profissional" class="style_campo_titulo">Experiência Profissional</label>
                                    <input type="file" class="form-control style_campo" id="experiencia_profissional" name="experiencia_profissional" required/>
                                    @error('experiencia_profissional')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" id="inscricao" name="inscricao" value="{{ $inscricao }}"/>

                            <div class="form-row justify-content-center">
                                <div class="col-md-6 form-group" style="margin-bottom: 4px;">
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
@endsection