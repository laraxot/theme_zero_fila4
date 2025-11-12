# Regole PHPStan per il Progetto <nome progetto>

Questo documento definisce le regole globali per garantire la compatibilità con PHPStan livello 9 in tutti i moduli.

## Struttura dei Namespace

### Regola fondamentale dei namespace

I namespace dei moduli **NON** devono includere il segmento `app` anche se i file sono fisicamente posizionati nella directory `app`.

```php
// ✅ CORRETTO
namespace Modules\NomeModulo\Providers;
namespace Modules\NomeModulo\Http\Controllers;
namespace Modules\NomeModulo\Datas;
namespace Modules\NomeModulo\Filament\Resources;

// ❌ ERRATO
namespace Modules\NomeModulo\App\Providers;
namespace Modules\NomeModulo\App\Http\Controllers;
namespace Modules\NomeModulo\App\Datas;
```

## Data Transfer Objects (DTOs)

Utilizziamo esclusivamente Spatie's Laravel Data per i nostri DTO:

```php
namespace Modules\NomeModulo\Datas;

use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly ?string $phone = null,
    ) {}

    /**
     * Factory method with proper type checking
     */
    public static function fromArray(array $data): self
    {
        // Safe type handling
        $name = is_string($data['name'] ?? '') 
            ? $data['name'] 
            : (is_scalar($data['name'] ?? '') ? (string)$data['name'] : '');
        
        $email = is_string($data['email'] ?? '') 
            ? $data['email'] 
            : '';
        
        $phone = isset($data['phone']) && is_string($data['phone']) 
            ? $data['phone'] 
            : null;
            
        return new self(
            name: $name,
            email: $email,
            phone: $phone
        );
    }
}
```

### Best Practices per i DTO

1. Usa **sempre** la keyword `readonly` per tutte le proprietà
2. Implementa il metodo `fromArray` per creare DTOs da array con controlli di tipo espliciti
3. Evita cast diretti di tipi `mixed`
4. Usa attributi `#[Validation]` per regole di validazione (quando applicabile)

## QueueableActions invece di Services

Utilizziamo il pattern QueueableAction di Spatie al posto dei tradizionali Services:

```php
namespace Modules\NomeModulo\Actions;

use Spatie\QueueableAction\QueueableAction;

class CreateUserAction
{
    use QueueableAction;
    
    public function execute(UserData $data): User
    {
        // Implementation
    }
}
```

### Vantaggi delle QueueableActions

- **Responsabilità singola**: ogni action fa una cosa sola e la fa bene
- **Facile da testare**: le dipendenze sono chiaramente definite
- **Possibilità di accodamento**: facile mettere in coda operazioni pesanti
- **Tipizzazione rigorosa**: i parametri e i valori di ritorno sono ben definiti

## Gestione dei Valori Mixed

PHPStan livello 9 è particolarmente rigoroso sui tipi `mixed`. Segui queste regole:

### 1. Verifica sempre il tipo prima dei cast

```php
// ❌ ERRATO
$title = (string)$data['title']; // PHPStan error: Cannot cast mixed to string

// ✅ CORRETTO
$title = is_string($data['title'] ?? '') 
    ? $data['title'] 
    : (is_scalar($data['title'] ?? '') ? (string)$data['title'] : '');
```

### 2. Quando si lavora con valori numerici

```php
// ❌ ERRATO
$amount = (float)$value;

// ✅ CORRETTO
$amount = is_numeric($value) ? (float)$value : 0.0;
```

### 3. Accesso sicuro agli array

```php
// ❌ ERRATO
$result = $config['key'];

// ✅ CORRETTO
$result = is_array($config) && isset($config['key']) 
    ? $config['key'] 
    : null;
```

## Filament Resources

### Chiavi nell'Array delle Form Schema

```php
// ✅ CORRETTO - con chiavi stringa
public static function getFormSchema(): array
{
    return [
        'name' => TextInput::make('name')->required(),
        'email' => TextInput::make('email')->email()->required(),
    ];
}

// ❌ ERRATO - con indici numerici
public static function getFormSchema(): array
{
    return [
        TextInput::make('name')->required(),
        TextInput::make('email')->email()->required(),
    ];
}
```

### Stessa regola si applica per Table Columns, Actions e BulkActions

```php
public function getListTableColumns(): array
{
    return [
        'id' => TextColumn::make('id'),
        'title' => TextColumn::make('title'),
    ];
}

public function getTableActions(): array
{
    return [
        'edit' => EditAction::make(),
        'delete' => DeleteAction::make(),
    ];
}

public function getTableBulkActions(): array
{
    return [
        'delete' => DeleteBulkAction::make(),
    ];
}
```

## Annotazioni di Tipo per Relazioni

Assicurati di specificare tutti i parametri generics nelle annotazioni PHPDoc:

```php
// ❌ ERRATO - generics incompleti
/**
 * @return BelongsToMany<User>
 */
public function users(): BelongsToMany

// ✅ CORRETTO - generics completi
/**
 * @return BelongsToMany<User, Role>
 */
public function users(): BelongsToMany
```

## Modelli Eloquent

### Proprietà Arrays nei Modelli

```php
// ✅ CORRETTO
/**
 * @var list<string>
 */
protected $fillable = ['id', 'name', 'email'];

/**
 * @var array<string, string>
 */
protected $casts = [
    'published_at' => 'datetime',
    'created_at' => 'datetime'
];
```

## Considerazioni Importanti

1. Usa sempre `declare(strict_types=1);` all'inizio di ogni file
2. Specifica sempre i tipi di ritorno delle funzioni
3. Evita cast diretti di tipi `mixed`
4. Non confidare nel type juggling di PHP per il tuo codice
5. Preferisci Data Objects immutabili (readonly)
6. Usa QueueableActions al posto di Services tradizionali
7. Documenta sempre le soluzioni ai problemi ricorrenti
