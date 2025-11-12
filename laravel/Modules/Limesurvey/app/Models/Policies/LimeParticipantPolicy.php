<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeParticipant;
use Modules\Xot\Contracts\UserContract;

class LimeParticipantPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_participant.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeParticipant $lime_participant): bool
    {
        return $user->hasPermissionTo('lime_participant.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_participant.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeParticipant $lime_participant): bool
    {
        return $user->hasPermissionTo('lime_participant.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeParticipant $lime_participant): bool
    {
        return $user->hasPermissionTo('lime_participant.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeParticipant $lime_participant): bool
    {
        return $user->hasPermissionTo('lime_participant.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeParticipant $lime_participant): bool
    {
        return $user->hasPermissionTo('lime_participant.forceDelete');
    }
}