---
trigger: always_on
description: 
globs: 
---
---
description: Regole e linee guida per lo sviluppo con Laraxot
globs: ["**/*.php", "**/*.blade.php", "**/*.js", "**/*.ts", "**/*.vue"]
---

# Regole e Best Practices Laraxot

## Principi Fondamentali

- **Modularità**: Organizzare il codice in moduli indipendenti e ben definiti
- **Tipizzazione Stretta**: Utilizzare sempre `declare(strict_types=1)` e type hints
- **Immutabilità**: Preferire oggetti immutabili, specialmente per i DTO
- **Testabilità**: Scrivere codice facilmente testabile con responsabilità chiare
- **Documentazione**: Mantenere la documentazione aggiornata nelle cartelle `docs/`

## Struttura dei Moduli

```
ModuleName/
├── app/
│   ├── Actions/
│   ├── Data/
│   ├── Filament/
│   │   ├── Resources/
│   │   └── Pages/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Models/
│   └── Providers/
├── config/
├── database/
├── docs/
├── resources/
└── routes/
```

## Data Transfer Objects

### Utilizzo di Spatie Laravel Data

```php
declare(strict_types=1);

namespace Modules\ModuleName\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Validation;

class ExampleData extends Data
{
    public function __construct(
        #[Validation('required|string|max:255')]
        public readonly string $nome,
        
        #[Validation('nullable|date')]
        public readonly ?Carbon $data = null,
    ) {}
}
```

### Best Practices per i DTO

- Utilizzare sempre `readonly` per garantire l'immutabilità
- Implementare metodi `with` per modifiche
- Definire regole di validazione chiare con attributi
- Utilizzare tipi di ritorno espliciti

## Actions vs Services

### Preferire Spatie QueueableActions

```php
declare(strict_types=1);

namespace Modules\ModuleName\Actions;

use Spatie\QueueableAction\QueueableAction;

class CreateExampleAction
{
    use QueueableAction;

    public function execute(ExampleData $data): Example
    {
        // Implementazione
    }
}
```

### Vantaggi delle Actions

- Responsabilità singola e ben definita
- Facilmente testabili
- Possibilità di accodamento
- Migliore separazione delle responsabilità rispetto ai Services

## Filament Resources

### Estendere XotBaseResource

```php
declare(strict_types=1);

namespace Modules\ModuleName\Filament\Resources;

use Modules\Xot\Filament\Resources\XotBaseResource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;

class ExampleResource extends XotBaseResource
{
    public static function getFormSchema(): array
    {
        return [
            TextInput::make('nome')->required(),
            DatePicker::make('data'),
        ];
    }
    
    // Altri metodi...
}
```

### Convenzioni per Filament

- Implementare sempre `getFormSchema()` invece di `form()`
- Utilizzare i file di traduzione per le label
- Seguire la struttura standard per le risorse
- Estendere le classi base di Xot

## Testing

- Scrivere test per tutte le Actions
- Utilizzare factories per i dati di test
- Seguire la convenzione AAA (Arrange, Act, Assert)
- Testare i casi limite e gli errori

## Sicurezza

- Validare tutti gli input
- Utilizzare Gate e Policy per l'autorizzazione
- Seguire le best practices OWASP
- Implementare autenticazione robusta

## Performance

- Utilizzare il caching quando appropriato
- Ottimizzare le query N+1
- Utilizzare le code per operazioni pesanti
- Monitorare le prestazioni

## Convenzioni di Codice

- Seguire PSR-12 per lo stile del codice
- Utilizzare la tipizzazione stretta
- Documentare tutte le classi e i metodi pubblici
- Seguire le convenzioni di naming di Laravel

## Documentazione

- Mantenere la documentazione aggiornata nelle cartelle `docs/`
- Documentare tutte le API
- Includere esempi di utilizzo
- Seguire il formato Markdown standard

## Regole permanenti per Action Filament custom (aggiornamento 2025-05)
- Override di setUp() per configurare tutte le proprietà dell'action custom (label, icona, conferma, azione, ecc.).
- Nome univoco e documentato passato a parent::make (o gestito internamente da Filament).
- Tutte le label, heading e descrizioni devono provenire dai file di traduzione del modulo (mai stringhe hardcoded).
- Tipizzazione rigorosa di tutti i metodi, evitare mixed se non strettamente necessario.
- Documentazione aggiornata e collegata (modulo e root).
- Validazione statica con phpstan e test di regressione dopo ogni bugfix.
- Vedi [Xot/docs/rules.md] e [Performance/docs/organizzativa-migration-errors.md] per esempi pratici e motivazione.