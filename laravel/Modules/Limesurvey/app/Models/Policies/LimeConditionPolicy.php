<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeCondition;
use Modules\Xot\Contracts\UserContract;

class LimeConditionPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_condition.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeCondition $lime_condition): bool
    {
        return $user->hasPermissionTo('lime_condition.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_condition.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeCondition $lime_condition): bool
    {
        return $user->hasPermissionTo('lime_condition.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeCondition $lime_condition): bool
    {
        return $user->hasPermissionTo('lime_condition.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeCondition $lime_condition): bool
    {
        return $user->hasPermissionTo('lime_condition.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeCondition $lime_condition): bool
    {
        return $user->hasPermissionTo('lime_condition.forceDelete');
    }
}