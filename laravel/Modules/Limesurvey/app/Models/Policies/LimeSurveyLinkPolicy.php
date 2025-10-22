<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurveyLink;
use Modules\Xot\Contracts\UserContract;

class LimeSurveyLinkPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey_link.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurveyLink $lime_survey_link): bool
    {
        return $user->hasPermissionTo('lime_survey_link.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey_link.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurveyLink $lime_survey_link): bool
    {
        return $user->hasPermissionTo('lime_survey_link.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurveyLink $lime_survey_link): bool
    {
        return $user->hasPermissionTo('lime_survey_link.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurveyLink $lime_survey_link): bool
    {
        return $user->hasPermissionTo('lime_survey_link.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurveyLink $lime_survey_link): bool
    {
        return $user->hasPermissionTo('lime_survey_link.forceDelete');
    }
}