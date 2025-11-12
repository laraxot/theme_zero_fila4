<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurvey657328;
use Modules\Xot\Contracts\UserContract;

class LimeSurvey657328Policy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey657328.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurvey657328 $lime_survey657328): bool
    {
        return $user->hasPermissionTo('lime_survey657328.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey657328.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurvey657328 $lime_survey657328): bool
    {
        return $user->hasPermissionTo('lime_survey657328.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurvey657328 $lime_survey657328): bool
    {
        return $user->hasPermissionTo('lime_survey657328.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurvey657328 $lime_survey657328): bool
    {
        return $user->hasPermissionTo('lime_survey657328.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurvey657328 $lime_survey657328): bool
    {
        return $user->hasPermissionTo('lime_survey657328.forceDelete');
    }
}