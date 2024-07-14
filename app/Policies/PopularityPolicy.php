<?php

namespace App\Policies;

use App\Models\Popularity;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PopularityPolicy
{

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Popularity $popularity): bool
    {
        return $user->hasPermissionTo('view popularities');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create popularities');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Popularity $popularity): bool
    {
        return $user->hasPermissionTo('update popularities');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Popularity $popularity): bool
    {
        return $user->hasPermissionTo('delete popularities');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Popularity $popularity): bool
    {
        return $user->hasPermissionTo('restore popularities');
    }
}
