<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeGroup;
use Modules\Xot\Contracts\UserContract;

class LimeGroupPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_group.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeGroup $lime_group): bool
    {
        return $user->hasPermissionTo('lime_group.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_group.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeGroup $lime_group): bool
    {
        return $user->hasPermissionTo('lime_group.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeGroup $lime_group): bool
    {
        return $user->hasPermissionTo('lime_group.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeGroup $lime_group): bool
    {
        return $user->hasPermissionTo('lime_group.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeGroup $lime_group): bool
    {
        return $user->hasPermissionTo('lime_group.forceDelete');
    }
}