---
trigger: always_on
description: Regole dettagliate per l'implementazione e la gestione delle migrazioni nei progetti Laraxot/<nome progetto>
globs: ["**/database/migrations/*.php"]
---

# Regole per le Migrazioni in Laraxot/<nome progetto>

## Principi Fondamentali

- **Estensione Base**: TUTTE le migrazioni DEVONO estendere `XotBaseMigration`, MAI `Migration`
- **No Down Method**: Le migrazioni che estendono `XotBaseMigration` NON DEVONO implementare il metodo `down()`
- **Controllo Esistenza**: Verificare SEMPRE l'esistenza di tabelle/colonne prima di crearle/modificarle
- **Aggiornamento Migrazioni**: Per aggiungere colonne, COPIARE la migrazione originale con nuovo timestamp
- **Documentazione**: Aggiornare SEMPRE la documentazione più vicina e creare collegamenti bidirezionali
- **Naming**: Usare nomi descrittivi per migrazioni, tabelle e colonne, sempre in snake_case

## Struttura Base per le Migrazioni

### ✅ Pattern Corretto - Creazione Tabella

```php
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class() extends XotBaseMigration {
    /**
     * Nome della tabella.
     */
    protected string $table_name = 'nome_tabella';

    /**
     * Esegue la migrazione.
     */
    public function up(): void
    {
        // Verifica se la tabella esiste già
        if (Schema::hasTable($this->table_name)) {
            echo 'Tabella ['.$this->table_name.'] già esistente';

            return;
        }

        // Crea la tabella
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id();
            
            // Campi specifici
            $table->string('nome');
            $table->string('descrizione')->nullable();
            $table->integer('quantita')->default(0);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Timestamp standard
            $table->timestamps();
        });

        echo 'Tabella ['.$this->table_name.'] creata con successo!';
    }
};
```

### ✅ Pattern Corretto - Aggiornamento Tabella

```php
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class() extends XotBaseMigration {
    /**
     * Nome della tabella.
     */
    protected string $table_name = 'nome_tabella';

    /**
     * Esegue la migrazione.
     */
    public function up(): void
    {
        // Verifica se la tabella esiste
        if (!Schema::hasTable($this->table_name)) {
            echo 'Tabella ['.$this->table_name.'] non esistente';

            return;
        }

        // Aggiunge la colonna se non esiste
        if (!Schema::hasColumn($this->table_name, 'email')) {
            Schema::table($this->table_name, function (Blueprint $table) {
                $table->string('email')->nullable()->after('nome');
            });

            echo 'Colonna [email] aggiunta alla tabella ['.$this->table_name.']';
        } else {
            echo 'Colonna [email] già esistente nella tabella ['.$this->table_name.']';
        }
        
        // Aggiunge un'altra colonna se non esiste
        if (!Schema::hasColumn($this->table_name, 'telefono')) {
            Schema::table($this->table_name, function (Blueprint $table) {
                $table->string('telefono')->nullable()->after('email');
            });

            echo 'Colonna [telefono] aggiunta alla tabella ['.$this->table_name.']';
        } else {
            echo 'Colonna [telefono] già esistente nella tabella ['.$this->table_name.']';
        }
    }
};
```

### ✅ Pattern Corretto - Relazioni e Indici

```php
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class() extends XotBaseMigration {
    /**
     * Nome della tabella.
     */
    protected string $table_name = 'prodotti';

    /**
     * Esegue la migrazione.
     */
    public function up(): void
    {
        // Verifica se la tabella esiste già
        if (Schema::hasTable($this->table_name)) {
            echo 'Tabella ['.$this->table_name.'] già esistente';

            return;
        }

        // Crea la tabella con relazioni e indici
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id();
            
            // Campi principali
            $table->string('nome');
            $table->text('descrizione')->nullable();
            $table->decimal('prezzo', 10, 2)->default(0);
            $table->integer('quantita_disponibile')->default(0);
            
            // Chiavi esterne e relazioni
            $table->foreignId('categoria_id')->constrained('categorie')->onDelete('cascade');
            $table->foreignId('fornitore_id')->nullable()->constrained('fornitori')->onDelete('set null');
            
            // Indici per migliorare le performance
            $table->index('nome');
            $table->index(['categoria_id', 'prezzo']);
            
            // Flag e stati
            $table->boolean('is_attivo')->default(true);
            $table->enum('stato', ['disponibile', 'esaurito', 'in_arrivo'])->default('disponibile');
            
            // Timestamp standard
            $table->timestamps();
        });

        echo 'Tabella ['.$this->table_name.'] creata con successo!';
    }
};
```

### ✅ Pattern Corretto - Tabella Pivot

