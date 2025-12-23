<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeAnswerL10n;
use Modules\Xot\Contracts\UserContract;

class LimeAnswerL10nPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_answer_l10n.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeAnswerL10n $lime_answer_l10n): bool
    {
        return $user->hasPermissionTo('lime_answer_l10n.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_answer_l10n.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeAnswerL10n $lime_answer_l10n): bool
    {
        return $user->hasPermissionTo('lime_answer_l10n.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeAnswerL10n $lime_answer_l10n): bool
    {
        return $user->hasPermissionTo('lime_answer_l10n.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeAnswerL10n $lime_answer_l10n): bool
    {
        return $user->hasPermissionTo('lime_answer_l10n.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeAnswerL10n $lime_answer_l10n): bool
    {
        return $user->hasPermissionTo('lime_answer_l10n.forceDelete');
    }
}