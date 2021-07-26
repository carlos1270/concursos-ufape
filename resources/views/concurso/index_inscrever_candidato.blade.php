@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <div class="form-group">
                        <h6 class="style_card_container_header_titulo">Inscrever candidato</h6>
                        <h6 class="" style="font-weight: normal; color: #909090; margin-top: -10px; margin-bottom: -15px;">Meus concursos > Visualizar candidatos > Inscrever candidato</h6>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-filtros">Filtrar</button>
                        @if($request->filtro != null)
                            <a type="button" class="btn btn-secondary" href="{{route('inscricao.chefe.concurso', $concurso->id)}}">Limpar filtros</a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">
                                <p>{{session('success')}}</p>
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
                    @if($usuarios->count() > 0)
                        <table class="table table-bordered table-hover tabela_container table-responsove-md">
                            <thead>
                                <tr>
                                    <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 100%;">Nome</th>
                                    <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 100%;">Sobrenome</th>
                                    <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 100%;">E-mail</th>
                                    <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 100%;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $user)
                                    <tr>
                                        <td id="tabela_container_linha">
                                            {{ $user->nome }}
                                        </td>
                                        <td id="tabela_container_linha">
                                            {{ $user->sobrenome }}
                                        </td>
                                        <td id="tabela_container_linha">
                                            {{ $user->email }}
                                        </td>
                                        <td id="tabela_container_linha" style="text-align: center;">
                                            <div class="btn-group">
                                                <div>
                                                    <a class="btn btn-success" href="{{route('inscrever.candidato', ['concurso' => $concurso->id, 'user' => $user->id])}}">
                                                        Realizar inscrição
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else 
                        <div class="card-body">
                            <div class="form-row" style="text-align: center;">
                                <div class="col-md-12" style="margin-top: 5rem; margin-bottom: 10rem;">
                                    <img src="{{asset('img/img_default_meus_concursos.svg')}}" alt="Imagem default" width="190px">
                                    @if($request->filtro == null)
                                        <h6 class="style_campo_titulo" style="margin-top: 20px;">Nenhum candidato sem inscrição nesse concurso.</h6>
                                    @else
                                        <h6 class="style_campo_titulo" style="margin-top: 20px;">Nenhum resultado de candidatos sem inscrição.</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                {{-- <div class="card-footer" style="background-color: #fff; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
                    <div><h6 style="font-weight: bold">Legenda:</h6></div>
                    <div class="form-row">
                        <div style="margin: 5px">
                            <button class="btn btn-info" class="btn btn-success" style="margin-right: 10px" disabled>
                            <img class="card-img-left example-card-img-responsive" src="{{asset('img/icon_editar.svg')}}" width="16px"/>
                            </button> Editar Usuário</div>
                        <div style="margin: 5px">
                            <button class="btn btn-danger" class="btn btn-success" style="margin-right: 10px" disabled>
                            <img class="card-img-left example-card-img-responsive" src="{{asset('img/icon_lixeira.svg')}}" width="16px"/>
                            </button> Deletar Usuário</div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-filtros" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Filtrar candidatos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="form-filtros" method="GET" action="{{route('inscricao.chefe.concurso', $concurso->id)}}">
                <input type="hidden" name="filtro" value="1">
                <input type="hidden" name="concurso_id" value="{{$concurso->id}}">
                <div class="form-row">
                    <div id="check-input-cpf" class="col-sm-4 form-group">
                        <input id="check_cpf" type="checkbox" class="input-search" name="check_cpf" onchange="exibirCampo(this, 'input-cpf')" @if($request->check_cpf) checked @endif>
                        <label for="check_cpf">Por CPF.</label>
                    </div>
                    <div id="check-input-email" class="col-sm-4 form-group">
                        <input id="check_email" type="checkbox" class="input-search" name="check_email" onchange="exibirCampo(this, 'input-email')" @if($request->check_email) checked @endif>
                        <label for="check_email">Por e-mail.</label>
                    </div>
                </div>
                <div class="form-row">
                    <div id="input-cpf" class="col-sm-6 form-group" style="{{$request->cpf != null ? 'display: block;' : 'display: none;'}}">
                        <input type="text" class="form-control input-search cpf" name="cpf" placeholder="Digite o CPF" value="{{$request->cpf != null ? $request->cpf : ""}}">
                        <small>Obs.: digitar somente números.</small>
                    </div> 
                    <div id="input-email" class="col-sm-6 form-group" style="{{$request->email != null ? 'display: block;' : 'display: none;'}}">
                        <input type="email" class="form-control input-search" name="email" placeholder="Digite o email" value="{{$request->email != null ? $request->email : ""}}">
                    </div> 
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" form="form-filtros">Filtrar</button>
        </div>
      </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.cpf').mask('00000000000'); 
    });

    function exibirCampo(input, id) {
        if (input.checked) {
            document.getElementById(id).style.display = "block";
        } else {
            document.getElementById(id).style.display = "none";
        }
    }
</script>
@endsection