<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Override;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Support\Carbon;
use Modules\Job\Database\Factories\JobManagerFactory;
use Illuminate\Contracts\Queue\Job as JobContract;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;

/**
 * Modules\Job\Models\JobManager.
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property string $id
 * @property string $job_id
 * @property string|null $name
 * @property string|null $queue
 * @property Carbon|null $started_at
 * @property Carbon|null $finished_at
 * @property bool $failed
 * @property int $attempt
 * @property int|null $progress
 * @property string|null $exception_message
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $status
 * @method static JobManagerFactory factory($count = null, $state = [])
 * @method static Builder|JobManager newModelQuery()
 * @method static Builder|JobManager newQuery()
 * @method static Builder|JobManager query()
 * @method static Builder|JobManager whereAttempt($value)
 * @method static Builder|JobManager whereCreatedAt($value)
 * @method static Builder|JobManager whereExceptionMessage($value)
 * @method static Builder|JobManager whereFailed($value)
 * @method static Builder|JobManager whereFinishedAt($value)
 * @method static Builder|JobManager whereId($value)
 * @method static Builder|JobManager whereJobId($value)
 * @method static Builder|JobManager whereName($value)
 * @method static Builder|JobManager whereProgress($value)
 * @method static Builder|JobManager whereQueue($value)
 * @method static Builder|JobManager whereStartedAt($value)
 * @method static Builder|JobManager whereUpdatedAt($value)
 * @mixin IdeHelperJobManager
 * @mixin \Eloquent
 */
class JobManager extends BaseModel
{
    // use HasFactory, Prunable;

    // protected $table = 'job_manager';

    protected $fillable = [
        'job_id',
        'name',
        'queue',
        'started_at',
        'finished_at',
        'failed',
        'attempt',
        'progress',
        'exception_message',
    ];

    public static function getJobId(JobContract $job): string|int
    {
        if ($jobId = $job->getJobId()) {
            return $jobId;
        }

        return Hash::make($job->getRawBody());
    }

    public function status(): Attribute
    {
        return Attribute::make(get: function (): string {
            if ($this->isFinished()) {
                return $this->failed ? 'failed' : 'succeeded';
            }

            return 'running';
        });
    }

    public function isFinished(): bool
    {
        if ($this->hasFailed()) {
            return true;
        }

        return $this->finished_at !== null;
    }

    public function hasFailed(): bool
    {
        return $this->failed;
    }

    public function hasSucceeded(): bool
    {
        if (!$this->isFinished()) {
            return false;
        }

        return !$this->hasFailed();
    }

    public function prunable(): Builder
    {
        if (config('jobs.pruning.activate')) {
            $retention_days = config('jobs.pruning.retention_days');
            if (!is_int($retention_days)) {
                $retention_days = 365;
            }

            return static::where('created_at', '<=', now()->subDays($retention_days));
        }

        return static::query();
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
            'failed' => 'bool',
            'started_at' => 'datetime',
            'finished_at' => 'datetime',
        ];
    }
}
