<?php
declare(strict_types=1);
namespace Modules\Quaeris\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SearchTokensInLimeSurvey extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tokens:search-and-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Search for tokens from the contacts table in all tables starting with "lime_tokens" and update mismatched values.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Fetching all tokens from the contacts table.');

        // Ottieni tutte le righe dalla tabella contacts
        $contacts = DB::table('contacts')->get();

        if ($contacts->isEmpty()) {
            $this->info('No rows found in the contacts table.');
            return;
        }

        // Connettiti al database LimeSurvey
        $connection = DB::connection('limesurvey');

        // Ottieni l'elenco delle tabelle nel database LimeSurvey
        $tables = $connection->select('SHOW TABLES');

        // Determina il nome della proprietà delle tabelle
        $databaseName = config('database.connections.limesurvey.database');
        $tableProperty = "Tables_in_{$databaseName}";

        if (!isset($tables[0]->$tableProperty)) {
            $this->error('Unable to determine the table property name for LimeSurvey database.');
            return;
        }

        // Estrai i nomi delle tabelle
        $tables = array_map(fn ($table) => $table->$tableProperty, $tables);

        // Filtra le tabelle che iniziano con "lime_tokens"
        $tokenTables = array_filter($tables, fn ($table) => str_starts_with($table, 'lime_tokens'));

        if (empty($tokenTables)) {
            $this->info('No tables starting with "lime_tokens" found in the LimeSurvey database.');
            return;
        }

        // Per ogni riga della tabella contacts, cerca il token
        foreach ($contacts as $contact) {
            $token = $contact->token;
            $this->info("Searching for token: $token");

            $found = false;

            foreach ($tokenTables as $table) {
                $records = $connection->table($table)->where('token', $token)->get();

                if ($records->isNotEmpty()) {
                    $found = true;
                    $this->info("Token $token found in table: $table");

                    foreach ($records as $record) {
                        // Verifica i campi presenti nella tabella lime_tokens
                        $fields = $connection->getSchemaBuilder()->getColumnListing($table);

                        $comparison = [];
                        $updateData = [];

                        if (in_array('firstname', $fields)) {
                            $comparison['firstname'] = $record->firstname == $contact->first_name;
                            if (!$comparison['firstname']) {
                                $updateData['first_name'] = $record->firstname;
                            }
                        }

                        if (in_array('lastname', $fields)) {
                            $comparison['lastname'] = $record->lastname == $contact->last_name;
                            if (!$comparison['lastname']) {
                                $updateData['last_name'] = $record->lastname;
                            }
                        }

                        if (in_array('email', $fields)) {
                            $comparison['email'] = $record->email == $contact->email;
                            if (!$comparison['email']) {
                                $updateData['email'] = $record->email;
                            }
                        }

                        if (in_array('attribute_3', $fields)) {
                            $comparison['attribute_3'] = $record->attribute_3 == $contact->mobile_phone;
                            if (!$comparison['attribute_3']) {
                                $updateData['mobile_phone'] = $record->attribute_3;
                            }
                        }

                        // Mostra il risultato del confronto
                        foreach ($comparison as $field => $isMatch) {
                            $result = $isMatch ? 'MATCH' : 'NO MATCH';
                            $this->line("  - $field: $result");
                        }

                        // Aggiorna i campi se necessario
                        if (!empty($updateData)) {
                            DB::table('contacts')
                                ->where('id', $contact->id)
                                ->update($updateData);

                            $this->info("Updated contact ID {$contact->id} with values from table $table.");
                        }
                    }
                }
            }

            if (!$found) {
                $this->info("Token $token not found in any table.");
            }
        }

        $this->info('Search and update completed.');
    }
}
