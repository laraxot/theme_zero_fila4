<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Modules\Job\Database\Factories\ExportFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Filament\Actions\Exports\Models\Export as BaseExport;

/**
 * @method static ExportFactory factory($count = null, $state = [])
 * @method static Builder|Export newModelQuery()
 * @method static Builder|Export newQuery()
 * @method static Builder|Export query()
 * @property int $id
 * @property Carbon|null $completed_at
 * @property string $file_disk
 * @property string|null $file_name
 * @property string $exporter
 * @property int $processed_rows
 * @property int $total_rows
 * @property int $successful_rows
 * @property string|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder|Export whereCompletedAt($value)
 * @method static Builder|Export whereCreatedAt($value)
 * @method static Builder|Export whereCreatedBy($value)
 * @method static Builder|Export whereDeletedAt($value)
 * @method static Builder|Export whereDeletedBy($value)
 * @method static Builder|Export whereExporter($value)
 * @method static Builder|Export whereFileDisk($value)
 * @method static Builder|Export whereFileName($value)
 * @method static Builder|Export whereId($value)
 * @method static Builder|Export whereProcessedRows($value)
 * @method static Builder|Export whereSuccessfulRows($value)
 * @method static Builder|Export whereTotalRows($value)
 * @method static Builder|Export whereUpdatedAt($value)
 * @method static Builder|Export whereUpdatedBy($value)
 * @method static Builder|Export whereUserId($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property Model|Eloquent|null $user
 * @property string|null $user_type
 * @method static Builder|Export whereUserType($value)
 * @mixin Eloquent
 * @mixin IdeHelperExport
 * @mixin Eloquent
 */
class Export extends BaseExport
{
    /** @var string */
    protected $connection = 'job';

    protected $fillable = [
        'id',
        'completed_at',
        'file_disk',
        'file_name',
        'exporter',
        'processed_rows',
        'total_rows',
        'successful_rows',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
            'data' => 'json',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'payload' => 'array',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'completed_at' => 'datetime',
            // 'updated_at' => 'datetime:Y-m-d H:00',
            // 'created_at' => 'datetime:Y-m-d',
            // 'created_at' => 'datetime:d/m/Y H:i'
        ];
    }
}
