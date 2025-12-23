---
trigger: always_on
description: Regole dettagliate per le migrazioni in Laraxot/<nome progetto>
globs: ["**/database/migrations/*.php"]
---

# Regole per le Migrazioni in Laraxot/<nome progetto>

## Principi Fondamentali

- **Classi Anonime:** Utilizzare SEMPRE classi anonime che estendono `XotBaseMigration`
- **No down():** MAI implementare il metodo `down()` nelle migrazioni
- **Aggiunta Colonne:** MAI creare nuove migrazioni separate per aggiungere colonne
- **Documentazione:** Documentare SEMPRE le modifiche con collegamenti bidirezionali
- **Condizionali:** Utilizzare SEMPRE controlli condizionali per l'esistenza di tabelle/colonne

## Struttura Corretta di una Migrazione

```php
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Controllo se la tabella esiste già
        if ($this->hasTable('nome_tabella')) {
            return;
        }

        // Creazione tabella
        Schema::create('nome_tabella', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->integer('stabi')->nullable();
            $table->decimal('importo', 10, 2)->nullable();
            $table->timestamps();
        });
        
        // Aggiunta commento alla tabella
        $this->tableComment('nome_tabella', 'Descrizione della tabella');
    }
};
```

## ❌ Anti-pattern da Evitare

```php
<?php

// ❌ MAI fare questo
use Illuminate\Database\Migrations\Migration;

class CreateTableName extends Migration // NON estendere Migration
{
    public function up()
    {
        // ...
    }
    
    public function down() // MAI implementare down()
    {
        // ...
    }
}
```

## Procedura per Aggiungere Colonne a Tabelle Esistenti

### ✅ Metodo Corretto

1. Copiare la migrazione originale che ha creato la tabella
2. Aggiornare il timestamp nel nome del file (es. da `2021_01_01_000000` a `2023_05_15_000000`)
3. Aggiungere la colonna nel blocco `Schema::create` originale
4. Aggiungere un blocco condizionale per l'aggiunta della colonna se la tabella esiste già

```php
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    public function up(): void
    {
        // 1. Prima crea la tabella se non esiste (codice originale)
        if (! $this->hasTable('nome_tabella')) {
            Schema::create('nome_tabella', function (Blueprint $table) {
                $table->id();
                $table->string('nome')->nullable();
                $table->integer('stabi')->nullable();
                $table->decimal('importo', 10, 2)->nullable();
                // Nuova colonna aggiunta qui
                $table->string('nuova_colonna')->nullable();
                $table->timestamps();
            });
            
            $this->tableComment('nome_tabella', 'Descrizione della tabella');
            return;
        }
        
        // 2. Se la tabella esiste, aggiungi solo la nuova colonna
        if (! $this->hasColumn('nome_tabella', 'nuova_colonna')) {
            Schema::table('nome_tabella', function (Blueprint $table) {
                $table->string('nuova_colonna')->nullable();
            });
        }
    }
};
```

### ❌ Metodo Errato (da evitare)

```php
<?php

// ❌ MAI fare questo
use Illuminate\Database\Migrations\Migration;

class AddColumnToTable extends Migration
{
    public function up()
    {
        Schema::table('nome_tabella', function (Blueprint $table) {
            $table->string('nuova_colonna');
        });
    }
    
    public function down()
    {
        Schema::table('nome_tabella', function (Blueprint $table) {
            $table->dropColumn('nuova_colonna');
        });
    }
}
```

## Metodi Helper di XotBaseMigration

```php
// Controllo esistenza tabella
if ($this->hasTable('nome_tabella')) {
    // ...
}

// Controllo esistenza colonna
if ($this->hasColumn('nome_tabella', 'nome_colonna')) {
    // ...
}

// Aggiunta commento alla tabella
$this->tableComment('nome_tabella', 'Descrizione della tabella');

// Aggiunta commento alla colonna
$this->columnComment('nome_tabella', 'nome_colonna', 'Descrizione della colonna');
```

## Documentazione delle Migrazioni

Ogni modifica alla struttura del database deve essere documentata:

1. Nel commit message
2. Nei file di documentazione del modulo (`Modules/<NomeModulo>/docs/`)
3. Nella documentazione globale se necessario (`docs/`)
4. Con riferimenti incrociati (collegamenti bidirezionali)

Esempio di documentazione:

```markdown

# Aggiunta Colonna valutatore_id alla Tabella performance_individuale

## Motivazione
La colonna è stata aggiunta per tracciare l'utente che ha effettuato la valutazione.

## Dettagli Implementazione
- Migrazione: `2023_05_15_000000_create_performance_individuale_table.php`
- Tipo di dato: `unsignedBigInteger` con foreign key verso `users.id`
- Nullable: true

## Collegamenti
- [Performance/Models/PerformanceIndividuale.php](/var/www/html/<nome progetto>/laravel/Modules/Performance/Models/PerformanceIndividuale.php)
- [Performance/docs/SCHEMA.md](/var/www/html/<nome progetto>/laravel/Modules/Performance/docs/SCHEMA.md)
```

## Gestione delle Foreign Key

```php
// Creazione foreign key
$table->unsignedBigInteger('user_id')->nullable();
$table->foreign('user_id')->references('id')->on('users');

// Oppure con metodo abbreviato
$table->foreignId('user_id')->nullable()->constrained();

// Con opzioni on delete/update
$table->foreignId('user_id')
    ->nullable()
    ->constrained()
    ->onDelete('cascade')
    ->onUpdate('cascade');
```

## Tipi di Colonne Comuni

```php
$table->id(); // Chiave primaria autoincrement
$table->uuid('uuid')->unique(); // UUID
$table->string('nome', 100)->nullable(); // Stringa con lunghezza massima
$table->text('descrizione')->nullable(); // Testo lungo
$table->integer('quantita')->default(0); // Intero con default
$table->decimal('importo', 10, 2)->nullable(); // Decimale (10 cifre, 2 decimali)
$table->boolean('attivo')->default(true); // Booleano
$table->date('data')->nullable(); // Data
$table->dateTime('timestamp')->nullable(); // Data e ora
$table->timestamps(); // created_at e updated_at
$table->softDeletes(); // deleted_at per soft delete
```

## Note Importanti

- Eseguire sempre `php artisan migrate:status` prima di applicare nuove migrazioni
- Testare le migrazioni in ambiente di sviluppo prima di committare
- Verificare sempre che le migrazioni siano idempotenti (possono essere eseguite più volte senza errori)
- Documentare ogni modifica significativa alla struttura del database
- Aggiornare i modelli e le relazioni quando si modificano le tabelle
- MAI usare il comando `php artisan migrate:rollback` in produzione
