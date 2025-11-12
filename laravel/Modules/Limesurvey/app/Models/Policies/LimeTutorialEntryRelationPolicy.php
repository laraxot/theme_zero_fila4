<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeTutorialEntryRelation;
use Modules\Xot\Contracts\UserContract;

class LimeTutorialEntryRelationPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entry_relation.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeTutorialEntryRelation $lime_tutorial_entry_relation): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entry_relation.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entry_relation.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeTutorialEntryRelation $lime_tutorial_entry_relation): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entry_relation.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeTutorialEntryRelation $lime_tutorial_entry_relation): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entry_relation.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeTutorialEntryRelation $lime_tutorial_entry_relation): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entry_relation.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeTutorialEntryRelation $lime_tutorial_entry_relation): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entry_relation.forceDelete');
    }
}