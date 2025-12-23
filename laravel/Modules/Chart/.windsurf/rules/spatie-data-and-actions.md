---
trigger: always_on
description: Regole e pattern per l'utilizzo di Spatie Laravel Data e QueableActions in progetti Laraxot/<nome progetto>
globs: ["**/Data/**/*.php", "**/Actions/**/*.php", "**/Services/**/*.php"]
---

# Pattern per Spatie Laravel Data e QueableActions

## Principi Fondamentali

- **Preferenza**: Utilizzare SEMPRE Spatie Laravel Data e QueableActions invece di servizi tradizionali
- **Tipizzazione**: Dichiarare SEMPRE tipi espliciti per proprietà, parametri e valori di ritorno
- **Immutabilità**: Preferire oggetti immutabili con costruttori ben definiti
- **Namespace**: Rispettare lo schema `Modules\{ModuleName}\{Data|Actions}`
- **Documentazione**: Documentare tutte le classi Data e Action nel modulo corrispondente

## Pattern Spatie Laravel Data

### ✅ Pattern Corretto - Data Object

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;

class UserData extends Data
{
    public function __construct(
        #[Required, StringType]
        public readonly string $name,
        
        #[Required, Email]
        public readonly string $email,
        
        #[WithCast(DateTimeInterfaceCast::class)]
        public readonly ?\DateTimeInterface $created_at = null,
        
        #[WithCast(DateTimeInterfaceCast::class)]
        public readonly ?\DateTimeInterface $updated_at = null,
        
        public readonly ?int $id = null,
    ) {
    }
    
    /**
     * Crea un nuovo UserData da un modello User.
     *
     * @param \Modules\ModuleName\Models\User $user
     * @return self
     */
    public static function fromModel(\Modules\ModuleName\Models\User $user): self
    {
        return new self(
            name: $user->name,
            email: $user->email,
            created_at: $user->created_at,
            updated_at: $user->updated_at,
            id: $user->id,
        );
    }
    
    /**
     * Crea un'istanza del modello User da questo Data Object.
     *
     * @return \Modules\ModuleName\Models\User
     */
    public function toModel(): \Modules\ModuleName\Models\User
    {
        $user = $this->id
            ? \Modules\ModuleName\Models\User::findOrFail($this->id)
            : new \Modules\ModuleName\Models\User();
            
        $user->name = $this->name;
        $user->email = $this->email;
        
        return $user;
    }
}
```

### ✅ Pattern Corretto - DTO Collection

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\DataCollection;

class UserDataCollection extends DataCollection
{
    public function __construct(
        public Collection|array $items
    ) {
        parent::__construct($items);
    }
    
    /**
     * Crea una collezione da un elenco di modelli.
     *
     * @param \Illuminate\Database\Eloquent\Collection<int, \Modules\ModuleName\Models\User> $users
     * @return self
     */
    public static function fromModels($users): self
    {
        return new self(
            $users->map(fn ($user) => UserData::fromModel($user))->all()
        );
    }
    
    /**
     * Restituisce il tipo di dato nella collezione.
     *
     * @return class-string
     */
    public static function getDataClass(): string
    {
        return UserData::class;
    }
}
```

### ✅ Pattern Corretto - Enum Value Object

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self draft()
 * @method static self published()
 * @method static self archived()
 */
final class StatusEnum extends Enum
{
    /**
     * Restituisce un array di etichette tradotte per le opzioni di enum.
     *
     * @return array<string, string>
     */
    public static function toSelectArray(): array
    {
        return [
            'draft' => __('modulename::enums.status.draft'),
            'published' => __('modulename::enums.status.published'),
            'archived' => __('modulename::enums.status.archived'),
        ];
    }
    
