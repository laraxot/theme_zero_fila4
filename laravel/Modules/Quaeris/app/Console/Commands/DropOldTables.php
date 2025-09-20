<?php
declare(strict_types=1);
namespace Modules\Quaeris\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

class DropOldTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:drop-old-tables {prefix=lime_old}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop all tables starting with a specific prefix from a secondary database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $prefix = $this->argument('prefix');
    
        // Configura la connessione al database secondario
        Config::set('database.connections.limesurvey', [
            'driver' => 'mysql',
            'host' => env('DB_HOST_LIMESURVEY', '127.0.0.1'),
            'port' => env('DB_PORT_LIMESURVEY', '3306'),
            'database' => env('DB_DATABASE_LIMESURVEY'),
            'username' => env('DB_USERNAME_LIMESURVEY'),
            'password' => env('DB_PASSWORD_LIMESURVEY'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ]);
    
        // Usa la connessione secondaria
        $connection = DB::connection('limesurvey');
    
        // Esegui la query per ottenere le tabelle con il prefisso specificato
        $tables = $connection->select("SHOW TABLES LIKE '{$prefix}%'");
    
        if (empty($tables)) {
            $this->info('No tables found with the specified prefix.');
            return 0;
        }
    
        // Trova la colonna contenente il nome della tabella
        $tableNameColumn = array_keys((array) $tables[0])[0];
    
        foreach ($tables as $table) {
            $tableName = $table->$tableNameColumn;
            $connection->getSchemaBuilder()->drop($tableName);
            $this->info("Dropped table: {$tableName}");
        }
    
        $this->info('All tables with the specified prefix have been dropped from the secondary database.');
        return 0;
    }
    
}
