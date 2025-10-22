<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurveyUrlParameter;
use Modules\Xot\Contracts\UserContract;

class LimeSurveyUrlParameterPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey_url_parameter.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurveyUrlParameter $lime_survey_url_parameter): bool
    {
        return $user->hasPermissionTo('lime_survey_url_parameter.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey_url_parameter.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurveyUrlParameter $lime_survey_url_parameter): bool
    {
        return $user->hasPermissionTo('lime_survey_url_parameter.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurveyUrlParameter $lime_survey_url_parameter): bool
    {
        return $user->hasPermissionTo('lime_survey_url_parameter.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurveyUrlParameter $lime_survey_url_parameter): bool
    {
        return $user->hasPermissionTo('lime_survey_url_parameter.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurveyUrlParameter $lime_survey_url_parameter): bool
    {
        return $user->hasPermissionTo('lime_survey_url_parameter.forceDelete');
    }
}