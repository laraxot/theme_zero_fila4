<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeUserGroup;
use Modules\Xot\Contracts\UserContract;

class LimeUserGroupPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_user_group.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeUserGroup $lime_user_group): bool
    {
        return $user->hasPermissionTo('lime_user_group.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_user_group.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeUserGroup $lime_user_group): bool
    {
        return $user->hasPermissionTo('lime_user_group.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeUserGroup $lime_user_group): bool
    {
        return $user->hasPermissionTo('lime_user_group.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeUserGroup $lime_user_group): bool
    {
        return $user->hasPermissionTo('lime_user_group.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeUserGroup $lime_user_group): bool
    {
        return $user->hasPermissionTo('lime_user_group.forceDelete');
    }
}