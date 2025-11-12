<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeSession;
use Modules\Xot\Contracts\UserContract;

class LimeSessionPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_session.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeSession $lime_session): bool
    {
        return $user->hasPermissionTo('lime_session.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_session.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeSession $lime_session): bool
    {
        return $user->hasPermissionTo('lime_session.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeSession $lime_session): bool
    {
        return $user->hasPermissionTo('lime_session.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeSession $lime_session): bool
    {
        return $user->hasPermissionTo('lime_session.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeSession $lime_session): bool
    {
        return $user->hasPermissionTo('lime_session.forceDelete');
    }
}