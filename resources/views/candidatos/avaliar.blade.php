@extends('templates.template-principal')
@section('content')
<div class="container" style="margin-top: 5rem; margin-bottom: 8rem;">
    <div class="form-row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow bg-white style_card_container">
                <div class="card-header d-flex justify-content-between bg-white" id="style_card_container_header">
                    <h6 class="style_card_container_header_titulo">Inscrições do concurso {{$concurso->titulo}}</h6>
                    @can('create', App\Models\Concurso::class)
                        <a href="{{route('concurso.create')}}" class="btn btn-primary" style="margin-top:10px;">Criar concurso</a>
                    @endcan
                </div>
                @if($inscricoes->count() > 0)
                    <!-- um ou mais concursos -->
                    <div class="card-body">
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection