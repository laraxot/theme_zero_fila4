# Console Command Creation Workflow (Standard Supremo)

Workflow per la creazione di Console Commands seguendo lo standard estratto dal capolavoro `ChangeTypeCommand.php`.

## Invocazione
Usa `/console-command` in Windsurf Cascade per creare Command perfetti secondo il **tuo** standard.

## Fase 1: Analisi e Preparazione

### 1.1 Definizione Requisiti
```bash

# Identifica:

# - Modulo di appartenenza

# - Nome comando (formato: module:action)

# - Scopo e funzionalità

# - Input richiesti dall'utente

# - Operazioni da eseguire
```

### 1.2 Controllo Standard di Riferimento
```bash

# Studia sempre il capolavoro:
cat /var/www/html/_bases/base_saluteora/laravel/Modules/User/app/Console/Commands/ChangeTypeCommand.php

# Controlla documentazione filosofica:
cat /var/www/html/_bases/base_saluteora/laravel/Modules/User/docs/console_commands_philosophy.md
```

## Fase 2: Implementazione Template Supremo

### 2.1 Struttura File Base
```php
<?php

declare(strict_types=1);

namespace Modules\\{ModuleName}\\Console\\Commands;

use Illuminate\\Console\\Command;
use Modules\\Xot\\Contracts\\UserContract;
use Modules\\Xot\\Datas\\XotData;
use Illuminate\\Support\\Arr;

use function Laravel\\Prompts\\text;
use function Laravel\\Prompts\\select;
use function Laravel\\Prompts\\confirm;

class {CommandName}Command extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = '{module}:{action}';

    /**
     * The console command description.
     *
     * @var string|null
     */
    protected $description = 'Descrizione chiara e dettagliata del comando';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // Implementazione seguendo il pattern supremo
    }
}
```

### 2.2 Pattern Input Gathering (Laravel Prompts)
```php
// Text input
$email = text('User email?');
$name = text('Enter name:', default: 'Default value');

// Selection
$type = select('Select type:', $options);
$action = select('Choose action:', [
    'create' => 'Create new',
    'update' => 'Update existing',
    'delete' => 'Delete item'
]);

// Confirmation
$confirmed = confirm('Are you sure?');
$force = confirm('Force operation?', default: false);
```

### 2.3 Pattern Data Access (XotData e Contracts)
```php
// Accesso tramite XotData - MAI diretto ai modelli
/** @var UserContract */
$user = XotData::make()->getUserByEmail($email);

// Altri pattern di accesso
$entity = XotData::make()->getModelByParam($param);
$collection = XotData::make()->getCollectionByFilters($filters);
```

### 2.4 Pattern Error Handling Robusto
```php
// Controllo esistenza entità
if (!$user) {
    $this->error(\"User with email '{$email}' not found.\");
    return;
}

// Controllo esistenza metodi
if (!method_exists($user, 'getChildTypes')) {
    $this->error('User model does not have getChildTypes method.');
    return;
}

// Controllo permessi/stato
if (!$user->canPerformAction()) {
    $this->error('User is not authorized for this action.');
    return;
}
```

### 2.5 Pattern Array Manipulation Elegante
```php
// Usare Arr helpers invece di foreach primitivi
$options = Arr::mapWithKeys($childTypes,
    function ($item, string $key) use ($typeClass) {
        $val = $typeClass::tryFrom($key)->getLabel();
        return [$key => $val];
    }
);

// Altri pattern utili
$filtered = Arr::where($collection, fn($item) => $item->isActive());
$grouped = Arr::groupBy($items, 'status');
```

### 2.6 Pattern Enum Handling Moderno
```php
// Current state con enum
$this->info(\"Current user type: {$user->type->getLabel()}\");

// Enum conversion sicura
$typeClass = get_class($user->type);
$enumValue = $typeClass::tryFrom($key);

// Update con enum
$user->type = $newType;
$user->save();
```

## Fase 3: Feedback e User Experience

### 3.1 Info Messages Chiari
```php
$this->info(\"Current state: {$entity->getCurrentState()}\");
$this->info(\"Operation completed successfully for {$identifier}\");
$this->info('Processing...');
```

### 3.2 Error Messages Specifici
```php
$this->error(\"Entity with '{$input}' not found.\");
$this->error('Required method is missing.');
$this->error('Operation failed: insufficient permissions.');
```

### 3.3 Progress e Status
```php
$this->line('Starting operation...');
$this->comment('Optional step completed.');
$this->warn('Warning: operation will modify data.');
```

## Fase 4: Documentazione e Future Implementation

### 4.1 PHPDoc Completo
```php
/**
 * Execute the console command.
 * 
 * This command allows changing user types based on the available
 * child types defined in the user model.
 */
public function handle(): void
```

### 4.2 Future Implementation Comments
```php
// Log dell'attività se disponibile
// $this->logActivity($user, $oldType, $newType);

// Notifiche future
// $this->sendNotification($user, 'type_changed');

// Audit trail
// $this->recordAuditEvent($user, 'type_change', $data);
```

## Fase 5: Testing e Validation

### 5.1 Test Scenario Comuni
```bash

# Test input validation
php artisan {module}:{action}

# Test error handling
php artisan {module}:{action} # Con input invalidi

# Test success flow
php artisan {module}:{action} # Con input validi
```

### 5.2 Controlli di Qualità
- [ ] `declare(strict_types=1);` presente
- [ ] Namespace corretto del modulo
- [ ] Laravel Prompts utilizzati (mai ask/choice)
- [ ] XotData e Contracts per data access
- [ ] Error handling preventivo completo
- [ ] Method existence checking
- [ ] Enum handling con tryFrom()
- [ ] Array helpers per manipolazioni
- [ ] Feedback utente chiaro
- [ ] PHPDoc completo
- [ ] Future implementation commentata

## Esempi per Diversi Scenari

### User Management Command
```php
$email = text('User email?');
$user = XotData::make()->getUserByEmail($email);
$newRole = select('Select role:', $user->getAvailableRoles());
```

### Data Migration Command
```php
$source = select('Source:', ['database', 'file', 'api']);
$batchSize = text('Batch size?', default: '100');
$confirmed = confirm('Start migration?');
```

### System Maintenance Command
```php
$operation = select('Operation:', [
    'backup' => 'Create backup',
    'cleanup' => 'Clean temporary files',
    'optimize' => 'Optimize database'
]);
$force = confirm('Force operation without prompts?');
```

## Anti-Pattern da Evitare

### ❌ Framework Obsoleti
```php
// MAI USARE
$input = $this->ask('Question?');
$choice = $this->choice('Select:', $options);
```

### ❌ Accesso Diretto
```php
// MAI USARE
$user = User::where('email', $email)->first();
$users = User::all();
```

### ❌ Error Handling Scarso
```php
// MAI USARE
$user->update($data); // Senza controlli
$result = $operation(); // Senza validazione
```

---

**Standard Estratto dal Capolavoro**: `ChangeTypeCommand.php`  
**Filosofia**: Serenità, robustezza, eleganza  
**Religione**: Laravel Prompts, XotData, Contracts  
