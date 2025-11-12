<?php
declare(strict_types=1);
namespace Modules\Quaeris\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Faker\Factory as Faker;

class UpdateLimeTokensTables extends Command
{
    protected $signature = 'update:lime-tokens';
    protected $description = 'Update fields in lime_tokens tables with fake data only if they exist and are not empty';

    public function handle()
    {
        $this->info('Starting to process lime_tokens tables from secondary database...');

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
        $faker = Faker::create();

        // Trova tutte le tabelle che iniziano con lime_tokens
        $tables = $connection->select("SHOW TABLES LIKE 'lime_tokens%'");

        if (empty($tables)) {
            $this->warn('No lime_tokens tables were found in the secondary database.');
            return 0;
        }

        // Trova la colonna con il nome della tabella
        $tableKey = array_keys((array) $tables[0])[0];

        foreach ($tables as $table) {
            $tableName = $table->$tableKey;
            $this->info("Processing table: $tableName");

            // Recupera le colonne della tabella
            $columns = $connection->getSchemaBuilder()->getColumnListing($tableName);

            // Costruisci una query dinamica per aggiornare i campi esistenti
            $records = $connection->table($tableName)->get();
            foreach ($records as $record) {
                $updateData = [];

                if (in_array('firstname', $columns) && !is_null($record->firstname) && $record->firstname !== '') {
                    $updateData['firstname'] = $faker->firstName;
                }
                if (in_array('lastname', $columns) && !is_null($record->lastname) && $record->lastname !== '') {
                    $updateData['lastname'] = $faker->lastName;
                }
                if (in_array('email', $columns) && !is_null($record->email) && $record->email !== '') {
                    $updateData['email'] = $faker->safeEmail;
                }
                if (in_array('attribute_3', $columns) && !is_null($record->attribute_3) && $record->attribute_3 !== '') {
                    $updateData['attribute_3'] = $faker->phoneNumber;
                }

                if (!empty($updateData)) {
                    $connection->table($tableName)
                        ->where('tid', $record->tid)
                        ->update($updateData);

                    $this->info("Updated record ID {$record->tid} in $tableName");
                }
            }
        }

        $this->info('Processing completed.');
    }
}
