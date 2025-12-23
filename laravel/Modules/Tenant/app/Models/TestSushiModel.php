<?php

declare(strict_types=1);

namespace Modules\Tenant\Models;

use Modules\Tenant\Services\TenantService;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Modules\Tenant\Database\Factories\TestSushiModelFactory;
use Modules\Tenant\Models\Traits\SushiToJson;

/**
 * Modello di test per il trait SushiToJson.
 *
 * Utilizzato esclusivamente per i test del trait.
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $status
 * @property array<array-key, mixed>|null $metadata
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static TestSushiModelFactory factory($count = null, $state = [])
 * @method static Builder<static>|TestSushiModel newModelQuery()
 * @method static Builder<static>|TestSushiModel newQuery()
 * @method static Builder<static>|TestSushiModel query()
 * @method static Builder<static>|TestSushiModel whereCreatedAt($value)
 * @method static Builder<static>|TestSushiModel whereDescription($value)
 * @method static Builder<static>|TestSushiModel whereId($value)
 * @method static Builder<static>|TestSushiModel whereMetadata($value)
 * @method static Builder<static>|TestSushiModel whereName($value)
 * @method static Builder<static>|TestSushiModel whereStatus($value)
 * @method static Builder<static>|TestSushiModel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TestSushiModel extends Model
{
    use HasFactory;
    use SushiToJson;

    /**
     * Create a new factory instance for the model.
     *
     * @return TestSushiModelFactory
     */
    protected static function newFactory(): TestSushiModelFactory
    {
        return TestSushiModelFactory::new();
    }

    /**
     * Schema esplicito per Sushi quando non ci sono righe.
     *
     * @var array<string, string>
     */
    protected $schema = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'status' => 'string',
        'metadata' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    /**
     * La tabella associata al modello.
     */
    protected $table = 'test_sushi';

    /**
     * Override del path JSON in ambiente di test per NON toccare config/local/saluteora/.
     */
    public function getJsonFile(): string
    {
        if (app()->environment('testing')) {
            $dir = storage_path('tests/sushi-json');
            if (!File::exists($dir)) {
                File::makeDirectory($dir, 0o755, true, true);
            }
            return $dir . '/test_sushi.json';
        }

        // fallback: usa il comportamento del trait (replicato qui)
        $tbl = $this->getTable();
        /** @var class-string $tenantService */
        $tenantService = TenantService::class;
        return $tenantService::filePath('database/content/' . $tbl . '.json');
    }

    /**
     * Implementa il metodo getRows() richiesto da Sushi.
     * Delega al metodo getSushiRows() del trait.
     *
     * @return array<int, array<string, mixed>>
     */
    public function getRows(): array
    {
        return $this->getSushiRows();
    }

    /**
     * Nota: non esporre i metodi protetti del trait.
     * I metodi del trait vengono utilizzati internamente dagli eventi Eloquent.
     */

    /**
     * Gli attributi che sono assegnabili in massa.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'status',
        'metadata',
        'created_by',
        'updated_by',
    ];

    /**
     * Gli attributi che devono essere convertiti.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'metadata' => 'array',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'created_by' => 'integer',
            'updated_by' => 'integer',
        ];
    }
}
