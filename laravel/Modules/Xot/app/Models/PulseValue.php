<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Database\Factories\PulseValueFactory;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static PulseValueFactory factory($count = null, $state = [])
 * @method static Builder|PulseValue newModelQuery()
 * @method static Builder|PulseValue newQuery()
 * @method static Builder|PulseValue query()
 * @property int         $id
 * @property int         $timestamp
 * @property string $type
 * @property string $key
 * @property string|null $key_hash
 * @property string $value
 * @method static Builder|PulseValue whereId($value)
 * @method static Builder|PulseValue whereKey($value)
 * @method static Builder|PulseValue whereKeyHash($value)
 * @method static Builder|PulseValue whereTimestamp($value)
 * @method static Builder|PulseValue whereType($value)
 * @method static Builder|PulseValue whereValue($value)
 * @mixin IdeHelperPulseValue
 * @mixin \Eloquent
 */
class PulseValue extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'type',
        'key',
        'value',
    ];
}