    /**
     * Determina se lo stato è considerato attivo.
     */
    public function isActive(): bool
    {
        return $this->value === self::published()->value;
    }
}
```

## Pattern Spatie QueableAction

### ✅ Pattern Corretto - Action Base

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Actions;

use Spatie\QueueableAction\QueueableAction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\ModuleName\Data\InputData;
use Modules\ModuleName\Data\ResultData;

class ProcessDataAction implements ShouldQueue
{
    use QueueableAction;
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;
    
    /**
     * Crea una nuova istanza dell'azione.
     */
    public function __construct(
        private readonly \Modules\ModuleName\Repositories\RepositoryInterface $repository
    ) {
    }
    
    /**
     * Esegue l'azione.
     *
     * @param \Modules\ModuleName\Data\InputData $input
     * @return \Modules\ModuleName\Data\ResultData
     */
    public function execute(InputData $input): ResultData
    {
        // Logica di elaborazione
        $result = $this->repository->process($input);
        
        // Restituisci un oggetto Data
        return new ResultData(
            status: 'success',
            message: __('modulename::actions.process_data.success'),
            data: $result
        );
    }
}
```

### ✅ Pattern Corretto - Action con Notifica

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Actions;

use Spatie\QueueableAction\QueueableAction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\ModuleName\Data\UserData;
use Modules\ModuleName\Notifications\ActionCompletedNotification;

class ProcessUserDataAction implements ShouldQueue
{
    use QueueableAction;
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;
    
    /**
     * Crea una nuova istanza dell'azione.
     */
    public function __construct(
        private readonly \Modules\ModuleName\Services\UserService $userService
    ) {
    }
    
    /**
     * Esegue l'azione.
     *
     * @param \Modules\ModuleName\Data\UserData $userData
     * @param bool $sendNotification
     * @return \Modules\ModuleName\Data\UserData
     */
    public function execute(UserData $userData, bool $sendNotification = true): UserData
    {
        // Elabora i dati dell'utente
        $processedUser = $this->userService->process($userData);
        
        // Notifica il completamento se richiesto
        if ($sendNotification && $processedUser->id) {
            $user = \Modules\ModuleName\Models\User::find($processedUser->id);
            if ($user) {
                $user->notify(new ActionCompletedNotification($processedUser));
            }
        }
        
        return $processedUser;
    }
}
```

### ✅ Pattern Corretto - Action in Controller

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Modules\ModuleName\Actions\ProcessUserDataAction;
use Modules\ModuleName\Data\UserData;

class UserController extends Controller
{
    /**
     * Processa i dati dell'utente.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Modules\ModuleName\Actions\ProcessUserDataAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function process(Request $request, ProcessUserDataAction $action): JsonResponse
    {
        // Validazione e conversione in un oggetto Data
        $userData = UserData::validateAndCreate($request->all());
        
        // Esecuzione immediata dell'action
        $result = $action->execute($userData);
        
        return response()->json([
            'success' => true,
            'data' => $result,
            'message' => __('modulename::messages.process_success'),
        ]);
    }
    
    /**
     * Processa i dati dell'utente in modo asincrono.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Modules\ModuleName\Actions\ProcessUserDataAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function processAsync(Request $request, ProcessUserDataAction $action): JsonResponse
    {
        // Validazione e conversione in un oggetto Data
        $userData = UserData::validateAndCreate($request->all());
        
        // Accodamento dell'action
        $action->onQueue('users')->execute($userData);
        
        return response()->json([
            'success' => true,
            'message' => __('modulename::messages.process_queued'),
        ]);
    }
}
```

