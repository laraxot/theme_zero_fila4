# Regole Azioni Filament

## Indice
- [Regole Fondamentali](#regole-fondamentali)
- [Struttura](#struttura)
- [Best Practices](#best-practices)
- [Checklist](#checklist)

## Regole Fondamentali

### Azioni
- **REGOLA FONDAMENTALE**: Ogni azione deve essere una classe dedicata
- Estendere `Filament\Actions\Action`
- Implementare `handle()`
- Documentare l'azione

### Esempio Corretto
```php
// CORRETTO
class ApproveDoctorAction extends Action
{
    public function handle(): void
    {
        $this->record->approve();
        
        Notification::make()
            ->title('Dottore approvato')
            ->success()
            ->send();
    }
}

// Uso
Action::make('approve')
    ->action(fn () => app(ApproveDoctorAction::class)->handle())
    ->requiresConfirmation();
```

### Esempio Errato
```php
// ERRATO
Action::make('approve')
    ->action(function () { // ❌ Non usare closure
        $this->record->approve();
        Notification::make()->success();
    });
```

## Struttura

### Regole Fondamentali
1. **Namespace**
   - `App\Filament\Actions`
   - `Modules\{Module}\Filament\Actions`

2. **Nome Classe**
   - Suffisso `Action`
   - Nome descrittivo
   - PascalCase

3. **Metodi**
   - `handle()`: Logica principale
   - `authorize()`: Autorizzazioni
   - `getConfirmationMessage()`: Messaggi
   - `getSuccessMessage()`: Messaggi
   - `getFailureMessage()`: Messaggi

### Esempi

#### Azione Base
```php
// CORRETTO
class ApproveDoctorAction extends Action
{
    public function handle(): void
    {
        $this->record->approve();
        
        Notification::make()
            ->title('Dottore approvato')
            ->success()
            ->send();
    }
}

// ERRATO
Action::make('approve')
    ->action(function () { // ❌ No closure
        $this->record->approve();
    });
```

#### Azione con Autorizzazione
```php
// CORRETTO
class ApproveDoctorAction extends Action
{
    public function authorize(): bool
    {
        return auth()->user()->can('approve', $this->record);
    }

    public function handle(): void
    {
        $this->record->approve();
        
        Notification::make()
            ->title('Dottore approvato')
            ->success()
            ->send();
    }
}

// ERRATO
Action::make('approve')
    ->action(function () { // ❌ No closure
        if (!auth()->user()->can('approve', $this->record)) { // ❌ No check diretto
            return;
        }
        $this->record->approve();
    });
```

#### Azione con Messaggi
```php
// CORRETTO
class ApproveDoctorAction extends Action
{
    public function getConfirmationMessage(): string
    {
        return 'Sei sicuro di voler approvare questo dottore?';
    }

    public function getSuccessMessage(): string
    {
        return 'Dottore approvato con successo';
    }

    public function getFailureMessage(): string
    {
        return 'Impossibile approvare il dottore';
    }

    public function handle(): void
    {
        $this->record->approve();
        
        Notification::make()
            ->title('Dottore approvato')
            ->success()
            ->send();
    }
}

// ERRATO
Action::make('approve')
    ->action(function () { // ❌ No closure
        $this->record->approve();
    })
    ->requiresConfirmation() // ❌ No messaggi inline
    ->modalHeading('Approve')
    ->modalDescription('Are you sure?');
```

## Best Practices

### Regole Fondamentali
1. **Azioni**
   - Classe dedicata
   - Metodo handle()
   - Documentazione
   - Test unitari

2. **Autorizzazioni**
   - Metodo authorize()
   - Policy dedicate
   - Test autorizzazioni
   - Log accessi

3. **Messaggi**
   - Metodi dedicati
   - Traduzioni
   - Test messaggi
   - Log errori

4. **Notifiche**
   - RecordNotificationAction
   - Canali appropriati
   - Test notifiche
   - Log invii

5. **Test**
   - Test unitari
   - Test integrazione
   - Test UI
   - Test performance

### Esempi

#### Azione Completa
```php
// CORRETTO
class ApproveDoctorAction extends Action
{
    public function authorize(): bool
    {
        return auth()->user()->can('approve', $this->record);
    }

    public function getConfirmationMessage(): string
    {
        return __('filament.actions.approve.confirmation');
    }

    public function getSuccessMessage(): string
    {
        return __('filament.actions.approve.success');
    }

    public function getFailureMessage(): string
    {
        return __('filament.actions.approve.failure');
    }

    public function handle(): void
    {
        $this->record->approve();
        
        app(RecordNotificationAction::class)->execute(
            $this->record->user_id,
            Doctor::class,
            $this->record->id,
            'approved',
            ['email', 'database'],
            [
                'workflow_id' => $this->record->workflow_id,
                'notes' => $this->data['notes'] ?? null,
            ]
        );
        
        Notification::make()
            ->title(__('filament.actions.approve.success'))
            ->success()
            ->send();
    }
}

// ERRATO
Action::make('approve')
    ->action(function () { // ❌ No closure
        if (!auth()->user()->can('approve', $this->record)) { // ❌ No check diretto
            return;
        }
        
        $this->record->approve(); // ❌ No notifiche
        
        Notification::make() // ❌ No traduzioni
            ->title('Approved')
            ->success()
            ->send();
    })
    ->requiresConfirmation() // ❌ No messaggi dedicati
    ->modalHeading('Approve')
    ->modalDescription('Are you sure?');
```

## Checklist

### Per Ogni Azione
- [ ] Classe dedicata
- [ ] Metodo handle()
- [ ] Documentata
- [ ] Testata

### Per Autorizzazioni
- [ ] Metodo authorize()
- [ ] Policy dedicate
- [ ] Testate
- [ ] Loggate

### Per Messaggi
- [ ] Metodi dedicati
- [ ] Tradotti
- [ ] Testati
- [ ] Loggati

### Per Notifiche
- [ ] RecordNotificationAction
- [ ] Canali appropriati
- [ ] Testate
- [ ] Loggate

### Per Test
- [ ] Unitari
- [ ] Integrazione
- [ ] UI
- [ ] Performance
- [ ] Copertura 
