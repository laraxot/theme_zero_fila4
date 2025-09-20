<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\SurveyFlipResponse;
use Modules\Xot\Contracts\UserContract;

class SurveyFlipResponsePolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('survey_flip_response.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, SurveyFlipResponse $survey_flip_response): bool
    {
        return $user->hasPermissionTo('survey_flip_response.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('survey_flip_response.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, SurveyFlipResponse $survey_flip_response): bool
    {
        return $user->hasPermissionTo('survey_flip_response.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, SurveyFlipResponse $survey_flip_response): bool
    {
        return $user->hasPermissionTo('survey_flip_response.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, SurveyFlipResponse $survey_flip_response): bool
    {
        return $user->hasPermissionTo('survey_flip_response.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, SurveyFlipResponse $survey_flip_response): bool
    {
        return $user->hasPermissionTo('survey_flip_response.forceDelete');
    }
}