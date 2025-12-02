<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeQuestionAttribute;
use Modules\Xot\Contracts\UserContract;

class LimeQuestionAttributePolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_question_attribute.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeQuestionAttribute $lime_question_attribute): bool
    {
        return $user->hasPermissionTo('lime_question_attribute.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_question_attribute.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeQuestionAttribute $lime_question_attribute): bool
    {
        return $user->hasPermissionTo('lime_question_attribute.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeQuestionAttribute $lime_question_attribute): bool
    {
        return $user->hasPermissionTo('lime_question_attribute.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeQuestionAttribute $lime_question_attribute): bool
    {
        return $user->hasPermissionTo('lime_question_attribute.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeQuestionAttribute $lime_question_attribute): bool
    {
        return $user->hasPermissionTo('lime_question_attribute.forceDelete');
    }
}