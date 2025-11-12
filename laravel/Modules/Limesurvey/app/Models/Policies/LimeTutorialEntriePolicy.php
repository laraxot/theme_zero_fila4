<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeTutorialEntrie;
use Modules\Xot\Contracts\UserContract;

class LimeTutorialEntriePolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entrie.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeTutorialEntrie $lime_tutorial_entrie): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entrie.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entrie.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeTutorialEntrie $lime_tutorial_entrie): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entrie.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeTutorialEntrie $lime_tutorial_entrie): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entrie.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeTutorialEntrie $lime_tutorial_entrie): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entrie.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeTutorialEntrie $lime_tutorial_entrie): bool
    {
        return $user->hasPermissionTo('lime_tutorial_entrie.forceDelete');
    }
}