<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurveysLanguagesetting;
use Modules\Xot\Contracts\UserContract;

class LimeSurveysLanguagesettingPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_surveys_languagesetting.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurveysLanguagesetting $lime_surveys_languagesetting): bool
    {
        return $user->hasPermissionTo('lime_surveys_languagesetting.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_surveys_languagesetting.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurveysLanguagesetting $lime_surveys_languagesetting): bool
    {
        return $user->hasPermissionTo('lime_surveys_languagesetting.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurveysLanguagesetting $lime_surveys_languagesetting): bool
    {
        return $user->hasPermissionTo('lime_surveys_languagesetting.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurveysLanguagesetting $lime_surveys_languagesetting): bool
    {
        return $user->hasPermissionTo('lime_surveys_languagesetting.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurveysLanguagesetting $lime_surveys_languagesetting): bool
    {
        return $user->hasPermissionTo('lime_surveys_languagesetting.forceDelete');
    }
}