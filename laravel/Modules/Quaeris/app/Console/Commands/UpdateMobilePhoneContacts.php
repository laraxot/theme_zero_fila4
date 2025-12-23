<?php
declare(strict_types=1);
namespace Modules\Quaeris\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateMobilePhoneContacts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contacts:update-mobile-phone';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Aggiorna i numeri di telefono nella tabella contacts con valori fake se non sono null o stringa vuota';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Aggiorna solo i record con survey_pdf_id uguale a 5
        $updatedRows = DB::table('contacts')
            ->whereNotNull('mobile_phone')
            ->where('mobile_phone', '!=', '')
            ->where('survey_pdf_id', '=', 5)
            ->update(['mobile_phone' => '000-000-0000']); // Numero di telefono fake

        // Messaggio di completamento
        $this->info("Sono stati aggiornati {$updatedRows} record.");
        
        return Command::SUCCESS;
    }
}
