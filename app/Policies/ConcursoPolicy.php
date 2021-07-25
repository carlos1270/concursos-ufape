<?php

namespace App\Policies;

use App\Models\Concurso;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConcursoPolicy
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
     * @param  \App\Models\Concurso  $concurso
     * @return mixed
     */
    public function view(User $user, Concurso $concurso)
    {
        return $concurso->user->id == $user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == User::ROLE_ENUM["admin"] || $user->role == User::ROLE_ENUM["chefeSetorConcursos"];
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Concurso  $concurso
     * @return mixed
     */
    public function update(User $user, Concurso $concurso)
    {
        return $concurso->user->id == $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Concurso  $concurso
     * @return mixed
     */
    public function delete(User $user, Concurso $concurso)
    {
        return $concurso->user->id == $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Concurso  $concurso
     * @return mixed
     */
    public function restore(User $user, Concurso $concurso)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Concurso  $concurso
     * @return mixed
     */
    public function forceDelete(User $user, Concurso $concurso)
    {
        //
    }

    /**
     * Checa se o usuário pode cadastrar o remover examinadores para um concurso
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Concurso  $concurso
     * @return mixed
     */

    public function operacoesUserBanca(User $user, Concurso $concurso)
    {
        return $concurso->users_id == $user->id;
    }

    public function operacoesNotasDeTexto(User $user, Concurso $concurso)
    {
        return $this->operacoesUserBanca($user, $concurso);
    }
}
