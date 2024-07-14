<?php

namespace App\Policies;

use App\Models\Benefit;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BenefitPolicy
{

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Benefit $benefit): bool
    {
        return $user->hasPermissionTo('view benefits');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create benefits');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Benefit $benefit): bool
    {
        return $user->hasPermissionTo('update benefits');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Benefit $benefit): bool
    {
        return $user->hasPermissionTo('delete benefits');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Benefit $benefit): bool
    {
        return $user->hasPermissionTo('restore benefits');
    }

}
