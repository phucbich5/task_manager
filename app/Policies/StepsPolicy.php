<?php

namespace App\Policies;

use App\Models\Step;
// use App\Http\Livewire\Steps;
use App\Models\User;
// use App\Http\Livewire\Users;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StepsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function before($user, $ability)
    {
            if ($user->isAdmin()) {
                return true;
            }
    }
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Step  $steps
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function grantview(User $user, Step $steps)
    {
        //
        return $user->id === $steps->assigned_to;   
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Step  $steps
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Step $steps)
    {
        //
        // dd($user->id , $steps->assigned_to);

        return $user->id === $steps->assigned_to;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Steps  $steps
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Step $steps)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Step  $steps
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Step $steps)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Step  $steps
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Step $steps)
    {
        //
    }
}
