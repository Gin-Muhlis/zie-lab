<?php

namespace App\Policies;

use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TransactionDetailPolicy
{

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TransactionDetail $transactionDetail): bool
    {
        return $user->hasPermissionTo('view transactiondetails');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create transactiondetails');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TransactionDetail $transactionDetail): bool
    {
        return $user->hasPermissionTo('update transactiondetails');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TransactionDetail $transactionDetail): bool
    {
        return $user->hasPermissionTo('delete transactiondetails');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TransactionDetail $transactionDetail): bool
    {
        return $user->hasPermissionTo('restore transactiondetails');
    }
}
