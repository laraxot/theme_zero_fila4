<?php

declare(strict_types=1);

namespace Modules\DbForge\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema as SchemaFacade;
use Illuminate\Support\Str;
use Safe\Exceptions\FilesystemException;
use Safe\Exceptions\JsonException;
use function Safe\file_put_contents;
use function Safe\json_encode;
use function Safe\mkdir;

/**
 * Class DatabaseSchemaExportCommand
 * 
 * Esporta lo schema del database in file JSON.
 */
class DatabaseSchemaExportCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'db:schema:export {table?} {--module=}';

    /**
     * @var string
     */
    protected $description = 'Esporta lo schema del database in file JSON';

    /**
     * Esegue il comando.
     *
     * @throws FilesystemException
     * @throws JsonException
     */
    public function handle(): void
    {
        $module = $this->option('module');
        $table = $this->argument('table');

        if (null !== $table && is_string($table)) {
            $moduleString = is_string($module) ? $module : null;
            $this->exportTable($table, $moduleString);
            return;
        }

        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $tableObj) {
            $tableName = (string) current((array) $tableObj);
            $moduleString = is_string($module) ? $module : null;
            $this->exportTable($tableName, $moduleString);
        }
    }

    /**
     * Esporta lo schema di una tabella in JSON.
     *
     * @param string $table Nome della tabella
     * @param string|null $module Nome del modulo
     * @throws FilesystemException
     * @throws JsonException
     */
    protected function exportTable(string $table, ?string $module = null): void
    {
        if (!SchemaFacade::hasTable($table)) {
            $this->error("La tabella [{$table}] non esiste");
            return;
        }

        $columns = $this->getTableColumns($table);
        $indexes = $this->getTableIndexes($table);
        $foreignKeys = $this->getTableForeignKeys($table);

        $data = [
            'name' => $table,
            'columns' => $columns,
            'indexes' => $indexes,
            'foreignKeys' => $foreignKeys,
        ];

        $path = $this->getExportPath($table, $module);
        $json = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($path, $json);

        $this->info("Schema esportato per la tabella [{$table}]");
    }

    /**
     * Ottiene le informazioni delle colonne della tabella.
     *
     * @param string $table Nome della tabella
     * @return array<string, array<string, mixed>>
     */
    protected function getTableColumns(string $table): array
    {
        $columns = [];
        $columnList = DB::select("SHOW COLUMNS FROM {$table}");
        
        foreach ($columnList as $column) {
            $columnData = (array) $column;
            $columns[$columnData['Field']] = [
                'type' => $columnData['Type'],
                'nullable' => $columnData['Null'] === 'YES',
                'default' => $columnData['Default'],
                'key' => $columnData['Key'],
                'extra' => $columnData['Extra'],
            ];
        }

        return $columns;
    }

    /**
     * Ottiene le informazioni degli indici della tabella.
     *
     * @param string $table Nome della tabella
     * @return array<string, array<string, mixed>>
     */
    protected function getTableIndexes(string $table): array
    {
        $indexes = [];
        $indexList = DB::select("SHOW INDEX FROM {$table}");
        
        foreach ($indexList as $index) {
            $indexData = (array) $index;
            $indexName = $indexData['Key_name'];
            
            if (!isset($indexes[$indexName])) {
                $indexes[$indexName] = [
                    'columns' => [],
                    'unique' => $indexData['Non_unique'] == 0,
                    'primary' => $indexName === 'PRIMARY',
                ];
            }
            
            $indexes[$indexName]['columns'][] = $indexData['Column_name'];
        }

        return $indexes;
    }

    /**
     * Ottiene le informazioni delle chiavi esterne della tabella.
     *
     * @param string $table Nome della tabella
     * @return array<string, array<string, mixed>>
     */
    protected function getTableForeignKeys(string $table): array
    {
        $foreignKeys = [];
        
        // Ottieni le informazioni delle chiavi esterne dal database
        $foreignKeyList = DB::select("
            SELECT 
                CONSTRAINT_NAME,
                COLUMN_NAME,
                REFERENCED_TABLE_NAME,
                REFERENCED_COLUMN_NAME
            FROM information_schema.KEY_COLUMN_USAGE 
            WHERE TABLE_SCHEMA = DATABASE() 
            AND TABLE_NAME = ? 
            AND REFERENCED_TABLE_NAME IS NOT NULL
        ", [$table]);
        
        foreach ($foreignKeyList as $fk) {
            $fkData = (array) $fk;
            $constraintName = $fkData['CONSTRAINT_NAME'];
            
            if (!isset($foreignKeys[$constraintName])) {
                $foreignKeys[$constraintName] = [
                    'localColumns' => [],
                    'foreignTable' => $fkData['REFERENCED_TABLE_NAME'],
                    'foreignColumns' => [],
                ];
            }
            
            $foreignKeys[$constraintName]['localColumns'][] = $fkData['COLUMN_NAME'];
            $foreignKeys[$constraintName]['foreignColumns'][] = $fkData['REFERENCED_COLUMN_NAME'];
        }

        return $foreignKeys;
    }

    /**
     * Ottiene il percorso di esportazione per lo schema di una tabella.
     *
     * @param string $table Nome della tabella
     * @param string|null $module Nome del modulo
     * @return string Percorso completo del file
     * @throws FilesystemException
     */
    protected function getExportPath(string $table, ?string $module = null): string
    {
        $filename = Str::snake($table) . '.json';
        $basePath = base_path('database/schema');

        if (null !== $module) {
            $basePath = base_path("Modules/{$module}/database/schema");
        }

        if (!is_dir($basePath)) {
            mkdir($basePath, 0755, true);
        }

        return $basePath . '/' . $filename;
    }
} 