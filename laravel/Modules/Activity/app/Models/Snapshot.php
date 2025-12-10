<?php

declare(strict_types=1);

namespace Modules\Activity\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\EventSourcing\Snapshots\EloquentSnapshot as SpatieSnapshot;

/**
 * Modules\Activity\Models\Snapshot.
 *
 * @property int $id
 * @property string $aggregate_uuid
 * @property int $aggregate_version
 * @property array $state
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder|Snapshot newModelQuery()
 * @method static Builder|Snapshot newQuery()
 * @method static Builder|Snapshot query()
 * @method static Builder|Snapshot uuid(string $uuid)
 * @method static Builder|Snapshot whereAggregateUuid($value)
 * @method static Builder|Snapshot whereAggregateVersion($value)
 * @method static Builder|Snapshot whereCreatedAt($value)
 * @method static Builder|Snapshot whereCreatedBy($value)
 * @method static Builder|Snapshot whereId($value)
 * @method static Builder|Snapshot whereState($value)
 * @method static Builder|Snapshot whereUpdatedAt($value)
 * @method static Builder|Snapshot whereUpdatedBy($value)
 * @mixin IdeHelperSnapshot
 * @mixin \Eloquent
 */
class Snapshot extends SpatieSnapshot
{
    use HasFactory;

    /** @var string */
    protected $connection = 'activity';

    /** @var list<string> */
    protected $fillable = ['id', 'aggregate_uuid', 'aggregate_version', 'state', 'created_at', 'updated_at'];
}
