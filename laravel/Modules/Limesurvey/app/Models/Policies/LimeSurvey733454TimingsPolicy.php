<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurvey733454Timings;
use Modules\Xot\Contracts\UserContract;

class LimeSurvey733454TimingsPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey733454timings.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurvey733454Timings $lime_survey733454timings): bool
    {
        return $user->hasPermissionTo('lime_survey733454timings.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey733454timings.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurvey733454Timings $lime_survey733454timings): bool
    {
        return $user->hasPermissionTo('lime_survey733454timings.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurvey733454Timings $lime_survey733454timings): bool
    {
        return $user->hasPermissionTo('lime_survey733454timings.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurvey733454Timings $lime_survey733454timings): bool
    {
        return $user->hasPermissionTo('lime_survey733454timings.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurvey733454Timings $lime_survey733454timings): bool
    {
        return $user->hasPermissionTo('lime_survey733454timings.forceDelete');
    }
}