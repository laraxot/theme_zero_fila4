<?php

/**
 * @see https://github.com/mooxphp/jobs/tree/main
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Support\Carbon;
use Modules\Job\Database\Factories\JobsWaitingFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;

/**
 * Modules\Job\Models\JobsWaiting.
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
 * @property mixed $display_name
 * @method static JobsWaitingFactory factory($count = null, $state = [])
 * @method static Builder|JobsWaiting newModelQuery()
 * @method static Builder|JobsWaiting newQuery()
 * @method static Builder|JobsWaiting query()
 * @method static Builder|JobsWaiting whereAttempts($value)
 * @method static Builder|JobsWaiting whereAvailableAt($value)
 * @method static Builder|JobsWaiting whereCreatedAt($value)
 * @method static Builder|JobsWaiting whereCreatedBy($value)
 * @method static Builder|JobsWaiting whereId($value)
 * @method static Builder|JobsWaiting wherePayload($value)
 * @method static Builder|JobsWaiting whereQueue($value)
 * @method static Builder|JobsWaiting whereReservedAt($value)
 * @method static Builder|JobsWaiting whereUpdatedAt($value)
 * @method static Builder|JobsWaiting whereUpdatedBy($value)
 * @property mixed $status
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @mixin IdeHelperJobsWaiting
 * @mixin \Eloquent
 */
class JobsWaiting extends Job
{
}
