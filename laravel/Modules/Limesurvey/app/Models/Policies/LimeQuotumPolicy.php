<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeQuotum;
use Modules\Xot\Contracts\UserContract;

class LimeQuotumPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_quotum.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeQuotum $lime_quotum): bool
    {
        return $user->hasPermissionTo('lime_quotum.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_quotum.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeQuotum $lime_quotum): bool
    {
        return $user->hasPermissionTo('lime_quotum.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeQuotum $lime_quotum): bool
    {
        return $user->hasPermissionTo('lime_quotum.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeQuotum $lime_quotum): bool
    {
        return $user->hasPermissionTo('lime_quotum.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeQuotum $lime_quotum): bool
    {
        return $user->hasPermissionTo('lime_quotum.forceDelete');
    }
}