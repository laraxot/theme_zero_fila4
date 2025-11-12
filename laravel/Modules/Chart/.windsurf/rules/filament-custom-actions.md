---
trigger: always_on
description: Regole dettagliate per l'implementazione di Action Filament personalizzate in progetti Laraxot/<nome progetto>
globs: ["**/Filament/Actions/*.php", "**/Filament/Resources/**/Actions/*.php", "**/Filament/Pages/**/Actions/*.php"]
---

# Regole per Azioni Filament Personalizzate in Laraxot/<nome progetto>

## Principi Fondamentali

- **Override di setUp()**: Configurare TUTTE le proprietà dell'action nel metodo `setUp()`
- **Nomi Univoci**: Ogni action deve avere un nome univoco e documentato
- **Traduzioni**: Tutte le label, heading e descrizioni DEVONO provenire dai file di traduzione
- **Tipizzazione**: Rigida tipizzazione di tutti i metodi e parametri
- **Documentazione**: Documentazione aggiornata nel modulo pertinente e collegata alla root

## Struttura Corretta per Azioni Personalizzate

### ✅ Pattern Corretto

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Filament\Actions;

use Filament\Actions\Action;
use Filament\Support\Colors\Color;
use Filament\Forms;
use Illuminate\Support\Collection;

class ApproveAction extends Action
{
    /**
     * Configurazione iniziale dell'azione.
     */
    protected function setUp(): void
    {
        parent::setUp();
        
        $this->label(__('modulename::actions.approve.label'))
            ->modalHeading(__('modulename::actions.approve.modal_heading'))
            ->modalDescription(__('modulename::actions.approve.modal_description'))
            ->icon('heroicon-o-check-circle')
            ->color(Color::GREEN)
            ->requiresConfirmation()
            ->form([
                Forms\Components\Textarea::make('note')
                    ->label(__('modulename::actions.approve.fields.note.label'))
                    ->placeholder(__('modulename::actions.approve.fields.note.placeholder')),
            ])
            ->action(function (array $data, $record): void {
                $this->processApproval($record, $data['note'] ?? null);
            })
            ->successNotificationTitle(__('modulename::actions.approve.notifications.success'));
    }
    
    /**
     * Processa l'approvazione.
     *
     * @param \Modules\ModuleName\Models\ModelName $record
     * @param string|null $note
     */
    protected function processApproval($record, ?string $note): void
    {
        // Implementazione dell'approvazione
    }
}
```

### ❌ Anti-pattern da Evitare

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Filament\Actions;

use Filament\Actions\Action;

class ApproveAction extends Action
{
    // ❌ Manca override di setUp()
    
    // ❌ Configurazione sparsa invece che centralizzata in setUp()
    public function __construct()
    {
        parent::__construct();
        
        $this->label('Approva'); // ❌ Stringa hardcoded
        $this->color('success'); // ❌ Valore hardcoded
    }
    
    // ❌ Manca tipizzazione del parametro e valore di ritorno
    public function processApproval($record)
    {
        // Implementazione...
    }
}
```

## Definizione del Nome

```php
public static function make(?string $name = null): static
{
    $name = $name ?? 'approve_document';
    
    return parent::make($name);
}
```

## Struttura dei File di Traduzione

```php
// Modules/ModuleName/lang/it/actions.php
return [
    'approve' => [
        'label' => 'Approva',
        'modal_heading' => 'Approva elemento',
        'modal_description' => 'Sei sicuro di voler approvare questo elemento? Questa azione non può essere annullata.',
        'fields' => [
            'note' => [
                'label' => 'Nota',
                'placeholder' => 'Inserisci una nota opzionale...',
                'help' => 'Questa nota verrà registrata insieme all\'approvazione',
            ],
        ],
        'notifications' => [
            'success' => 'Elemento approvato con successo',
            'error' => 'Si è verificato un errore durante l\'approvazione',
        ],
    ],
    // Altre azioni...
];
```

## Tipi di Azioni Comuni

### Azione con Form

```php
protected function setUp(): void
{
    parent::setUp();
    
    $this->label(__('modulename::actions.assign.label'))
        ->form([
            Forms\Components\Select::make('user_id')
                ->label(__('modulename::actions.assign.fields.user_id.label'))
                ->relationship('users', 'name')
                ->searchable()
                ->preload()
                ->required(),
                
            Forms\Components\DatePicker::make('due_date')
                ->label(__('modulename::actions.assign.fields.due_date.label')),
        ])
        ->action(function (array $data, $record): void {
            // Logica dell'azione
        });
}
```

### Azione con Conferma

```php
protected function setUp(): void
{
    parent::setUp();
    
    $this->label(__('modulename::actions.delete.label'))
        ->requiresConfirmation()
        ->modalHeading(__('modulename::actions.delete.modal_heading'))
        ->modalDescription(__('modulename::actions.delete.modal_description'))
        ->modalSubmitActionLabel(__('modulename::actions.delete.confirm'))
        ->modalCancelActionLabel(__('modulename::actions.delete.cancel'))
        ->color(Color::DANGER)
        ->action(function ($record): void {
            // Logica dell'azione
        });
}
```

### Azione di Bulk

```php
/**
 * @param \Illuminate\Database\Eloquent\Collection<int, \Modules\ModuleName\Models\ModelName> $records
 */
protected function setUp(): void
{
    parent::setUp();
    
    $this->label(__('modulename::actions.bulk_archive.label'))
        ->icon('heroicon-o-archive-box')
        ->action(function (Collection $records): void {
            $records->each(fn ($record) => $record->archive());
        })
        ->successNotificationTitle(__('modulename::actions.bulk_archive.success', ['count' => fn (Collection $records) => $records->count()]));
}
```

