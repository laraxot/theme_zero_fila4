<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeNotification;
use Modules\Xot\Contracts\UserContract;

class LimeNotificationPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_notification.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeNotification $lime_notification): bool
    {
        return $user->hasPermissionTo('lime_notification.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_notification.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeNotification $lime_notification): bool
    {
        return $user->hasPermissionTo('lime_notification.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeNotification $lime_notification): bool
    {
        return $user->hasPermissionTo('lime_notification.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeNotification $lime_notification): bool
    {
        return $user->hasPermissionTo('lime_notification.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeNotification $lime_notification): bool
    {
        return $user->hasPermissionTo('lime_notification.forceDelete');
    }
}