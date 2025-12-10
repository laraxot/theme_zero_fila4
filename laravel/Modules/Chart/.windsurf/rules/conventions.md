# Convenzioni 

## Indice
- [Filament e XotBase](#filament-e-xotbase)
- [Sistema di Traduzione](#sistema-di-traduzione)
- [Architettura Parental](#architettura-parental)
- [Sistema di Notifiche](#sistema-di-notifiche)
- [Struttura dei Moduli](#struttura-dei-moduli)
- [Localizzazione URL](#localizzazione-url)
- [Qualità del Codice](#qualità-del-codice)
- [Gestione Errori](#gestione-errori)
- [Documentazione](#documentazione)
- [Migrazioni](#migrazioni)
- [Validazione](#validazione)
- [Single Table Inheritance](#single-table-inheritance)

## Filament e XotBase

### Estensione delle Classi
- **REGOLA FONDAMENTALE**: Non estendere mai direttamente le classi di Filament
- Estendere sempre le classi XotBase corrispondenti:
  - `XotBaseResource` invece di `Resource`
  - `XotBaseWidget` invece di `Widget`
  - `XotBaseListRecords` invece di `ListRecords`
  - `XotBaseEditRecord` invece di `EditRecord`
  - `XotBaseCreateRecord` invece di `CreateRecord`

### Metodi nei Resource
- **NON definire** `navigationIcon` se la classe estende `XotBaseResource`
- **Rimuovere** `getRelations()` se restituisce array vuoto
- **Rimuovere** `getPages()` se contiene solo route standard
- `getFormSchema()` deve restituire array associativo con chiavi stringhe
- **NON utilizzare** `->label()` nei componenti form
- **NON utilizzare** `->placeholder()` nei componenti form
- **NON utilizzare** `->helperText()` nei componenti form
- **NON utilizzare** `->description()` nei componenti form

### XotBaseListRecords
- **Rimuovere** `Actions()` se restituisce solo `createAction`
- `getListTableColumns()` deve restituire array associativo con chiavi stringhe
- **NON utilizzare** `->label()` nelle colonne
- **NON utilizzare** `->searchable()` se non necessario
- **NON utilizzare** `->sortable()` se non necessario

### Esempio Corretto
```php
// CORRETTO
class DoctorResource extends XotBaseResource
{
    public static function getFormSchema(): array
    {
        return [
            'title' => Forms\Components\TextInput::make('title'),
            'content' => Forms\Components\RichEditor::make('content'),
        ];
    }
}
```

### Esempio Errato
```php
// ERRATO
class MyResource extends Resource // ❌ Estende direttamente Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-document'; // ❌ Non necessario

    public static function getRelations(): array
    {
        return []; // ❌ Metodo non necessario se vuoto
    }

    public static function getPages(): array
    {
        return [ // ❌ Metodo non necessario se standard
            'index' => Pages\ListRecords::route('/'),
            'create' => Pages\CreateRecord::route('/create'),
            'edit' => Pages\EditRecord::route('/{record}/edit'),
        ];
    }

    public static function getFormSchema(): array
    {
        return [ // ❌ Array senza chiavi
            Forms\Components\TextInput::make('title')->label('Titolo'), // ❌ Non usare ->label()
            Forms\Components\RichEditor::make('content'),
        ];
    }
}
```

## Sistema di Traduzione

### Regola Fondamentale
- **MAI utilizzare** il metodo `->label()` nei componenti Filament
- Le etichette sono gestite automaticamente dal LangServiceProvider
- Utilizzare la struttura espansa per i campi nei file di traduzione

### Struttura delle Chiavi di Traduzione
- **Campi form**: `modulo::risorsa.fields.nome_campo.label`
- **Azioni**: `modulo::risorsa.actions.nome_azione.label`
- **Passi wizard**: `modulo::risorsa.steps.nome_passo.label`
- **Altri attributi**: `.placeholder`, `.helperText`, `.description`

### Implementazione
Il LangServiceProvider si trova in:
`/var/www/html//laravel/Modules/Lang/app/Providers/LangServiceProvider.php`

L'azione principale che gestisce l'etichettatura automatica è:
`/var/www/html//laravel/Modules/Lang/app/Actions/Filament/AutoLabelAction.php`

### Esempi

#### Corretto
```php
// CORRETTO: Non specificare label, viene gestito automaticamente
TextInput::make('name')
    ->required()
    ->maxLength(255)
```

#### Errato
```php
// ERRATO: Non utilizzare ->label() nei componenti
TextInput::make('name')
    ->label('Nome')  // ❌ Non fare questo!
    ->required()
    ->maxLength(255)
```

## Architettura Parental

### Single Table Inheritance con Parental

 utilizza [tighten/parental](https://github.com/tighten/parental) per implementare il pattern Single Table Inheritance (STI), che permette di rappresentare una gerarchia di classi utilizzando una singola tabella del database.

### Implementazione Base
```php
// Modules/User/app/Models/BaseUser.php
class BaseUser extends Authenticatable implements UserContract
{
    use HasChildren; // Trait di Parental per il polimorfismo
    
    // Configurazione e metodi comuni
}

// Modules/User/app/Models/User.php
class User extends BaseUser
{
    // Implementazione specifica per User
}

// Implementazione di Doctor come tipo specializzato di User
// Questo è il modo corretto di riferirsi al "dentista" nel sistema
class Doctor extends User
{
    use HasParent;
    
    // Comportamenti specifici per Doctor
}
```

### Regole Importanti

1. **Naming Consistente**: Il dentista è chiamato genericamente "Doctor" nel sistema, non "Dentist" o "Odontoiatra" nel codice
2. **Relazioni Corrette**: Doctor è implementato come tipo di User tramite parental
3. **Registrazione**: La registrazione viene fatta tramite il widget in `/var/www/html//laravel/Modules/User/app/Filament/Widgets/RegistrationWidget.php`
4. **Form Schema**: Il form schema viene recuperato da `DoctorResource::getFormSchemaWidget()`

## Sistema di Notifiche

### RecordNotificationAction

 utilizza un sistema centralizzato di notifiche tramite `RecordNotificationAction` invece di creare classi specifiche per ogni tipo di notifica.

### Implementazione Corretta
```php
// Utilizzo corretto di RecordNotificationAction
app(RecordNotificationAction::class)->execute(
    $userId,           // ID dell'utente destinatario
    Doctor::class,     // Tipo di entità correlata
    $entityId,         // ID dell'entità correlata
    'approved',        // Tipo di notifica
    ['email', 'database'], // Canali di invio
    [                  // Dati aggiuntivi
        'workflow_id' => $workflow->id,
        'notes' => $notes
    ]
);
```

### Implementazione Errata (Da Evitare)
```php
// NON creare classi specifiche per le notifiche
class DoctorRegistrationNotification // ❌ Non fare questo!
{
    public function send($doctor, $type)
    {
        // Implementazione specifica...
    }
}
```

### Canali di Notifica Supportati
- `email`: Invia email all'utente
- `database`: Salva la notifica nel database per visualizzazione UI
- `sms`: Invia SMS (se configurato)
- `push`: Invia notifica push (se configurato)
- `telegram`: Invia messaggio Telegram (se configurato)
- `whatsapp`: Invia messaggio WhatsApp (se configurato)

## Struttura dei Moduli

### Regole Fondamentali
- Ogni modulo deve avere una struttura coerente
- I moduli devono essere indipendenti e riutilizzabili
- I moduli devono seguire le convenzioni di naming
- I moduli devono avere una documentazione completa

### Struttura Directory
```
Module/
├── app/
│   ├── Actions/
│   ├── Contracts/
│   ├── Enums/
│   ├── Filament/
│   │   ├── Resources/
│   │   ├── Widgets/
│   │   └── Pages/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Livewire/
│   │   └── Requests/
│   ├── Models/
│   ├── Notifications/
│   ├── Providers/
│   └── Services/
├── config/
├── database/
│   └── migrations/
├── lang/
│   ├── en/
│   └── it/
├── resources/
│   ├── views/
│   └── js/
└── routes/
```

### File Obbligatori
- `composer.json`
- `module.json`
- `README.md`
- `CHANGELOG.md`
- `LICENSE.md`

## Localizzazione URL

### Regole Fondamentali
- Utilizzare `mcamara/laravel-localization`
- URL con prefisso lingua: `/{locale}/{sezione}/{risorsa}`
- Convenzione chiavi: `modulo::risorsa.fields.campo.label`

### Implementazione
```php
// routes/web.php
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::get('/', 'HomeController@index');
    Route::get('{sezione}/{risorsa}', 'ResourceController@show');
});
```

## Qualità del Codice

### Regole Fondamentali
- Seguire PSR-12
- Utilizzare PHPStan livello 8
- Utilizzare PHP_CodeSniffer
- Utilizzare PHPUnit per i test
- Utilizzare Laravel Pint per la formattazione

### Best Practices
- Utilizzare type hints
- Utilizzare return types
- Utilizzare strict types
- Utilizzare docblocks
- Utilizzare constants
- Utilizzare enums
- Utilizzare interfaces
- Utilizzare traits
- Utilizzare abstract classes
- Utilizzare final classes

## Gestione Errori

### Regole Fondamentali
- Utilizzare try-catch solo quando necessario
- Utilizzare custom exceptions
- Utilizzare validation exceptions
- Utilizzare authorization exceptions
- Utilizzare not found exceptions

### Implementazione
```php
try {
    // Codice che può generare errori
} catch (ValidationException $e) {
    return back()->withErrors($e->errors());
} catch (AuthorizationException $e) {
    return back()->withErrors(['error' => $e->getMessage()]);
} catch (ModelNotFoundException $e) {
    return back()->withErrors(['error' => 'Record non trovato']);
} catch (Exception $e) {
    return back()->withErrors(['error' => 'Errore generico']);
}
```

## Documentazione

### Regole Fondamentali
- Ogni modulo deve avere un README.md
- Ogni classe deve avere docblocks
- Ogni metodo deve avere docblocks
- Ogni proprietà deve avere docblocks
- Ogni costante deve avere docblocks
- Ogni enum deve avere docblocks
- Ogni interface deve avere docblocks
- Ogni trait deve avere docblocks
- Ogni abstract class deve avere docblocks
- Ogni final class deve avere docblocks

### Struttura README.md
```markdown

# Nome Modulo

## Descrizione
Breve descrizione del modulo

## Installazione
Istruzioni di installazione

## Configurazione
Istruzioni di configurazione

## Utilizzo
Esempi di utilizzo

## API
Documentazione API

## Contribuire
Istruzioni per contribuire

## Licenza
Informazioni sulla licenza
```

## Migrazioni

### Regole Fondamentali
- Estendere sempre `XotBaseMigration`
- Non implementare il metodo `down`
- Utilizzare `tableUpdate` per modifiche
- Controllare esistenza colonne
- Aggiungere colonna `type` solo nella migration base
- Aggiungere tutti i campi nella tabella base

### Implementazione
```php
return new class extends XotBaseMigration
{
    public function up()
    {
        $this->tableUpdate('users', function (Blueprint $table) {
            if (!$table->hasColumn('type')) {
                $table->string('type')->nullable();
            }
        });
    }
};
```

## Validazione

### Regole Fondamentali
- Utilizzare form requests
- Utilizzare validation rules
- Utilizzare validation messages
- Utilizzare validation attributes
- Utilizzare validation custom rules

### Implementazione
```php
class CreateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'L\'email è obbligatoria',
            'email.email' => 'L\'email non è valida',
            'email.unique' => 'L\'email è già in uso',
            'password.required' => 'La password è obbligatoria',
            'password.min' => 'La password deve essere di almeno 8 caratteri',
        ];
    }
}
```

## Single Table Inheritance

### Regole Fondamentali
- Utilizzare Parental per STI
- Aggiungere colonna `type` nella migration base
- Aggiungere tutti i campi nella tabella base
- Utilizzare trait `HasParent` nei modelli figli
- Utilizzare trait `HasChildren` nel modello base

### Implementazione
```php
// Migration
return new class extends XotBaseMigration
{
    public function up()
    {
        $this->tableUpdate('users', function (Blueprint $table) {
            if (!$table->hasColumn('type')) {
                $table->string('type')->nullable();
            }
        });
    }
};

// Model Base
class User extends Authenticatable
{
    use HasChildren;
}

// Model Figlio
class Doctor extends User
{
    use HasParent;
}
```
