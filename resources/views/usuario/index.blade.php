@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Usuários</h6>
                    <a class="btn btn-primary" href="{{ route('user.create') }}" style="margin-top:10px;">Criar usuário</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">
                                <p>{{session('success')}}</p>
                            </div>
                        </div>
                    @endif
                    <table class="table table-bordered table-hover tabela_container table-responsove-md">
                        <thead>
                            <tr>
                                <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 100%;">Nome</th>
                                <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 100%;">Sobrenome</th>
                                <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 100%;">E-mail</th>
                                <th scope="col" class="tabela_container_cabecalho_titulo" style="width: 100%;">Ações</th>
                            </tr>
                        </thead>
                        <tbody >
                            @forelse ($usuarios as $user)
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
                                                <button class="btn btn-info" onclick ="location.href='{{ route('user.edit', $user->id) }}'">
                                                    <img src="{{ asset('img/icon_editar.svg') }}" alt="Orientação" width="22px" >
                                                </button>
                                                <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#deletar-usuario-{{$user->id}}"><img src="{{ asset('img/icon_lixeira.svg') }}" alt="Deletar usuário" width="22px" ></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <td id="tabela_container_linha">
                                    Sem usuários cadastrados ainda
                                </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer" style="background-color: #fff; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
                    <div><h6 style="font-weight: bold">Legenda:</h6></div>
                    <div class="form-row">
                        <div style="margin: 5px">
                            <button class="btn btn-info" class="btn btn-success" style="margin-right: 10px" disabled>
                            <img class="card-img-left example-card-img-responsive" src="img/icon_editar.svg" width="16px"/>
                            </button> Editar Usuário</div>
                        <div style="margin: 5px">
                            <button class="btn btn-danger" class="btn btn-success" style="margin-right: 10px" disabled>
                            <img class="card-img-left example-card-img-responsive" src="img/icon_lixeira.svg" width="16px"/>
                            </button> Deletar Usuário</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($usuarios as $user)
    <div class="modal fade" id="deletar-usuario-{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deletar {{ $user->nome. ' '.  $user->sobrenome }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-delete-usuario-{{$user->id}}" method="POST" action="{{ route('user.destroy', $user->id)}} ">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        Tem certeza que deseja deletar o usuário {{ $user->nome. ' '.  $user->sobrenome }}?
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" form="form-delete-usuario-{{$user->id}}">Deletar</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection