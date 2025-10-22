<?php

declare(strict_types=1);

namespace Modules\Quaeris\Models\Policies;

use Modules\Quaeris\Models\CustomerUser;
use Modules\Xot\Contracts\UserContract;

class CustomerUserPolicy extends QuaerisBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('customer_user.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, CustomerUser $customer_user): bool
    {
        return $user->hasPermissionTo('customer_user.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('customer_user.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, CustomerUser $customer_user): bool
    {
        return $user->hasPermissionTo('customer_user.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, CustomerUser $customer_user): bool
    {
        return $user->hasPermissionTo('customer_user.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, CustomerUser $customer_user): bool
    {
        return $user->hasPermissionTo('customer_user.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, CustomerUser $customer_user): bool
    {
        return $user->hasPermissionTo('customer_user.forceDelete');
    }
}