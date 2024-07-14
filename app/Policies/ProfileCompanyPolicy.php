<?php

namespace App\Policies;

use App\Models\ProfileCompany;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProfileCompanyPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ProfileCompany $profileCompany): bool
    {
        return $user->hasPermissionTo('view profilecompanies');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create profilecompanies');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ProfileCompany $profileCompany): bool
    {
        return $user->hasPermissionTo('update profilecompanies');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ProfileCompany $profileCompany): bool
    {
        return $user->hasPermissionTo('delete profilecompanies');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ProfileCompany $profileCompany): bool
    {
        return $user->hasPermissionTo('restore profilecompanies');
    }
}
