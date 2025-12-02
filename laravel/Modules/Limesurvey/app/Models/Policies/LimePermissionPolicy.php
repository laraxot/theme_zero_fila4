<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimePermission;
use Modules\Xot\Contracts\UserContract;

class LimePermissionPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_permission.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimePermission $lime_permission): bool
    {
        return $user->hasPermissionTo('lime_permission.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_permission.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimePermission $lime_permission): bool
    {
        return $user->hasPermissionTo('lime_permission.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimePermission $lime_permission): bool
    {
        return $user->hasPermissionTo('lime_permission.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimePermission $lime_permission): bool
    {
        return $user->hasPermissionTo('lime_permission.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimePermission $lime_permission): bool
    {
        return $user->hasPermissionTo('lime_permission.forceDelete');
    }
}