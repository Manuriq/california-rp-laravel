<?php

namespace App\Policies;

use App\Models\Comptes;
use Illuminate\Auth\Access\HandlesAuthorization;

class ForumPolicy
{

    public function before(Comptes $user, $ability)
    {
        if($user->isAdmin()){
            return true;
        }
    }

    public function createCategories($user): bool
    {
        return false;
    }

    public function manageCategories($user): bool
    {
        return $this->moveCategories($user) ||
               $this->renameCategories($user);
    }

    public function moveCategories($user): bool
    {
        return false;
    }

    public function renameCategories($user): bool
    {
        return false;
    }

    public function markThreadsAsRead($user): bool
    {
        return true;
    }

    public function viewTrashedThreads($user): bool
    {
        return true;
    }

    public function viewTrashedPosts($user): bool
    {
        return true;
    }
}