## Registrazione delle Azioni

### In una Risorsa Filament

```php
/**
 * @return array<\Filament\Tables\Actions\Action>
 */
protected function getTableActions(): array
{
    return [
        \Modules\ModuleName\Filament\Actions\ApproveAction::make(),
        \Modules\ModuleName\Filament\Actions\RejectAction::make(),
    ];
}

/**
 * @return array<\Filament\Tables\Actions\BulkAction>
 */
protected function getTableBulkActions(): array
{
    return [
        \Modules\ModuleName\Filament\Actions\BulkArchiveAction::make(),
    ];
}
```

### In una Pagina Filament

```php
/**
 * @return array<\Filament\Actions\Action>
 */
protected function getHeaderActions(): array
{
    return [
        \Modules\ModuleName\Filament\Actions\ExportAction::make(),
        \Modules\ModuleName\Filament\Actions\ImportAction::make(),
    ];
}
```

## Validazione PHPStan

Tutte le azioni devono passare la validazione PHPStan di livello 9 o superiore:

1. **Annotazioni di Tipo**:
   - Tutti i metodi devono avere tipi di ritorno espliciti
   - Tutti i parametri devono avere tipi espliciti
   - Usare generics per le Collection

2. **PHPDoc Completo**:
   - Documentare il comportamento di ogni metodo
   - Annotare i parametri e valori di ritorno con tipi corretti

3. **Evitare mixed**:
   - Utilizzare tipi specifici o union types
   - Usare mixed solo come ultima risorsa

## Test di Regressione

Dopo ogni bugfix, creare test di regressione:

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Tests\Feature\Actions;

use Tests\TestCase;
use Modules\ModuleName\Models\ModelName;
use Modules\User\Models\User;

class ApproveActionTest extends TestCase
{
    /** @test */
    public function it_approves_record_successfully(): void
    {
        // Arrange
        $user = User::factory()->create();
        $record = ModelName::factory()->create();
        
        // Act
        $this->actingAs($user)
            ->post(route('filament.resources.model-names.actions.approve', [
                'record' => $record->id,
                'data' => ['note' => 'Test note'],
            ]));
        
        // Assert
        $this->assertDatabaseHas('model_names', [
            'id' => $record->id,
            'status' => 'approved',
        ]);
    }
    
    /** @test */
    public function it_requires_permissions_to_approve(): void
    {
        // Test per verificare che l'azione richieda permessi
    }
}
```

## Documentazione delle Azioni

La documentazione delle azioni deve includere:

1. **Scopo**: Descrizione dell'azione e quando utilizzarla
2. **Parametri**: Elenco dei parametri che accetta
3. **Comportamento**: Descrizione dettagliata del comportamento
4. **Eventi**: Eventi generati dall'azione
5. **Esempi**: Esempi di utilizzo in vari contesti
6. **Restrizioni**: Eventuali limitazioni o casi particolari

## Best Practice

1. **Singola Responsabilità**:
   - Ogni azione deve avere un solo scopo chiaro
   - Estrarre la logica complessa in metodi separati

2. **Riutilizzabilità**:
   - Progettare azioni per essere riutilizzabili
   - Parametrizzare il comportamento quando possibile

3. **Sicurezza**:
   - Verificare sempre i permessi prima di eseguire azioni
   - Validare i dati di input

4. **Notifiche**:
   - Fornire feedback chiaro attraverso notifiche
   - Utilizzare titoli e messaggi dai file di traduzione

5. **Registrazione**:
   - Registrare le azioni eseguite per audit trail
   - Includere l'utente che ha eseguito l'azione

## Errori Comuni e Soluzioni

### Errore: Stringa hardcoded

**Soluzione**: Utilizzare i file di traduzione per tutte le stringhe visibili all'utente.

### Errore: Tipizzazione incompleta

**Soluzione**: Aggiungere tipi espliciti a tutti i metodi e parametri, utilizzando PHPDoc quando necessario.

### Errore: Nessun controllo dei permessi

**Soluzione**: Aggiungere verifiche dei permessi utilizzando il metodo `authorize()`.

```php
protected function setUp(): void
{
    parent::setUp();
    
    $this->authorize('approve', fn ($record) => $record);
    
    // Resto della configurazione...
}
```

### Errore: setUp() non chiamato

**Soluzione**: Assicurarsi di chiamare `parent::setUp()` all'inizio del metodo `setUp()`.

## Esempi di Implementazione

### Esempio: Azione di Approvazione con Notifica Email

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Filament\Actions;

use Filament\Actions\Action;
use Filament\Support\Colors\Color;
use Modules\ModuleName\Models\ModelName;
use Modules\ModuleName\Notifications\ApprovalNotification;

class ApproveAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();
        
        $this->label(__('modulename::actions.approve.label'))
            ->color(Color::GREEN)
            ->icon('heroicon-o-check-circle')
            ->requiresConfirmation()
            ->authorize(fn (ModelName $record) => auth()->user()->can('approve', $record))
            ->action(function (ModelName $record): void {
                $record->update(['status' => 'approved', 'approved_at' => now(), 'approved_by' => auth()->id()]);
                
                if ($record->user) {
                    $record->user->notify(new ApprovalNotification($record));
                }
            })
            ->successNotificationTitle(__('modulename::actions.approve.notifications.success'));
    }
}
```
