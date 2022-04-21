<?php

namespace App\Policies;

use App\Models\Compte;
use App\Models\Message;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param  \App\Models\Compte  $compte
     * @param  string  $ability
     * @return void|bool
     */
    public function before(Compte $compte, $ability)
    {
        if ($compte->cAdmin >= 5) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Compte $compte)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Compte  $compte
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Compte $compte, Message $message)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Compte $compte)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Compte  $compte
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Compte $compte, Message $message)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Compte  $compte
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Compte $compte, Message $message)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Compte  $compte
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Compte $compte, Message $message)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Compte  $compte
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Compte $compte, Message $message)
    {
        //
    }
}
