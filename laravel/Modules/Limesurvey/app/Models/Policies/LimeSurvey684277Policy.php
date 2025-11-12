<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurvey684277;
use Modules\Xot\Contracts\UserContract;

class LimeSurvey684277Policy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey684277.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurvey684277 $lime_survey684277): bool
    {
        return $user->hasPermissionTo('lime_survey684277.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey684277.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurvey684277 $lime_survey684277): bool
    {
        return $user->hasPermissionTo('lime_survey684277.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurvey684277 $lime_survey684277): bool
    {
        return $user->hasPermissionTo('lime_survey684277.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurvey684277 $lime_survey684277): bool
    {
        return $user->hasPermissionTo('lime_survey684277.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurvey684277 $lime_survey684277): bool
    {
        return $user->hasPermissionTo('lime_survey684277.forceDelete');
    }
}