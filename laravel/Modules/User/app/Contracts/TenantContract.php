<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Xot\Contracts\UserContract;

/**
 * @property Collection<int, Model&UserContract> $members
 * @property int|null $members_count
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @phpstan-require-extends Model
 */
interface TenantContract extends ModelContract
{
    // belongstomany or hasmany ?
    // public function users(): HasMany;
}