```php
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class() extends XotBaseMigration {
    /**
     * Nome della tabella pivot.
     */
    protected string $table_name = 'prodotto_tag';

    /**
     * Esegue la migrazione.
     */
    public function up(): void
    {
        // Verifica se la tabella esiste già
        if (Schema::hasTable($this->table_name)) {
            echo 'Tabella ['.$this->table_name.'] già esistente';

            return;
        }

        // Crea la tabella pivot
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id();
            
            // Chiavi esterne
            $table->foreignId('prodotto_id')->constrained()->onDelete('cascade');
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');
            
            // Attributi aggiuntivi della relazione (se necessari)
            $table->integer('ordine')->default(0);
            
            // Indice composito per garantire unicità
            $table->unique(['prodotto_id', 'tag_id']);
            
            // Timestamp standard
            $table->timestamps();
        });

        echo 'Tabella ['.$this->table_name.'] creata con successo!';
    }
};
```

## Regole per Modifica di Tabelle Esistenti

### Regola 1: Copia la Migrazione Originale

Quando è necessario aggiungere colonne a una tabella esistente:
1. **NON** creare una nuova migrazione di creazione
2. **COPIARE** la migrazione originale
3. **AGGIORNARE** il timestamp nel nome del file
4. **AGGIUNGERE** le nuove colonne solo se non esistono

### Regola 2: Verifica Sempre l'Esistenza

Prima di aggiungere o modificare:
1. Verificare sempre se la tabella esiste con `Schema::hasTable($this->table_name)`
2. Verificare sempre se la colonna esiste con `Schema::hasColumn($this->table_name, 'nome_colonna')`

### Regola 3: Documentazione Adeguata

1. Documentare la modifica nella docs del modulo specifico (non root)
2. Creare collegamenti bidirezionali con la root docs
3. Spiegare la motivazione della modifica

### Esempio di Documentazione

```markdown

# Aggiornamento Tabella prodotti

## Modifiche apportate
- Aggiunta colonna `codice_sku` (string, nullable) per supportare i codici di prodotto standardizzati
- Aggiunta colonna `peso` (decimal, nullable) per gestire le informazioni di spedizione
- Aggiunto indice su `codice_sku` per migliorare le performance di ricerca

## Motivazione
Queste modifiche sono necessarie per supportare l'integrazione con il sistema di magazzino esterno
che richiede codici SKU univoci e informazioni sul peso per il calcolo delle spese di spedizione.

## Migrazione di riferimento
`2023_05_15_112233_update_prodotti_table.php`

## Collegamenti
- [Root Docs: Struttura Database](/var/www/html/<nome progetto>/docs/database_structure.md)
- [Modulo Prodotti: Schema](/var/www/html/<nome progetto>/Modules/Prodotti/docs/database_schema.md)
```

## Anti-pattern da Evitare

### ❌ No: Estendere Migration invece di XotBaseMigration

```php
// ❌ MAI estendere Migration
use Illuminate\Database\Migrations\Migration;

return new class() extends Migration {
    // ...
}
```

### ❌ No: Implementare il Metodo Down

```php
// ❌ MAI implementare il metodo down in XotBaseMigration
public function down(): void
{
    Schema::dropIfExists($this->table_name);
}
```

### ❌ No: Non Verificare l'Esistenza

```php
// ❌ MAI creare/modificare senza verificare l'esistenza
public function up(): void
{
    Schema::create($this->table_name, function (Blueprint $table) {
        // Creazione senza verificare se la tabella esiste già
    });
    
    Schema::table($this->table_name, function (Blueprint $table) {
        $table->string('email'); // Aggiunta senza verificare se la colonna esiste già
    });
}
```

### ❌ No: Creare Nuove Migrazioni per Aggiungere Colonne

```php
// ❌ MAI creare una nuova migrazione di creazione per modifiche
// File: 2023_05_15_112233_add_email_to_users_table.php

public function up(): void
{
    Schema::create('users', function (Blueprint $table) {
        // ... definizione originale
        // + nuove colonne
    });
}
```

## Best Practice per le Migrazioni

### 1. Naming Standardizzato

```php
// Creazione tabella
YYYY_MM_DD_HHMMSS_create_nome_tabella_table.php

// Aggiornamento tabella
YYYY_MM_DD_HHMMSS_update_nome_tabella_table.php

// Pivot
YYYY_MM_DD_HHMMSS_create_tabella1_tabella2_table.php
```

### 2. Tipi di Dati Appropriati

Utilizzare i tipi di dati più appropriati per ogni colonna:

