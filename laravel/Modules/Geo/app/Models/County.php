<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static Builder|County newModelQuery()
 * @method static Builder|County newQuery()
 * @method static Builder|County query()
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @mixin IdeHelperCounty
 * @mixin \Eloquent
 */
class County extends BaseModel
{
    protected $fillable = [
        'state_id',
        'county',
        'state_index',
    ];
}
