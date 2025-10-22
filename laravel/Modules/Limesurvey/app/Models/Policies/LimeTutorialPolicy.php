<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeTutorial;
use Modules\Xot\Contracts\UserContract;

class LimeTutorialPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tutorial.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeTutorial $lime_tutorial): bool
    {
        return $user->hasPermissionTo('lime_tutorial.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_tutorial.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeTutorial $lime_tutorial): bool
    {
        return $user->hasPermissionTo('lime_tutorial.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeTutorial $lime_tutorial): bool
    {
        return $user->hasPermissionTo('lime_tutorial.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeTutorial $lime_tutorial): bool
    {
        return $user->hasPermissionTo('lime_tutorial.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeTutorial $lime_tutorial): bool
    {
        return $user->hasPermissionTo('lime_tutorial.forceDelete');
    }
}