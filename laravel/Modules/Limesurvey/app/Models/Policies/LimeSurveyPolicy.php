<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurvey;
use Modules\Xot\Contracts\UserContract;

class LimeSurveyPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurvey $lime_survey): bool
    {
        return $user->hasPermissionTo('lime_survey.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurvey $lime_survey): bool
    {
        return $user->hasPermissionTo('lime_survey.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurvey $lime_survey): bool
    {
        return $user->hasPermissionTo('lime_survey.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurvey $lime_survey): bool
    {
        return $user->hasPermissionTo('lime_survey.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurvey $lime_survey): bool
    {
        return $user->hasPermissionTo('lime_survey.forceDelete');
    }
}