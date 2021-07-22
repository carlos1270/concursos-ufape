@extends('templates.template-principal')
@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
        <div class="form-row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow bg-white style_card_container">
                    <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                        <div class="form-group">
                            <h6 class="style_card_container_header_titulo">Criar nota de texto em {{$concurso->titulo}}</h6>
                            <h6 class="" style="font-weight: normal; color: #909090; margin-top: -10px; margin-bottom: -15px;">Meus concursos > Notas de texto > Criar nota</h6>
                        </div>
                        <h6 class="style_card_container_header_campo_obrigatorio"><span style="color: red; font-weight: bold;">*</span> Campo obrigatório</h6>                            </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-12">
                                <h6 style="color: #707070; font-weight: normal; font-size: 22px;">Informações</h6>
                            </div>
                            <form method="POST" action="{{route('notas.store', ['concurso' => $concurso->id])}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col-sm-6 form-group">
                                        <label for="titulo" class="style_campo_titulo">Título <span style="color: red; font-weight: bold;">*</span></label>
                                        <input type="text" class="form-control style_campo @error('título') is-invalid @enderror" id="titulo" name="título" placeholder="Digite o título da nota" value="{{old('título')}}">

                                        @error('título')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="tipo" class="style_campo_titulo">Tipo <span style="color: red; font-weight: bold;">*</span></label>
                                        <select type="number" class="form-control style_campo @error('tipo') is-invalid @enderror" id="tipo" name="tipo">
                                            <option value="" disabled selected>-- Selecionar tipo --</option>
                                            <option @if(old('tipo') == 1) selected @endif value="1">Aviso</option>
                                            <option @if(old('tipo') == 2) selected @endif value="2">Notificação</option>
                                            <option @if(old('tipo') == 3) selected @endif value="3">Resultado</option>
                                        </select>

                                        @error('tipo')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="cor_do_fundo_da_nota" class="style_campo_titulo">Cor do fundo da nota</label>
                                        <input type="color" class="form-control style_campo @error('cor_do_fundo_da_nota') is-invalid @enderror" id="cor_do_fundo_da_nota" name="cor_do_fundo_da_nota" value="{{old('cor_do_fundo_da_nota')}}">

                                        @error('cor_do_fundo_da_nota')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label for="texto_da_nota" class="style_campo_titulo">Texto da nota <span style="color: red; font-weight: bold;">*</span></label>
                                        <textarea class="form-control style_campo @error('texto_da_nota') is-invalid @enderror" id="texto_da_nota" name="texto_da_nota" placeholder="Digite aqui o texto que será exibido na nota" rows="5" cols="30">{{old('texto_da_nota')}}</textarea>

                                        @error('texto_da_nota')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="anexo" class="style_campo_titulo">Anexo</label>
                                        <input type="file" accept=".pdf" class="form-control style_campo @error('anexo') is-invalid @enderror" name="anexo" id="anexo" value="{{old('anexo')}}">

                                        @error('anexo')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-bottom: 5px;">
                                    <hr>
                                </div>
                                <div class="col-md-12" style="margin-bottom: 5px; text-align: right;">
                                    <button type="submit" class="btn btn-success shadow-sm" style="width: 240px;">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.editorConfig = function( config ) {
            config.toolbarGroups = [
                { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                { name: 'links', groups: [ 'links' ] },
                { name: 'insert', groups: [ 'insert' ] },
                { name: 'forms', groups: [ 'forms' ] },
                { name: 'tools', groups: [ 'tools' ] },
                { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'others', groups: [ 'others' ] },
                '/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                { name: 'styles', groups: [ 'styles' ] },
                { name: 'colors', groups: [ 'colors' ] },
                { name: 'about', groups: [ 'about' ] }
            ];

            config.removeButtons = 'Image,Table';
        };

        CKEDITOR.replace('texto_da_nota');
    </script>
@endsection
