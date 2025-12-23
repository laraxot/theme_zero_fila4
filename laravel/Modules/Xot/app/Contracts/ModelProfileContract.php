<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Modules\User\Models\Role;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

/**
 * Modules\Xot\Contracts\ModelProfileContract.
 *
 * @property string $id
 * @property string $email
 * @property Collection<int, Role> $roles
 * @property int|null $roles_count
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
interface ModelProfileContract extends ModelContract
{
    /**
     * Grant the given permission(s) to a role.
     *
     * @param  string|int|array<int, string|int|Permission>|Permission|\Illuminate\Support\Collection<int, Permission>  $permissions
     * @return $this
     */
    public function givePermissionTo(string|int|array|Permission|\Illuminate\Support\Collection $permissions = []);

    /**
     * Assign the given role to the model.
     *
     * @param  array<int, string|int|\Spatie\Permission\Contracts\Role>|string|int|\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection<int, \Spatie\Permission\Contracts\Role>  $roles
     * @return $this
     */
    public function assignRole(array|string|int|\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection $roles = [
    ]);

    /**
     * Determine if the model has (one of) the given role(s).
     *
     * @param  string|int|array<int, string|int|\Spatie\Permission\Contracts\Role>|\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection<int, \Spatie\Permission\Contracts\Role>  $roles
     */
    public function hasRole(
        string|int|array|\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection $roles,
        null|string $guard = null,
    ): bool;

    /**
     * Determine if the model has any of the given role(s).
     *
     * Alias to hasRole() but without Guard controls
     *
     * @param  string|int|array<int, string|int|\Spatie\Permission\Contracts\Role>|\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection<int, \Spatie\Permission\Contracts\Role>  $roles
     */
    public function hasAnyRole(string|int|array|\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection $roles = [
    ]): bool;

    /**
     * Determine if the model may perform the given permission.
     *
     * @throws PermissionDoesNotExist
     */
    public function hasPermissionTo(string|int|Permission $permission, null|string $guardName = null): bool;

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query);
}
