<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeQuotaMember;
use Modules\Xot\Contracts\UserContract;

class LimeQuotaMemberPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_quota_member.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeQuotaMember $lime_quota_member): bool
    {
        return $user->hasPermissionTo('lime_quota_member.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_quota_member.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeQuotaMember $lime_quota_member): bool
    {
        return $user->hasPermissionTo('lime_quota_member.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeQuotaMember $lime_quota_member): bool
    {
        return $user->hasPermissionTo('lime_quota_member.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeQuotaMember $lime_quota_member): bool
    {
        return $user->hasPermissionTo('lime_quota_member.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeQuotaMember $lime_quota_member): bool
    {
        return $user->hasPermissionTo('lime_quota_member.forceDelete');
    }
}