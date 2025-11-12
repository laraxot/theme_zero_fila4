<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeAnswer;
use Modules\Xot\Contracts\UserContract;

class LimeAnswerPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_answer.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeAnswer $lime_answer): bool
    {
        return $user->hasPermissionTo('lime_answer.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_answer.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeAnswer $lime_answer): bool
    {
        return $user->hasPermissionTo('lime_answer.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeAnswer $lime_answer): bool
    {
        return $user->hasPermissionTo('lime_answer.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeAnswer $lime_answer): bool
    {
        return $user->hasPermissionTo('lime_answer.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeAnswer $lime_answer): bool
    {
        return $user->hasPermissionTo('lime_answer.forceDelete');
    }
}