<?php

declare(strict_types=1);

/**
 * @see HusamTariq\FilamentDatabaseSchedule
 */

namespace Modules\Job\Models;

use Override;
use Modules\Job\Database\Factories\ScheduleHistoryFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Modules\Job\Models\ScheduleHistory.
 *
 * @property Schedule|null $command
 * @method static ScheduleHistoryFactory factory($count = null, $state = [])
 * @method static Builder|ScheduleHistory newModelQuery()
 * @method static Builder|ScheduleHistory newQuery()
 * @method static Builder|ScheduleHistory query()
 * @property int $id
 * @property array|null $params
 * @property string $output
 * @property array|null $options
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $schedule_id
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder|ScheduleHistory whereCommand($value)
 * @method static Builder|ScheduleHistory whereCreatedAt($value)
 * @method static Builder|ScheduleHistory whereCreatedBy($value)
 * @method static Builder|ScheduleHistory whereDeletedAt($value)
 * @method static Builder|ScheduleHistory whereDeletedBy($value)
 * @method static Builder|ScheduleHistory whereId($value)
 * @method static Builder|ScheduleHistory whereOptions($value)
 * @method static Builder|ScheduleHistory whereOutput($value)
 * @method static Builder|ScheduleHistory whereParams($value)
 * @method static Builder|ScheduleHistory whereScheduleId($value)
 * @method static Builder|ScheduleHistory whereUpdatedAt($value)
 * @method static Builder|ScheduleHistory whereUpdatedBy($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @mixin IdeHelperScheduleHistory
 * @mixin \Eloquent
 */
class ScheduleHistory extends BaseModel
{
    /*
     * The database table used by the model.
     *
     * @var string
     */
    // protected $table;

    protected $fillable = [
        'command',
        'params',
        'output',
        'options',
    ];

    /*
     * Creates a new instance of the model.
     *
     * @param array $attributes
     * @return void
     */
    /*
     * public function __construct(array $attributes = [])
     * {
     * parent::__construct($attributes);
     *
     * $this->table = Config::get('filament-database-schedule.table.schedule_histories', 'schedule_histories');
     * }
     *
     */

    public function command(): BelongsTo
    {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
    }

    #[Override]
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'params' => 'array',
            'options' => 'array',
        ];
    }
}
