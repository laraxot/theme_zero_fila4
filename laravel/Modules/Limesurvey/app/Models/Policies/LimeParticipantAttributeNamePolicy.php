<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeParticipantAttributeName;
use Modules\Xot\Contracts\UserContract;

class LimeParticipantAttributeNamePolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_name.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeParticipantAttributeName $lime_participant_attribute_name): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_name.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_name.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeParticipantAttributeName $lime_participant_attribute_name): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_name.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeParticipantAttributeName $lime_participant_attribute_name): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_name.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeParticipantAttributeName $lime_participant_attribute_name): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_name.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeParticipantAttributeName $lime_participant_attribute_name): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_name.forceDelete');
    }
}