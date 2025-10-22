<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeLabelset;
use Modules\Xot\Contracts\UserContract;

class LimeLabelsetPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_labelset.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeLabelset $lime_labelset): bool
    {
        return $user->hasPermissionTo('lime_labelset.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_labelset.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeLabelset $lime_labelset): bool
    {
        return $user->hasPermissionTo('lime_labelset.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeLabelset $lime_labelset): bool
    {
        return $user->hasPermissionTo('lime_labelset.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeLabelset $lime_labelset): bool
    {
        return $user->hasPermissionTo('lime_labelset.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeLabelset $lime_labelset): bool
    {
        return $user->hasPermissionTo('lime_labelset.forceDelete');
    }
}