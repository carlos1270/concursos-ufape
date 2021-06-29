@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Usuários</h6>
                    <a class="btn btn-primary" href="{{ route('create.user') }}" style="margin-top:10px;">Criar usuário</a>
                </div>
                <div class="card-body">
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
                                                <button class="btn btn-info" onclick ="location.href='{{ route('edit.user', ['usuario' => $user->id]) }}'">
                                                    <img src="{{ asset('img/icon_editar.svg') }}" alt="Orientação" width="22px" >
                                                </button>
                                                <button class="btn btn-danger" onclick="if(confirm('Tem certeza que deseja deletar o usuário?')) 
                                                    location.href='{{route('delete.user', $user->id)}}'">
                                                    <img src="{{ asset('img/icon_lixeira.svg') }}" alt="Orientação" width="22px">
                                                </button>
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
@endsection