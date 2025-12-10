<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeParticipantAttributeNamesLang;
use Modules\Xot\Contracts\UserContract;

class LimeParticipantAttributeNamesLangPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_names_lang.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeParticipantAttributeNamesLang $lime_participant_attribute_names_lang): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_names_lang.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_names_lang.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeParticipantAttributeNamesLang $lime_participant_attribute_names_lang): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_names_lang.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeParticipantAttributeNamesLang $lime_participant_attribute_names_lang): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_names_lang.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeParticipantAttributeNamesLang $lime_participant_attribute_names_lang): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_names_lang.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeParticipantAttributeNamesLang $lime_participant_attribute_names_lang): bool
    {
        return $user->hasPermissionTo('lime_participant_attribute_names_lang.forceDelete');
    }
}