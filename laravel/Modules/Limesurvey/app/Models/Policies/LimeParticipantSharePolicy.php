<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeParticipantShare;
use Modules\Xot\Contracts\UserContract;

class LimeParticipantSharePolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_participant_share.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeParticipantShare $lime_participant_share): bool
    {
        return $user->hasPermissionTo('lime_participant_share.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_participant_share.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeParticipantShare $lime_participant_share): bool
    {
        return $user->hasPermissionTo('lime_participant_share.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeParticipantShare $lime_participant_share): bool
    {
        return $user->hasPermissionTo('lime_participant_share.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeParticipantShare $lime_participant_share): bool
    {
        return $user->hasPermissionTo('lime_participant_share.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeParticipantShare $lime_participant_share): bool
    {
        return $user->hasPermissionTo('lime_participant_share.forceDelete');
    }
}