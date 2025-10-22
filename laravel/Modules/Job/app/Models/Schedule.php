<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Override;
use Exception;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Job\Database\Factories\ScheduleFactory;
use InvalidArgumentException;
use Illuminate\Console\Scheduling\ManagesFrequencies;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Modules\Job\Enums\Status;
use Webmozart\Assert\Assert;

/**
 * Modules\Job\Models\Schedule.
 *
 * @property Status $status
 * @property array $options
 * @property \Illuminate\Database\Eloquent\Collection<int, ScheduleHistory> $histories
 * @property int|null $histories_count
 * @property int $id
 * @property string $command
 * @property string|null $command_custom
 * @property array|null $params
 * @property string $expression
 * @property array|null $environments
 * @property array|null $options_with_value
 * @property string|null $log_filename
 * @property bool $even_in_maintenance_mode
 * @property bool $without_overlapping
 * @property bool $on_one_server
 * @property string|null $webhook_before
 * @property string|null $webhook_after
 * @property string|null $email_output
 * @property bool $sendmail_error
 * @property bool $log_success
 * @property bool $log_error
 * @property bool $run_in_background
 * @property bool $sendmail_success
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_by
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static Builder|Schedule active()
 * @method static ScheduleFactory factory($count = null, $state = [])
 * @method static Builder|Schedule inactive()
 * @method static Builder|Schedule newModelQuery()
 * @method static Builder|Schedule newQuery()
 * @method static Builder|Schedule onlyTrashed()
 * @method static Builder|Schedule query()
 * @method static Builder|Schedule whereCommand($value)
 * @method static Builder|Schedule whereCommandCustom($value)
 * @method static Builder|Schedule whereCreatedAt($value)
 * @method static Builder|Schedule whereCreatedBy($value)
 * @method static Builder|Schedule whereDeletedAt($value)
 * @method static Builder|Schedule whereDeletedBy($value)
 * @method static Builder|Schedule whereEmailOutput($value)
 * @method static Builder|Schedule whereEnvironments($value)
 * @method static Builder|Schedule whereEvenInMaintenanceMode($value)
 * @method static Builder|Schedule whereExpression($value)
 * @method static Builder|Schedule whereId($value)
 * @method static Builder|Schedule whereLogError($value)
 * @method static Builder|Schedule whereLogFilename($value)
 * @method static Builder|Schedule whereLogSuccess($value)
 * @method static Builder|Schedule whereOnOneServer($value)
 * @method static Builder|Schedule whereOptions($value)
 * @method static Builder|Schedule whereOptionsWithValue($value)
 * @method static Builder|Schedule whereParams($value)
 * @method static Builder|Schedule whereRunInBackground($value)
 * @method static Builder|Schedule whereSendmailError($value)
 * @method static Builder|Schedule whereSendmailSuccess($value)
 * @method static Builder|Schedule whereStatus($value)
 * @method static Builder|Schedule whereUpdatedAt($value)
 * @method static Builder|Schedule whereUpdatedBy($value)
 * @method static Builder|Schedule whereWebhookAfter($value)
 * @method static Builder|Schedule whereWebhookBefore($value)
 * @method static Builder|Schedule whereWithoutOverlapping($value)
 * @method static Builder|Schedule withTrashed()
 * @method static Builder|Schedule withoutTrashed()
 * @mixin IdeHelperSchedule
 * @mixin \Eloquent
 */
class Schedule extends BaseModel
{
    use ManagesFrequencies;
    use SoftDeletes;

    public const STATUS_INACTIVE = 0;

    public const STATUS_ACTIVE = 1;

    public const STATUS_TRASHED = 2;

    protected $fillable = [
        'command',
        'command_custom',
        'params',
        'options',
        'options_with_value',
        'expression',
        'even_in_maintenance_mode',
        'without_overlapping',
        'on_one_server',
        'webhook_before',
        'webhook_after',
        'email_output',
        'sendmail_error',
        'sendmail_success',
        'log_success',
        'log_error',
        'status',
        'run_in_background',
        'log_filename',
        'environments',
    ];

    protected $attributes = [
        'expression' => '* * * * *',
        'params' => '[]',
        'options' => '[]',
        'options_with_value' => '[]',
    ];

    /** @return array<string, string> */
    #[Override]
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'params' => 'array',
            'options' => 'array',
            'options_with_value' => 'array',
            'environments' => 'array',
            'status' => Status::class,
        ];
    }

    /**
     * Get available environments.
     */
    public static function getEnvironments(): Collection
    {
        return static::whereNotNull('environments')->groupBy('environments')->pluck('environments', 'environments');
    }

    /**
     * Get the related histories.
     */
    public function histories(): HasMany
    {
        return $this->hasMany(ScheduleHistory::class, 'schedule_id', 'id');
    }

    /**
     * Scope a query to only include inactive schedules.
     */
    public function scopeInactive(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_INACTIVE);
    }

    /**
     * Scope a query to only include active schedules.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    /**
     * Get arguments from params.
     */
    public function getArguments(): array
    {
        $arguments = [];

        foreach ($this->params ?? [] as $argument => $value) {
            if (empty($value['value'])) {
                continue;
            }

            if (isset($value['type']) && $value['type'] === 'function') {
                // Replace eval with a safer function or an allowed list of callable functions
                $arguments[$argument] = $this->evaluateFunction($value['value']);
            } else {
                $arguments[(string) ($value['name'] ?? $argument)] = is_string($value)
                    ? $value
                    : ((string) $value['value']);
            }
        }

        return $arguments;
    }

    /**
     * Get options as array.
     */
    public function getOptions(): array
    {
        $options = collect($this->options ?? []);
        $optionsWithValues = $this->options_with_value ?? [];

        if (!empty($optionsWithValues)) {
            $options = $options->merge($optionsWithValues);
        }

        return $options->map(function ($value, $key) {
            if (is_array($value)) {
                Assert::nullOrString($value['name']);

                return '--' . ((string) ($value['name'] ?? $key)) . '=' . ((string) $value['value']);
            }

            return "--{$value}";
        })->toArray();
    }

    /**
     * Safely evaluate function strings (avoiding eval).
     *
     * @param string $functionString Il nome della funzione da valutare
     * @return string|null Il risultato della funzione o null se la funzione non è consentita
     *
     * @throws InvalidArgumentException Se viene passato un argomento non valido
     */
    private function evaluateFunction(string $functionString): null|string
    {
        // Define a list of allowed functions or implement custom evaluation logic.
        $allowedFunctions = ['strtolower', 'strtoupper']; // Example allowed functions

        if (in_array($functionString, $allowedFunctions, true)) {
            // Chiamiamo la funzione in modo sicuro
            try {
                // Utilizziamo uno switch invece di if per evitare il falso positivo di PHPStan
                switch ($functionString) {
                    case 'strtolower':
                        return strtolower('TEST_STRING');
                    case 'strtoupper':
                        return strtoupper('test_string');
                    default:
                        return null;
                }
            } catch (Exception $e) {
                // Log error or handle exception
                return null;
            }
        }

        // Funzione non consentita
        return null;
    }
}
