<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeFailedLoginAttempt;
use Modules\Xot\Contracts\UserContract;

class LimeFailedLoginAttemptPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_failed_login_attempt.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeFailedLoginAttempt $lime_failed_login_attempt): bool
    {
        return $user->hasPermissionTo('lime_failed_login_attempt.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_failed_login_attempt.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeFailedLoginAttempt $lime_failed_login_attempt): bool
    {
        return $user->hasPermissionTo('lime_failed_login_attempt.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeFailedLoginAttempt $lime_failed_login_attempt): bool
    {
        return $user->hasPermissionTo('lime_failed_login_attempt.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeFailedLoginAttempt $lime_failed_login_attempt): bool
    {
        return $user->hasPermissionTo('lime_failed_login_attempt.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeFailedLoginAttempt $lime_failed_login_attempt): bool
    {
        return $user->hasPermissionTo('lime_failed_login_attempt.forceDelete');
    }
}