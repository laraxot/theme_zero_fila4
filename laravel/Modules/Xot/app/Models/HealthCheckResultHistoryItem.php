<?php

/**
 * @see https://github.com/shuvroroy/filament-spatie-laravel-health/tree/main
 */

declare(strict_types=1);

namespace Modules\Xot\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Health\Models\HealthCheckResultHistoryItem as BaseHealthCheckResultHistoryItem;

/**
 * @property int                             $id
 * @property string $check_name
 * @property string $check_label
 * @property string $status
 * @property string|null                     $notification_message
 * @property string|null                     $short_summary
 * @property array                           $meta
 * @property string $ended_at
 * @property string $batch
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|HealthCheckResultHistoryItem newModelQuery()
 * @method static Builder|HealthCheckResultHistoryItem newQuery()
 * @method static Builder|HealthCheckResultHistoryItem query()
 * @method static Builder|HealthCheckResultHistoryItem whereBatch($value)
 * @method static Builder|HealthCheckResultHistoryItem whereCheckLabel($value)
 * @method static Builder|HealthCheckResultHistoryItem whereCheckName($value)
 * @method static Builder|HealthCheckResultHistoryItem whereCreatedAt($value)
 * @method static Builder|HealthCheckResultHistoryItem whereEndedAt($value)
 * @method static Builder|HealthCheckResultHistoryItem whereId($value)
 * @method static Builder|HealthCheckResultHistoryItem whereMeta($value)
 * @method static Builder|HealthCheckResultHistoryItem whereNotificationMessage($value)
 * @method static Builder|HealthCheckResultHistoryItem whereShortSummary($value)
 * @method static Builder|HealthCheckResultHistoryItem whereStatus($value)
 * @method static Builder|HealthCheckResultHistoryItem whereUpdatedAt($value)
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder|HealthCheckResultHistoryItem whereCreatedBy($value)
 * @method static Builder|HealthCheckResultHistoryItem whereUpdatedBy($value)
 * @mixin IdeHelperHealthCheckResultHistoryItem
 * @mixin \Eloquent
 */
class HealthCheckResultHistoryItem extends BaseHealthCheckResultHistoryItem
{
    /** @var string */
    protected $connection = 'xot';
}
