<?php

namespace App\Policies;

use App\Models\Compte;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Compte $compte, Post $post)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Compte $compte)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Compte  $compte
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Compte $compte, Post $post)
    {
        return $post->compte->id === $compte->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Compte  $compte
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Compte $compte, Post $post)
    {
        return $post->compte->id === $compte->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Compte  $compte
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Compte $compte, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Compte  $compte
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Compte $compte, Post $post)
    {
        //
    }
}
