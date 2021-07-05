<?php

namespace App\Policies;

use App\Models\Arquivo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArquivoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Arquivo  $arquivo
     * @return mixed
     */
    public function view(User $user, Arquivo $arquivo)
    {
        $inscricao = $arquivo->inscricao;
        $concurso = $inscricao->concurso;

        return $user->id == $inscricao->users_id || $concurso->users_id == $user->id || $concurso->chefeDaBanca->contains('id', $user->id); 
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Arquivo  $arquivo
     * @return mixed
     */
    public function update(User $user, Arquivo $arquivo)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Arquivo  $arquivo
     * @return mixed
     */
    public function delete(User $user, Arquivo $arquivo)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Arquivo  $arquivo
     * @return mixed
     */
    public function restore(User $user, Arquivo $arquivo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Arquivo  $arquivo
     * @return mixed
     */
    public function forceDelete(User $user, Arquivo $arquivo)
    {
        //
    }
}
