<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeQuota;
use Modules\Xot\Contracts\UserContract;

class LimeQuotaPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_quota.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeQuota $lime_quota): bool
    {
        return $user->hasPermissionTo('lime_quota.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_quota.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeQuota $lime_quota): bool
    {
        return $user->hasPermissionTo('lime_quota.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeQuota $lime_quota): bool
    {
        return $user->hasPermissionTo('lime_quota.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeQuota $lime_quota): bool
    {
        return $user->hasPermissionTo('lime_quota.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeQuota $lime_quota): bool
    {
        return $user->hasPermissionTo('lime_quota.forceDelete');
    }
}