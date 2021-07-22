@extends('templates.template-principal')
@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
        <div class="form-row justify-content-center">
            <div class="col-md-11">
                <div class="card shadow bg-white style_card_container">
                    <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                        <div class="form-group">
                            <h6 class="style_card_container_header_titulo">Notas de texto do(a) {{$concurso->titulo}}</h6>
                            <h6 class="" style="font-weight: normal; color: #909090; margin-top: -10px; margin-bottom: -15px;">Meus concursos > Notas de texto</h6>
                        </div>
                        <h6 class="style_card_container_header_campo_obrigatorio"><a href="{{route('notas.create', ['concurso' => $concurso->id])}}" class="btn btn-primary" style="margin-top:10px;">Criar nota</a></h6>
                    </div>
                    
                    @if($notas->count() > 0)
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
                            @error('error')
                                <div class="row">
                                    <div class="col-md-12" style="margin-top: 5px;">
                                        <div class="alert alert-danger" role="alert">
                                            <p>{{ $message }}</p>
                                        </div>
                                    </div>
                                </div>
                            @enderror
                            <table class="table table-hover table-responsive-sm">
                                <thead>
                                    <tr class="shadow-sm" style="border: 1px solid #dee2e6">
                                        <th scope="col" class="tabela_container_cabecalho_titulo">#</th>
                                        <th scope="col" class="tabela_container_cabecalho_titulo">Título</th>
                                        <th scope="col" class="tabela_container_cabecalho_titulo">Tipo</th>
                                        <th scope="col" class="tabela_container_cabecalho_titulo">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $cont = 1;
                                    @endphp
                                    @foreach ($notas as $nota)
                                        <tr>
                                            <th scope="row" id="tabela_container_linha"  style="text-align: center;">{{$cont}}</th>
                                            <td id="tabela_container_linha">
                                                <div class="form-group">
                                                    <div style="margin-bottom: -3px"><a  href="{{route('concurso.show', ['concurso' => $nota->id])}}" style="font-size: 18px">{{$nota->titulo}}</a></div>
                                                    <div><h6 style="font-weight: normal; color:#909090; font-style: italic; font-size:15px">Criado no dia: {{$nota->created_at->format('d/m/Y')}}</h6></div>
                                                </div>
                                            </td>
                                            <td id="tabela_container_linha" style="text-align: center;">
                                                @switch($nota->tipo)
                                                    @case(1)
                                                        <div class="btn-group">
                                                            {{-- <img src="{{asset('img/icon_publicado.svg')}}" alt="" width="25px" style="margin-right: 5px;"> --}}
                                                            <h6 style="margin-top: 6px; font-weight: normal; color: #ac241a;">Aviso</h6>
                                                        </div>
                                                        @break
                                                    @case(2)
                                                        <div class="btn-group">
                                                            {{-- <img src="{{asset('img/icon_publicado.svg')}}" alt="" width="25px" style="margin-right: 5px;"> --}}
                                                            <h6 style="margin-top: 6px; font-weight: normal; color: #1a5eac;">Notificação</h6>
                                                        </div>
                                                        @break
                                                    @case(3)
                                                        <div class="btn-group">
                                                            {{-- <img src="{{asset('img/icon_publicado.svg')}}" alt="" width="25px" style="margin-right: 5px;"> --}}
                                                            <h6 style="margin-top: 6px; font-weight: normal; color: #1aac26;">Resultado</h6>
                                                        </div>
                                                        @break
                                                @endswitch
                                                
                                            </td>
                                            <td id="tabela_container_linha" style="text-align: center;">
                                                <div class="btn-group">
                                                    <div style="margin-right: 10px">
                                                        <a class="btn btn-info shadow-sm" href="{{route('notas.edit', ['nota' => $nota->id, 'concurso' => $concurso->id])}}"><img src="{{asset('img/icon_editar.svg')}}" alt="Editar nota {{$nota->titulo}}" width="16.5px" ></a>
                                                    </div>
                                                    <div style="margin-right: 15px">
                                                        <a class="btn btn-danger shadow-sm" data-toggle="modal" data-target="#deletar-nota-{{$nota->id}}" style="cursor:pointer;"><img src="{{asset('img/icon_lixeira.svg')}}" alt="Resultado do concurso {{$nota->titulo}}" width="13px" ></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                        $cont = $cont +1;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer" style="background-color: #fff; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
                            <div><h6 style="color: #909090; margin-bottom:1px">Legenda:</h6></div>
                            <div class="form-row">
                                <div class="btn-group" style="margin:5px">
                                    <label style="margin-right: 10px; padding-left:13px;padding-right:13px; border-radius:6px; background-color:#17a2b8;">
                                        <img class="card-img-left example-card-img-responsive" src="{{asset('img/icon_editar.svg')}}" width="15px" style="margin-top: 10px "/>
                                    </label>
                                    <h6>Editar <br>nota</h6>
                                </div>
                                <div class="btn-group" style="margin: 5px">
                                    <label style="margin-right: 10px; padding-left:13px;padding-right:13px; border-radius:6px; background-color:#dc3545;">
                                        <img class="card-img-left example-card-img-responsive" src="{{asset('img/icon_lixeira.svg')}}" width="12px" style="margin-top: 10px "/>
                                    </label>
                                    <h6>Excluir <br>nota</h6>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card-body">
                            <div class="form-row" style="text-align: center;">
                                <div class="col-md-12" style="margin-top: 5rem; margin-bottom: 10rem;">
                                    <img src="{{asset('img/img_default_meus_concursos.svg')}}" alt="Imagem default" width="190px">
                                    <h6 class="style_campo_titulo" style="margin-top: 20px;">Nenhuma nota de texto para o concurso criado.</h6>
                                    <h6 class="style_campo_titulo" style="font-weight: normal;"><a href="{{route('concurso.create')}}">Clique aqui</a> para criar um nota de texto do concurso</h6>
                                </div>
                            </div>
                        </div>
                    @endif    
                </div>
            </div>
        </div>
    </div>

    @foreach ($notas as $nota)
        <div class="modal fade" id="deletar-nota-{{$nota->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deletar {{$nota->titulo}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-delete-nota-{{$nota->id}}" method="POST" action="{{route('notas.destroy', ['nota' => $nota->id])}}">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                            Tem certeza que deseja deletar {{$nota->titulo}}?
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger" form="form-delete-nota-{{$nota->id}}">Deletar</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection