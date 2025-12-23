<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeUser;
use Modules\Xot\Contracts\UserContract;

class LimeUserPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_user.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeUser $lime_user): bool
    {
        return $user->hasPermissionTo('lime_user.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_user.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeUser $lime_user): bool
    {
        return $user->hasPermissionTo('lime_user.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeUser $lime_user): bool
    {
        return $user->hasPermissionTo('lime_user.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeUser $lime_user): bool
    {
        return $user->hasPermissionTo('lime_user.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeUser $lime_user): bool
    {
        return $user->hasPermissionTo('lime_user.forceDelete');
    }
}