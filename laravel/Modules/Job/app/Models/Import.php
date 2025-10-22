<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Override;
use Modules\Job\Database\Factories\ImportFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;

/**
 * @method static ImportFactory factory($count = null, $state = [])
 * @method static Builder|Import newModelQuery()
 * @method static Builder|Import newQuery()
 * @method static Builder|Import query()
 * @property int $id
 * @property Carbon|null $completed_at
 * @property string $file_name
 * @property string $file_path
 * @property string $importer
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
 * @method static Builder|Import whereCompletedAt($value)
 * @method static Builder|Import whereCreatedAt($value)
 * @method static Builder|Import whereCreatedBy($value)
 * @method static Builder|Import whereDeletedAt($value)
 * @method static Builder|Import whereDeletedBy($value)
 * @method static Builder|Import whereFileName($value)
 * @method static Builder|Import whereFilePath($value)
 * @method static Builder|Import whereId($value)
 * @method static Builder|Import whereImporter($value)
 * @method static Builder|Import whereProcessedRows($value)
 * @method static Builder|Import whereSuccessfulRows($value)
 * @method static Builder|Import whereTotalRows($value)
 * @method static Builder|Import whereUpdatedAt($value)
 * @method static Builder|Import whereUpdatedBy($value)
 * @method static Builder|Import whereUserId($value)
 * @property string|null $user_type
 * @method static Builder|Import whereUserType($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @mixin IdeHelperImport
 * @mixin \Eloquent
 */
class Import extends BaseModel
{
    protected $fillable = [
        'id',
        'completed_at',
        'file_name',
        'file_path',
        'importer',
        'processed_rows',
        'total_rows',
        'successful_rows',
        'user_id',
    ];

    #[Override]
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
            'data' => 'json',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'payload' => 'array',
            'completed_at' => 'datetime',
            // 'updated_at' => 'datetime:Y-m-d H:00',
            // 'created_at' => 'datetime:Y-m-d',
            // 'created_at' => 'datetime:d/m/Y H:i'
        ];
    }
}
