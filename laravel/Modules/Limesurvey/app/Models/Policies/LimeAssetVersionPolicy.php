<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Models\Policies;

use Modules\Limesurvey\Models\LimeAssetVersion;
use Modules\Xot\Contracts\UserContract;

class LimeAssetVersionPolicy extends LimesurveyBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_asset_version.viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, LimeAssetVersion $lime_asset_version): bool
    {
        return $user->hasPermissionTo('lime_asset_version.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('lime_asset_version.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, LimeAssetVersion $lime_asset_version): bool
    {
        return $user->hasPermissionTo('lime_asset_version.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, LimeAssetVersion $lime_asset_version): bool
    {
        return $user->hasPermissionTo('lime_asset_version.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, LimeAssetVersion $lime_asset_version): bool
    {
        return $user->hasPermissionTo('lime_asset_version.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, LimeAssetVersion $lime_asset_version): bool
    {
        return $user->hasPermissionTo('lime_asset_version.forceDelete');
    }
}