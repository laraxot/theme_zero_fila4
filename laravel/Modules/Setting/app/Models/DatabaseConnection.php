<?php

declare(strict_types=1);

namespace Modules\Setting\Models;

use Exception;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Sushi\Sushi;
use Webmozart\Assert\Assert;

/**
 * @property string $name
 * @property string $driver
 * @property string $host
 * @property int $port
 * @property string $database
 * @property string $username
 * @property string $password
 * @property string $charset
 * @property string $collation
 * @property string $prefix
 * @property bool $strict
 * @property string $engine
 * @property array $options
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class DatabaseConnection extends Model
{
    use Sushi;

    protected $fillable = [
        'name',
        'driver',
        'host',
        'port',
        'database',
        'username',
        'password',
        'charset',
        'collation',
        'prefix',
        'strict',
        'engine',
        'options',
        'status',
    ];

    protected $casts = [
        'port' => 'integer',
        'strict' => 'boolean',
        'options' => 'array',
    ];

    public function getRows(): array
    {
        $connections = config('database.connections');
        
        return Arr::map(
            $connections,
            fn (array $value, string $key): array => [
                'id' => $key,
                'name' => $key,
                'driver' => $value['driver'],
                'database' => $value['database'],
                'host' => $value['host'] ?? null,
                'port' => $value['port'] ?? null,
                'username' => $value['username'] ?? null,
                'password' => $value['password'] ?? null,
                'charset' => $value['charset'] ?? 'utf8mb4',
                'collation' => $value['collation'] ?? 'utf8mb4_unicode_ci',
                'prefix' => $value['prefix'] ?? '',
                'strict' => $value['strict'] ?? true,
                'engine' => $value['engine'] ?? 'InnoDB',
                'options' => $value['options'] ?? [],
                'status' => 'active',
            ]
        );
    }

    public function testConnection(): bool
    {
        try {
            $config = [
                'driver' => $this->driver,
                'host' => $this->host,
                'port' => $this->port,
                'database' => $this->database,
                'username' => $this->username,
                'password' => $this->password,
                'charset' => $this->charset ?? 'utf8mb4',
                'collation' => $this->collation ?? 'utf8mb4_unicode_ci',
                'prefix' => $this->prefix,
                'strict' => $this->strict,
                'engine' => $this->engine,
            ];

            if (! empty($this->options)) {
                $config = array_merge($config, $this->options);
            }

            Config::set('database.connections.test_connection', $config);
            DB::connection('test_connection')->getPdo();

            return true;
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }
}
