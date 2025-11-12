<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeQuestion;
use Modules\Xot\Contracts\UserContract;

class LimeQuestionPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_question.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeQuestion $lime_question): bool
    {
        return $user->hasPermissionTo('lime_question.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_question.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeQuestion $lime_question): bool
    {
        return $user->hasPermissionTo('lime_question.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeQuestion $lime_question): bool
    {
        return $user->hasPermissionTo('lime_question.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeQuestion $lime_question): bool
    {
        return $user->hasPermissionTo('lime_question.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeQuestion $lime_question): bool
    {
        return $user->hasPermissionTo('lime_question.forceDelete');
    }
}