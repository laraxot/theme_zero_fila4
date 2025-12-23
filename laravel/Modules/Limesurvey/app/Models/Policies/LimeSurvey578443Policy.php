<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSurvey578443;
use Modules\Xot\Contracts\UserContract;

class LimeSurvey578443Policy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey578443.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSurvey578443 $lime_survey578443): bool
    {
        return $user->hasPermissionTo('lime_survey578443.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_survey578443.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSurvey578443 $lime_survey578443): bool
    {
        return $user->hasPermissionTo('lime_survey578443.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSurvey578443 $lime_survey578443): bool
    {
        return $user->hasPermissionTo('lime_survey578443.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSurvey578443 $lime_survey578443): bool
    {
        return $user->hasPermissionTo('lime_survey578443.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSurvey578443 $lime_survey578443): bool
    {
        return $user->hasPermissionTo('lime_survey578443.forceDelete');
    }
}