<?php
declare(strict_types=1);
namespace Modules\Quaeris\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SearchTokenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'token:search {token : The token to search for}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Search for a token in all tables starting with "lime_tokens" in the LimeSurvey database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $token = $this->argument('token');

        // Connettiti al database LimeSurvey
        $connection = DB::connection('limesurvey');

        // Ottieni l'elenco delle tabelle
        $tables = $connection->select('SHOW TABLES');

        // Determina il nome della proprietà delle tabelle
        $databaseName = config('database.connections.limesurvey.database');
        $tableProperty = "Tables_in_{$databaseName}";

        // Debug per verificare l'output
        if (!isset($tables[0]->$tableProperty)) {
            $this->error('Unable to determine the table property name.');
            return;
        }

        // Estrai i nomi delle tabelle
        $tables = array_map(fn ($table) => $table->$tableProperty, $tables);

        // Filtra le tabelle che iniziano con "lime_tokens"
        $tokenTables = array_filter($tables, fn ($table) => str_starts_with($table, 'lime_tokens'));

        if (empty($tokenTables)) {
            $this->info('No tables starting with "lime_tokens" found.');
            return;
        }

        $found = false;

        // Cerca il token in ciascuna tabella
        foreach ($tokenTables as $table) {
            $records = $connection->table($table)->where('token', $token)->get();

            if ($records->isNotEmpty()) {
                $found = true;
                $this->info("Token found in table: $table");

                foreach ($records as $record) {
                    $this->line(json_encode($record)); // Converte l'oggetto in JSON
                }
            }
        }

        if (!$found) {
            $this->info('Token not found in any table.');
        }
    }
}
