<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurvey628829Timings;
use Modules\Xot\Contracts\UserContract;

class LimeSurvey628829TimingsPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey628829timings.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurvey628829Timings $lime_survey628829timings): bool
    {
        return $user->hasPermissionTo('lime_survey628829timings.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey628829timings.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurvey628829Timings $lime_survey628829timings): bool
    {
        return $user->hasPermissionTo('lime_survey628829timings.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurvey628829Timings $lime_survey628829timings): bool
    {
        return $user->hasPermissionTo('lime_survey628829timings.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurvey628829Timings $lime_survey628829timings): bool
    {
        return $user->hasPermissionTo('lime_survey628829timings.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurvey628829Timings $lime_survey628829timings): bool
    {
        return $user->hasPermissionTo('lime_survey628829timings.forceDelete');
    }
}