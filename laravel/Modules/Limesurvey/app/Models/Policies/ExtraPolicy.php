<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\Extra;
use Modules\Xot\Contracts\UserContract;

class ExtraPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('extra.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, Extra $extra): bool
    {
        return $user->hasPermissionTo('extra.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('extra.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, Extra $extra): bool
    {
        return $user->hasPermissionTo('extra.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, Extra $extra): bool
    {
        return $user->hasPermissionTo('extra.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, Extra $extra): bool
    {
        return $user->hasPermissionTo('extra.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, Extra $extra): bool
    {
        return $user->hasPermissionTo('extra.forceDelete');
    }
}