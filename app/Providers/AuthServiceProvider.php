<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Concurso;
use App\Models\Arquivo;
use App\Models\Inscricao;
use App\Models\NotaDeTexto;
use App\Policies\ConcursoPolicy;
use App\Policies\InscricaoPolicy;
use App\Policies\ArquivoPolicy;
use App\Policies\NotaDeTextoPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Concurso::class =>  ConcursoPolicy::class,
        Inscricao::class => InscricaoPolicy::class,
        Arquivo::class => ArquivoPolicy::class,
        NotaDeTexto::class => NotaDeTextoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
