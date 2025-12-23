<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Override;
use Modules\Job\Database\Factories\JobFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;
use Webmozart\Assert\Assert;

use function Safe\json_decode;

/**
 * Modules\Job\Models\Job.
 *
 * @property int $id
 * @property string $queue
 * @property array $payload
 * @property int $attempts
 * @property int|null $reserved_at
 * @property int $available_at
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $updated_at
 * @method static JobFactory factory($count = null, $state = [])
 * @method static Builder|Job newModelQuery()
 * @method static Builder|Job newQuery()
 * @method static Builder|Job query()
 * @method static Builder|Job whereAttempts($value)
 * @method static Builder|Job whereAvailableAt($value)
 * @method static Builder|Job whereCreatedAt($value)
 * @method static Builder|Job whereCreatedBy($value)
 * @method static Builder|Job whereId($value)
 * @method static Builder|Job wherePayload($value)
 * @method static Builder|Job whereQueue($value)
 * @method static Builder|Job whereReservedAt($value)
 * @method static Builder|Job whereUpdatedAt($value)
 * @method static Builder|Job whereUpdatedBy($value)
 * @property mixed $display_name
 * @property mixed $status
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @mixin IdeHelperJob
 * @mixin \Eloquent
 */
class Job extends BaseModel
{
    protected $fillable = [
        'id',
        'queue',
        'payload',
        'attempts',
        'reserved_at',
        'available_at',
        'created_at',
    ];

    public function getTable(): string
    {
        Assert::string(
            $res = config('queue.connections.database.table'),
            '[' . __LINE__ . '][' . class_basename($this) . ']',
        );

        return $res;
    }

    public function status(): Attribute
    {
        return Attribute::make(get: function (): string {
            if ($this->reserved_at) {
                return 'running';
            }

            return 'waiting';
        });
    }

    public function getDisplayNameAttribute(): null|string
    {
        Assert::string($json = $this->attributes['payload'], __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__));
        $payload = json_decode($json, true);
        if (!is_array($payload)) {
            return null;
        }

        Assert::nullOrString($res = $payload['displayName'] ?? null);

        return $res;
    }

    #[Override]
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'queue' => 'string',
            'payload' => 'array',
            'attempts' => 'integer',
            'reserved_at' => 'integer',
            'available_at' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'created_by' => 'string',
            'updated_by' => 'string',
        ];
    }
}
