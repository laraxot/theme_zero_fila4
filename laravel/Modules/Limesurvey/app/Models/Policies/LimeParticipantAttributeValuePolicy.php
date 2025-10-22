<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeParticipantAttributeValue;
use Modules\Xot\Contracts\UserContract;

class LimeParticipantAttributeValuePolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_value.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeParticipantAttributeValue $lime_participant_attribute_value): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_value.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_value.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeParticipantAttributeValue $lime_participant_attribute_value): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_value.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeParticipantAttributeValue $lime_participant_attribute_value): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_value.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeParticipantAttributeValue $lime_participant_attribute_value): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_value.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeParticipantAttributeValue $lime_participant_attribute_value): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_value.forceDelete');
    }
}