<?php

declare(strict_types=1);

namespace Modules\Quaeris\Models\Policies;

use Modules\Quaeris\Models\ContactSimple;
use Modules\Xot\Contracts\UserContract;

class ContactSimplePolicy extends QuaerisBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('contact_simple.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, ContactSimple $contact_simple): bool
    {
        return $user->hasPermissionTo('contact_simple.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('contact_simple.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, ContactSimple $contact_simple): bool
    {
        return $user->hasPermissionTo('contact_simple.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, ContactSimple $contact_simple): bool
    {
        return $user->hasPermissionTo('contact_simple.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, ContactSimple $contact_simple): bool
    {
        return $user->hasPermissionTo('contact_simple.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, ContactSimple $contact_simple): bool
    {
        return $user->hasPermissionTo('contact_simple.forceDelete');
    }
}