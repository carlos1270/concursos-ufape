<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-sm-10">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Concursos') }}
                </h2>
            </div>
    
            <div class="col-sm-2">
                <a href="{{route('concurso.create')}}" class="btn btn-primary">Criar novo</a>
            </div>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container" style="margin-top: 40px; margin-bottom:40px;">
                    @if(session('mensage'))
                        <div class="row">
                            <div class="col-md-12" style="margin-top: 5px;">
                                <div class="alert alert-success">
                                    <p>{{session('mensage')}}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Titulo</th>
                                <th scope="col">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($concursos as $concurso)
                                <tr>
                                    <td>{{$concurso->titulo}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <a href="{{route('concurso.edit', ['concurso' => $concurso->id])}}" class="btn btn-primary">Editar</a>
                                            </div>
                                            <div class="col-sm-2">
                                                <form method="POST" action="{{route('concurso.destroy', ['concurso' => $concurso->id])}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button href="" class="btn btn-danger">Excluir</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>