<?php

declare(strict_types=1);

namespace Modules\Activity\Database\Seeders;

use Exception;
use Modules\Activity\Database\Factories\ActivityFactory;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Activity\Models\Activity;
use Modules\Activity\Models\Snapshot;
use Modules\Activity\Models\StoredEvent;

/**
 * Seeder per creare grandi quantità di dati per il modulo Activity.
 */
class ActivityMassSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Esegue il seeding del database.
     */
    public function run(): void
    {
        $this->command->info('🚀 Inizializzazione seeding di massa per modulo Activity...');

        $startTime = microtime(true);

        try {
            // 1. Creazione attività di sistema
            $this->createSystemActivities();

            // 2. Creazione snapshot
            $this->createSnapshots();

            // 3. Creazione eventi memorizzati
            $this->createStoredEvents();

            $endTime = microtime(true);
            $executionTime = round($endTime - $startTime, 2);

            $this->command->info("🎉 Seeding modulo Activity completato in {$executionTime} secondi!");
            $this->displaySummary();
        } catch (Exception $e) {
            $this->command->error('❌ Errore durante il seeding: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Crea attività di sistema.
     */
    private function createSystemActivities(): void
    {
        $this->command->info('📝 Creazione attività di sistema...');

        // Crea 2000 attività di sistema
        $activities = ActivityFactory::new()
            ->count(2000)
            ->create([
                'created_at' => Carbon::now()->subDays(rand(1, 90)),
            ]);

        $this->command->info('✅ Create ' . $activities->count() . ' attività di sistema');
    }

    /**
     * Crea snapshot.
     */
    private function createSnapshots(): void
    {
        $this->command->info('📸 Creazione snapshot...');

        // Crea 500 snapshot
        $snapshots = Snapshot::factory()
            ->count(500)
            ->create([
                'created_at' => Carbon::now()->subDays(rand(1, 180)),
            ]);

        $this->command->info('✅ Creati ' . $snapshots->count() . ' snapshot');
    }

    /**
     * Crea eventi memorizzati.
     */
    private function createStoredEvents(): void
    {
        $this->command->info('📦 Creazione eventi memorizzati...');

        // Crea 1000 eventi memorizzati
        $events = StoredEvent::factory()
            ->count(1000)
            ->create([
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
            ]);

        $this->command->info('✅ Creati ' . $events->count() . ' eventi memorizzati');
    }

    /**
     * Mostra un riassunto dei dati creati.
     */
    private function displaySummary(): void
    {
        $this->command->info('📊 RIASSUNTO DATI CREATI PER MODULO ACTIVITY:');
        $this->command->info('┌─────────────────────────────────────┐');

        try {
            // Conta attività
            $totalActivities = Activity::count();
            $recentActivities = Activity::where('created_at', '>=', Carbon::now()->subDays(7))->count();

            $this->command->info('│ 📝 Attività totali:          ' .
            str_pad((string) $totalActivities, 6, ' ', STR_PAD_LEFT) .
                ' │');
            $this->command->info('│    - Ultimi 7 giorni:        ' .
            str_pad((string) $recentActivities, 6, ' ', STR_PAD_LEFT) .
                ' │');

            // Conta snapshot
            $totalSnapshots = Snapshot::count();

            $this->command->info('│ 📸 Snapshot totali:           ' .
            str_pad((string) $totalSnapshots, 6, ' ', STR_PAD_LEFT) .
                ' │');

            // Conta eventi memorizzati
            $totalEvents = StoredEvent::count();
            $recentEvents = StoredEvent::where('created_at', '>=', Carbon::now()->subDays(7))->count();

            $this->command->info('│ 📦 Eventi memorizzati:       ' .
            str_pad((string) $totalEvents, 6, ' ', STR_PAD_LEFT) .
                ' │');
            $this->command->info('│    - Ultimi 7 giorni:        ' .
            str_pad((string) $recentEvents, 6, ' ', STR_PAD_LEFT) .
                ' │');
        } catch (Exception $e) {
            $this->command->info('│ ❌ Errore nel conteggio: ' . $e->getMessage());
        }

        $this->command->info('└─────────────────────────────────────┘');
        $this->command->info('');
    }
}
