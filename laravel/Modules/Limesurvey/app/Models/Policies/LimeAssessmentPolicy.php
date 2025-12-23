<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeAssessment;
use Modules\Xot\Contracts\UserContract;

class LimeAssessmentPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_assessment.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeAssessment $lime_assessment): bool
    {
        return $user->hasPermissionTo('lime_assessment.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_assessment.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeAssessment $lime_assessment): bool
    {
        return $user->hasPermissionTo('lime_assessment.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeAssessment $lime_assessment): bool
    {
        return $user->hasPermissionTo('lime_assessment.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeAssessment $lime_assessment): bool
    {
        return $user->hasPermissionTo('lime_assessment.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeAssessment $lime_assessment): bool
    {
        return $user->hasPermissionTo('lime_assessment.forceDelete');
    }
}