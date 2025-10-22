<?php

declare(strict_types=1);

namespace Modules\Activity\Models;

use Modules\Activity\Database\Factories\ActivityFactory;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Models\Activity as SpatieActivity;

/**
 * Class Activity.
 *
 * This class extends the BaseActivity model to represent activities in the application.
 *
 * @property int $id
 * @property string|null $log_name
 * @property string $description
 * @property string|null $subject_type
 * @property int|null $subject_id
 * @property string|null $causer_type
 * @property string $causer_id
 * @property Collection<array-key, mixed>|null $properties
 * @property string|null $batch_uuid
 * @property string|null $event
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property-read Model|\Eloquent $causer
 * @property-read Collection<int, mixed> $changes
 * @property-read Model|\Eloquent|null $subject
 * @method static Builder<static>|Activity causedBy(Model $causer)
 * @method static Builder<static>|Activity forBatch(string $batchUuid)
 * @method static Builder<static>|Activity forEvent(string $event)
 * @method static Builder<static>|Activity forSubject(Model $subject)
 * @method static Builder<static>|Activity hasBatch()
 * @method static Builder<static>|Activity inLog(...$logNames)
 * @method static Builder<static>|Activity newModelQuery()
 * @method static Builder<static>|Activity newQuery()
 * @method static Builder<static>|Activity query()
 * @method static Builder<static>|Activity whereBatchUuid($value)
 * @method static Builder<static>|Activity whereCauserId($value)
 * @method static Builder<static>|Activity whereCauserType($value)
 * @method static Builder<static>|Activity whereCreatedAt($value)
 * @method static Builder<static>|Activity whereCreatedBy($value)
 * @method static Builder<static>|Activity whereDeletedAt($value)
 * @method static Builder<static>|Activity whereDeletedBy($value)
 * @method static Builder<static>|Activity whereDescription($value)
 * @method static Builder<static>|Activity whereEvent($value)
 * @method static Builder<static>|Activity whereId($value)
 * @method static Builder<static>|Activity whereLogName($value)
 * @method static Builder<static>|Activity whereProperties($value)
 * @method static Builder<static>|Activity whereSubjectId($value)
 * @method static Builder<static>|Activity whereSubjectType($value)
 * @method static Builder<static>|Activity whereUpdatedAt($value)
 * @method static Builder<static>|Activity whereUpdatedBy($value)
 * @mixin IdeHelperActivity
 * @mixin \Eloquent
 */
class Activity extends SpatieActivity
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     *
     * @return ActivityFactory
     */
    protected static function newFactory(): ActivityFactory
    {
        return ActivityFactory::new();
    }

    /** @var list<string> */
    protected $fillable = [
        'id',
        'log_name',
        'description',
        'subject_type',
        'event',
        'subject_id',
        'causer_type',
        'causer_id',
        'properties',
        'batch_uuid',
        'created_at',
        'updated_at',
    ];

    protected $connection = 'activity';

    // Additional methods or relationships can be defined here as needed
}
