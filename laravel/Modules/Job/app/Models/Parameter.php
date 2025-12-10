<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Modules\Job\Database\Factories\ParameterFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Modules\Job\Models\Parameter.
 *
 * @property int $id
 * @property int $frequency_id
 * @property string $name
 * @property string $value
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Frequency|null $task
 * @method static ParameterFactory factory($count = null, $state = [])
 * @method static Builder|Parameter newModelQuery()
 * @method static Builder|Parameter newQuery()
 * @method static Builder|Parameter query()
 * @method static Builder|Parameter whereCreatedAt($value)
 * @method static Builder|Parameter whereCreatedBy($value)
 * @method static Builder|Parameter whereFrequencyId($value)
 * @method static Builder|Parameter whereId($value)
 * @method static Builder|Parameter whereName($value)
 * @method static Builder|Parameter whereUpdatedAt($value)
 * @method static Builder|Parameter whereUpdatedBy($value)
 * @method static Builder|Parameter whereValue($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @mixin IdeHelperParameter
 * @mixin \Eloquent
 */
class Parameter extends BaseModel
{
    // protected $table = 'frequency_parameters';

    protected $fillable = [
        'id',
        'name',
        'value',
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Frequency::class);
    }
}
