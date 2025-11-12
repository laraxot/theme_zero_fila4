<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeTutorialEntry;
use Modules\Xot\Contracts\UserContract;

class LimeTutorialEntryPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entry.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeTutorialEntry $lime_tutorial_entry): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entry.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entry.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeTutorialEntry $lime_tutorial_entry): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entry.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeTutorialEntry $lime_tutorial_entry): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entry.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeTutorialEntry $lime_tutorial_entry): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entry.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeTutorialEntry $lime_tutorial_entry): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entry.forceDelete');
    }
}