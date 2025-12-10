<?php

declare(strict_types=1);

namespace Modules\Quaeris\Models\Policies;


use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
use Modules\User\Models\Team;

use Modules\User\Models\User;
use Illuminate\Support\Facades\Route;
use Modules\User\Models\Policies\UserBasePolicy;

class QuestionChartPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        Assert::notNull(Route::current(), '['.__FILE__.']['.__LINE__.']');
        $route = Route::current()->getName();
        Assert::notNull($route, '['.__FILE__.']['.__LINE__.']');

        if (Str::contains($route, 'dashboard')) {
            return true;
        }

        if (Str::contains($route, 'dashboard-one')) {
            return true;
        }

        // dd($route);
        return (bool) Str::contains($route, 'dashboard-one');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Team $team): bool
    {
        return $user->belongsToTeam($team);
    }

    /**
     * Determine whether the user can create models.
     *
     * @return true
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    // public function update(User $user, Team $team): bool
    public function update(User $user): bool
    {
        // return $user->ownsTeam($team);
        return false;
    }

    /**
     * Determine whether the user can add team members.
     */
    public function addTeamMember(User $user, Team $team): bool
    {
        return $user->ownsTeam($team);
    }

    /**
     * Determine whether the user can update team member permissions.
     */
    public function updateTeamMember(User $user, Team $team): bool
    {
        return $user->ownsTeam($team);
    }

    /**
     * Determine whether the user can remove team members.
     */
    public function removeTeamMember(User $user, Team $team): bool
    {
        return $user->ownsTeam($team);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Team $team): bool
    {
        return $user->ownsTeam($team);
    }
}
