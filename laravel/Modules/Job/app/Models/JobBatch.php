<?php

/**
 * ---.
 *
 * @see https://philo.dev/laravel-batches-and-real-time-progress-with-livewire/
 * @see https://philo.dev/laravel-batches-and-real-time-progress-with-livewire/
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Override;
use Modules\Job\Database\Factories\JobBatchFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * Modules\Job\Models\JobBatch.
 *
 * @property string $id
 * @property string $name
 * @property int $total_jobs
 * @property int $pending_jobs
 * @property int $failed_jobs
 * @property string $failed_job_ids
 * @property Collection|null $options
 * @property Carbon|null $cancelled_at
 * @property Carbon $created_at
 * @property Carbon|null $finished_at
 * @method static JobBatchFactory factory($count = null, $state = [])
 * @method static Builder|JobBatch newModelQuery()
 * @method static Builder|JobBatch newQuery()
 * @method static Builder|JobBatch query()
 * @method static Builder|JobBatch whereCancelledAt($value)
 * @method static Builder|JobBatch whereCreatedAt($value)
 * @method static Builder|JobBatch whereFailedJobIds($value)
 * @method static Builder|JobBatch whereFailedJobs($value)
 * @method static Builder|JobBatch whereFinishedAt($value)
 * @method static Builder|JobBatch whereId($value)
 * @method static Builder|JobBatch whereName($value)
 * @method static Builder|JobBatch whereOptions($value)
 * @method static Builder|JobBatch wherePendingJobs($value)
 * @method static Builder|JobBatch whereTotalJobs($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @mixin IdeHelperJobBatch
 * @mixin \Eloquent
 */
class JobBatch extends BaseModel
{
    /** @var bool */
    public $incrementing = false;

    /** @var string */
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'total_jobs',
        'pending_jobs',
        'failed_jobs',
        'failed_job_ids',
        'options',
        'cancelled_at',
        'created_at',
        'finished_at',
    ];

    /**
     * Get the total number of jobs that have been processed by the batch thus far.
     *
     * @return int
     */
    public function processedJobs(): int|float
    {
        return $this->total_jobs - $this->pending_jobs;
    }

    /**
     * Get the percentage of jobs that have been processed (between 0-100).
     */
    public function progress(): int
    {
        $progress = $this->total_jobs > 0 ? round(($this->processedJobs() / $this->total_jobs) * 100) : 0;

        return (int) $progress;
    }

    /**
     * Determine if the batch has pending jobs.
     */
    public function hasPendingJobs(): bool
    {
        return $this->pending_jobs > 0;
    }

    /**
     * Determine if the batch has finished executing.
     */
    public function finished(): bool
    {
        return $this->finished_at instanceof Carbon;
    }

    /**
     * Determine if the batch has job failures.
     */
    public function hasFailures(): bool
    {
        return $this->failed_jobs > 0;
    }

    /**
     * Determine if all jobs failed.
     */
    public function failed(): bool
    {
        return $this->failed_jobs === $this->total_jobs;
    }

    /**
     * Determine if the batch has been canceled.
     */
    public function cancelled(): bool
    {
        return $this->cancelled_at instanceof Carbon;
    }

    /**  @return array<string, string>  */
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
            'options' => 'collection',
            'failed_jobs' => 'integer',
            'cancelled_at' => 'datetime',
            'finished_at' => 'datetime',
        ];
    }
}
