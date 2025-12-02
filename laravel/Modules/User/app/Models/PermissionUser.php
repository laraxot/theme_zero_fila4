<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Modules\Xot\Contracts\ProfileContract;
use Modules\User\Database\Factories\PermissionUserFactory;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static PermissionUserFactory factory($count = null, $state = [])
 * @method static Builder<static>|PermissionUser newModelQuery()
 * @method static Builder<static>|PermissionUser newQuery()
 * @method static Builder<static>|PermissionUser query()
 * @mixin IdeHelperPermissionUser
 * @mixin \Eloquent
 */
class PermissionUser extends ModelHasPermission
{
}