### ✅ Pattern Corretto - Action in Filament

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Filament\Resources\UserResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\ModuleName\Actions\ProcessUserDataAction;
use Modules\ModuleName\Data\UserData;
use Modules\ModuleName\Filament\Resources\UserResource;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    
    /**
     * Gestisce la creazione del record.
     *
     * @param array<string, mixed> $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function handleRecordCreation(array $data)
    {
        // Converti i dati del form in un oggetto Data
        $userData = UserData::from($data);
        
        // Esegui l'action
        $processedData = app(ProcessUserDataAction::class)->execute($userData);
        
        // Crea e restituisci il modello
        return $processedData->toModel()->save();
    }
}
```

## Integrazione con Laravel Livewire

### ✅ Pattern Corretto - Livewire Component con Data e Action

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Http\Livewire;

use Livewire\Component;
use Modules\ModuleName\Actions\ProcessUserDataAction;
use Modules\ModuleName\Data\UserData;

class UserForm extends Component
{
    /** @var string */
    public string $name = '';
    
    /** @var string */
    public string $email = '';
    
    /**
     * Regole di validazione.
     *
     * @return array<string, array<int, string>>
     */
    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ];
    }
    
    /**
     * Messaggi di validazione.
     *
     * @return array<string, string>
     */
    protected function messages(): array
    {
        return [
            'name.required' => __('modulename::validation.name.required'),
            'email.required' => __('modulename::validation.email.required'),
            'email.email' => __('modulename::validation.email.email'),
        ];
    }
    
    /**
     * Processa il form.
     */
    public function submit(): void
    {
        $this->validate();
        
        // Crea un oggetto Data dai dati del form
        $userData = new UserData(
            name: $this->name,
            email: $this->email,
        );
        
        try {
            // Esegui l'action
            app(ProcessUserDataAction::class)->execute($userData);
            
            // Notifica il successo
            $this->dispatchBrowserEvent('notify', [
                'type' => 'success',
                'message' => __('modulename::messages.process_success'),
            ]);
            
            // Reset del form
            $this->reset();
        } catch (\Exception $e) {
            // Gestione errori
            $this->dispatchBrowserEvent('notify', [
                'type' => 'error',
                'message' => __('modulename::messages.process_error'),
            ]);
            
            // Log dell'errore
            \Log::error('Errore nel processare i dati utente', [
                'exception' => $e->getMessage(),
                'data' => $userData,
            ]);
        }
    }
    
    /**
     * Renderizza il componente.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('modulename::livewire.user-form');
    }
}
```

## Anti-pattern da Evitare

### ❌ No: Servizi Tradizionali Senza DTO

```php
// ❌ MAI utilizzare servizi tradizionali senza DTO
namespace Modules\ModuleName\Services;

class UserService
{
    public function process(array $data)
    {
        // Logica con array non tipizzati
        $user = \Modules\ModuleName\Models\User::create($data);
        
        return $user;
    }
}
```

### ❌ No: Data Objects Mutabili

```php
// ❌ MAI creare Data Objects mutabili
namespace Modules\ModuleName\Data;

use Spatie\LaravelData\Data;

class UserData extends Data
{
    public string $name;
    public string $email;
    
    // Metodi setter mutabili (DA EVITARE)
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
}
```

### ❌ No: Logica di Business nel Controller

```php
// ❌ MAI inserire logica di business nel controller
namespace Modules\ModuleName\Http\Controllers;

class UserController extends Controller
{
    public function process(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        
        // Logica di business direttamente nel controller (DA EVITARE)
        $user = \Modules\ModuleName\Models\User::create($data);
        
        // Altre operazioni...
        
        return response()->json($user);
    }
}
```

## Best Practice

1. **Immutabilità**
   - I Data Objects dovrebbero essere immutabili
   - Utilizzare i costruttori per impostare i valori
   - Creare nuove istanze per modificare i dati

2. **Validazione**
   - Utilizzare gli attributi di validazione di Spatie Laravel Data
   - Definire regole di validazione chiare e riutilizzabili
   - Includere messaggi di errore localizzati

3. **Conversione**
   - Fornire metodi per conversione da/a modelli
   - Utilizzare named constructor per chiarezza semantica
   - Gestire correttamente i tipi di dati

4. **Code Quality**
   - Tipizzazione rigorosa per tutti i metodi e proprietà
   - PHPDoc completi con tipi generics quando necessario
   - Metodi ben documentati con esempi di utilizzo

5. **Testing**
   - Scrivere test unitari per Data Objects e Actions
   - Testare i casi limite e gli scenari di errore
   - Utilizzare factories per generare dati di test

## Migrazione da Servizi a Data + Actions

### Fase 1: Identificare i Servizi da Migrare

```php
// Servizio originale da migrare
namespace Modules\ModuleName\Services;

class UserService
{
    public function create(array $data)
    {
        return \Modules\ModuleName\Models\User::create($data);
    }
    
    public function update(int $id, array $data)
    {
        $user = \Modules\ModuleName\Models\User::findOrFail($id);
        $user->update($data);
        return $user;
    }
}
```

### Fase 2: Creare Data Objects

```php
// Creazione del Data Object
namespace Modules\ModuleName\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Validation\Required;

class UserData extends Data
{
    public function __construct(
        #[Required]
        public readonly string $name,
        
        #[Required]
        public readonly string $email,
        
        public readonly ?int $id = null,
    ) {
    }
}
```

### Fase 3: Creare Actions

```php
// Creazione delle Actions
namespace Modules\ModuleName\Actions;

use Spatie\QueueableAction\QueueableAction;
use Modules\ModuleName\Data\UserData;

class CreateUserAction
{
    use QueueableAction;
    
    public function execute(UserData $data): UserData
    {
        $user = new \Modules\ModuleName\Models\User();
        $user->name = $data->name;
        $user->email = $data->email;
        $user->save();
        
        return UserData::from($user);
    }
}

class UpdateUserAction
{
    use QueueableAction;
    
    public function execute(UserData $data): UserData
    {
        $user = \Modules\ModuleName\Models\User::findOrFail($data->id);
        $user->name = $data->name;
        $user->email = $data->email;
        $user->save();
        
        return UserData::from($user);
    }
}
```

### Fase 4: Aggiornare i Controller

```php
// Aggiornamento del Controller
namespace Modules\ModuleName\Http\Controllers;

use Modules\ModuleName\Actions\CreateUserAction;
use Modules\ModuleName\Actions\UpdateUserAction;
use Modules\ModuleName\Data\UserData;

class UserController extends Controller
{
    public function store(Request $request, CreateUserAction $action)
    {
        $data = UserData::validateAndCreate($request->all());
        $result = $action->execute($data);
        
        return response()->json($result);
    }
    
    public function update(Request $request, int $id, UpdateUserAction $action)
    {
        $data = UserData::validateAndCreate(array_merge(
            $request->all(),
            ['id' => $id]
        ));
        
        $result = $action->execute($data);
        
        return response()->json($result);
    }
}
```

## Documentazione Essenziale per Data e Actions

Ogni modulo che utilizza Spatie Laravel Data e QueableActions dovrebbe includere:

1. **Documentazione Generale**
   - `Modules/ModuleName/docs/DATA_OBJECTS.md` - Spiegazione dei Data Objects del modulo
   - `Modules/ModuleName/docs/ACTIONS.md` - Documentazione delle Actions disponibili

2. **Esempio di Documentazione Data Objects**
   ```markdown
   # Data Objects in ModuleName
   
   Questo modulo utilizza Spatie Laravel Data per implementare il pattern DTO.
   
   ## UserData
   Rappresenta i dati di un utente.
   
   ### Proprietà
   - `name` (string): Nome dell'utente
   - `email` (string): Email dell'utente
   - `id` (int|null): ID dell'utente, null se nuovo
   
   ### Metodi
   - `fromModel(User $user)`: Crea un UserData da un modello User
   - `toModel()`: Converte il DTO in un modello User
   
   ### Esempio d'uso
   ```php
   // Creazione da array
   $userData = UserData::from([
       'name' => 'Mario Rossi',
       'email' => 'mario@example.com',
   ]);
   
   // Creazione da modello
   $userData = UserData::fromModel($user);
   
   // Conversione in modello
   $user = $userData->toModel();
   ```
   ```

3. **Esempio di Documentazione Actions**
   ```markdown
   # Actions in ModuleName
   
   Questo modulo utilizza Spatie QueableActions per implementare la logica di business.
   
   ## CreateUserAction
   Crea un nuovo utente nel sistema.
   
   ### Parametri
   - `UserData $data`: Dati dell'utente da creare
   
   ### Restituisce
   - `UserData`: Dati dell'utente creato con ID assegnato
   
   ### Esempio d'uso
   ```php
   // Uso diretto
   $userData = new UserData(name: 'Mario', email: 'mario@example.com');
   $result = app(CreateUserAction::class)->execute($userData);
   
   // Uso accodato
   app(CreateUserAction::class)
       ->onQueue('users')
       ->execute($userData);
   ```
   ```
