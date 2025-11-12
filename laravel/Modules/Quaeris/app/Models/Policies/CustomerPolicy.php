<?php

declare(strict_types=1);

namespace Modules\Quaeris\Models\Policies;

use Modules\Xot\Contracts\UserContract;
use Modules\User\Models\Policies\UserBasePolicy;
use Modules\Quaeris\Models\Customer as Record;

class CustomerPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @return false
     */
    public function viewAny(UserContract $user): bool
    {
        //return false;
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, Record $record): bool
    {
        //return $user->belongsToTeam($record);
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @return true
     */
    public function create(UserContract $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, Record $record): bool
    {
        //return $user->ownsTeam($record);
        return true;
    }

    /**
     * Determine whether the user can add team members.
     */
    public function addTeamMember(UserContract $user, Record $record): bool
    {
        //return $user->ownsTeam($record);
        return true;
    }

    /**
     * Determine whether the user can update team member permissions.
     */
    public function updateTeamMember(UserContract $user, Record $record): bool
    {
        //return $user->ownsTeam($record);
        return true;
    }

    /**
     * Determine whether the user can remove team members.
     */
    public function removeTeamMember(UserContract $user, Record $record): bool
    {
        //return $user->ownsTeam($record);
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, Record $record): bool
    {
        //return $user->ownsTeam($record);
        return true;
    }
}