```php
$table->string('nome', 100); // String con lunghezza specificata
$table->text('descrizione_lunga'); // Per testi lunghi
$table->tinyInteger('stato')->default(1); // Per numeri piccoli
$table->decimal('prezzo', 10, 2); // Per valori monetari
$table->foreignId('user_id'); // Per chiavi esterne
$table->json('meta_data')->nullable(); // Per dati strutturati
$table->dateTime('data_pubblicazione'); // Per date con ora
```

### 3. Indici e Vincoli

Aggiungere indici e vincoli appropriati per migliorare le performance e l'integrità dei dati:

```php
// Indici
$table->index('nome');
$table->index(['categoria_id', 'is_attivo']);
$table->unique('email');
$table->unique(['anno', 'mese', 'user_id']);
$table->fullText('descrizione'); // Per ricerche full-text

// Chiavi esterne
$table->foreignId('user_id')->constrained()->onDelete('cascade');
$table->foreignId('categoria_id')->nullable()->constrained()->onDelete('set null');
```

### 4. Documentazione e Versionamento

```php
/**
 * Aggiornamento della tabella prodotti.
 *
 * Modifiche:
 * - Aggiunta colonna `codice_sku`
 * - Aggiunta colonna `peso`
 * - Aggiunto indice su `codice_sku`
 *
 * Riferimento ticket: PTCL-123
 * Autore: Nome Cognome
 * Data: 2023-05-15
 */
```

## Procedura per Aggiornamento Tabelle Esistenti

### Fase 1: Documentazione Preliminare

1. Studiare la documentazione esistente del modulo
2. Verificare la struttura attuale della tabella
3. Documentare le modifiche necessarie e la motivazione

### Fase 2: Preparazione Migrazione

1. Copiare il file di migrazione originale
2. Rinominarlo con un nuovo timestamp
3. Aggiornare il contenuto mantenendo la compatibilità

### Fase 3: Implementazione

```php
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class() extends XotBaseMigration {
    /**
     * Nome della tabella.
     */
    protected string $table_name = 'prodotti';

    /**
     * Esegue la migrazione.
     */
    public function up(): void
    {
        // Verifica se la tabella esiste
        if (!Schema::hasTable($this->table_name)) {
            // Se non esiste, crea la tabella con tutte le colonne
            Schema::create($this->table_name, function (Blueprint $table) {
                $table->id();
                
                // Colonne originali
                $table->string('nome');
                $table->text('descrizione')->nullable();
                $table->decimal('prezzo', 10, 2)->default(0);
                
                // Nuove colonne
                $table->string('codice_sku')->nullable()->unique();
                $table->decimal('peso', 8, 2)->nullable();
                
                $table->timestamps();
            });

            echo 'Tabella ['.$this->table_name.'] creata con successo!';
            
            return;
        }
        
        // Se la tabella esiste, verifica e aggiungi solo le nuove colonne
        
        // Verifica e aggiungi codice_sku
        if (!Schema::hasColumn($this->table_name, 'codice_sku')) {
            Schema::table($this->table_name, function (Blueprint $table) {
                $table->string('codice_sku')->nullable()->unique()->after('prezzo');
            });

            echo 'Colonna [codice_sku] aggiunta alla tabella ['.$this->table_name.']';
        } else {
            echo 'Colonna [codice_sku] già esistente nella tabella ['.$this->table_name.']';
        }
        
        // Verifica e aggiungi peso
        if (!Schema::hasColumn($this->table_name, 'peso')) {
            Schema::table($this->table_name, function (Blueprint $table) {
                $table->decimal('peso', 8, 2)->nullable()->after('codice_sku');
            });

            echo 'Colonna [peso] aggiunta alla tabella ['.$this->table_name.']';
        } else {
            echo 'Colonna [peso] già esistente nella tabella ['.$this->table_name.']';
        }
    }
};
```

### Fase 4: Documentazione Post-Implementazione

1. Aggiornare la documentazione del modulo specifico
2. Creare/aggiornare collegamenti bidirezionali con la root docs
3. Aggiornare eventuali diagrammi ER o schemi di database

## Checklist per Migrazioni Corrette

Prima di considerare completa una migrazione, verificare:

- [ ] Estende `XotBaseMigration` anziché `Migration`
- [ ] NON implementa il metodo `down()`
- [ ] Verifica l'esistenza di tabelle/colonne prima di crearle/modificarle
- [ ] Utilizza i tipi di dati appropriati per ogni colonna
- [ ] Definisce indici e chiavi esterne quando necessario
- [ ] Include commenti e documentazione adeguata
- [ ] Segue le convenzioni di naming standard
- [ ] Documentazione nel modulo specifico aggiornata
- [ ] Collegamenti bidirezionali con la root docs creati/aggiornati
