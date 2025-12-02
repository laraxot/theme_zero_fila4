<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Database\Factories\PulseAggregateFactory;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static PulseAggregateFactory factory($count = null, $state = [])
 * @method static Builder|PulseAggregate newModelQuery()
 * @method static Builder|PulseAggregate newQuery()
 * @method static Builder|PulseAggregate query()
 * @property int         $id
 * @property int         $bucket
 * @property int         $period
 * @property string $type
 * @property string $key
 * @property string|null $key_hash
 * @property string $aggregate
 * @property string $value
 * @property int|null    $count
 * @method static Builder|PulseAggregate whereAggregate($value)
 * @method static Builder|PulseAggregate whereBucket($value)
 * @method static Builder|PulseAggregate whereCount($value)
 * @method static Builder|PulseAggregate whereId($value)
 * @method static Builder|PulseAggregate whereKey($value)
 * @method static Builder|PulseAggregate whereKeyHash($value)
 * @method static Builder|PulseAggregate wherePeriod($value)
 * @method static Builder|PulseAggregate whereType($value)
 * @method static Builder|PulseAggregate whereValue($value)
 * @mixin IdeHelperPulseAggregate
 * @mixin \Eloquent
 */
class PulseAggregate extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'type',
        'key',
        'value',
    ];
}
