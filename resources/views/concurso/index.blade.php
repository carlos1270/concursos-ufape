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

    <div class="container">
        <table></table>
    </div>
</x-app-layout>