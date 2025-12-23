<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Modules\User\Database\Factories\TenantFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Media\Models\Media;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Contracts\UserContract;

/**
 * Modules\User\Models\Tenant.
 *
 * @method static TenantFactory factory($count = null, $state = [])
 * @method static Builder|Tenant newModelQuery()
 * @method static Builder|Tenant newQuery()
 * @method static Builder|Tenant query()
 * @property EloquentCollection<int, Model&UserContract> $members
 * @property int|null $members_count
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property MediaCollection<int, Media> $media
 * @property int|null $media_count
 * @property TenantUser $pivot
 * @property EloquentCollection<int, User> $users
 * @property int|null $users_count
 * @mixin IdeHelperTenant
 * @mixin \Eloquent
 */
class Tenant extends BaseTenant
{
}
