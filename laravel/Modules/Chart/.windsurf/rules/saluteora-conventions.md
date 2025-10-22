# Convenzioni 

## Indice
- [Filament e XotBase](#filament-e-xotbase)
- [Sistema di Traduzione](#sistema-di-traduzione)
- [Architettura Parental](#architettura-parental)
- [Sistema di Notifiche](#sistema-di-notifiche)
- [Struttura dei Moduli](#struttura-dei-moduli)
- [Localizzazione URL](#localizzazione-url)
- [Qualità del Codice](#qualità-del-codice)

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

### XotBaseListRecords
- **Rimuovere** `Actions()` se restituisce solo `createAction`
- `getListTableColumns()` deve restituire array associativo con chiavi stringhe

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

### Moduli Principali
- **Core**: Gestione base del sistema
- **Patient**: Gestione pazienti e ISEE
- **Dental**: Gestione visite e trattamenti
- **Reporting**: Reportistica e statistiche
- **UI**: Componenti interfaccia utente
- **User**: Gestione utenti e permessi
- **Tenant**: Gestione multi-tenant
- **Lang**: Gestione traduzioni
- **Notify**: Sistema di notifiche
- **Xot**: Classi base e utilities

### Organizzazione Standard dei Moduli
```
Modules/ModuleName/
├── app/
│   ├── Actions/         # QueueableAction e altre azioni
│   ├── Enums/           # Enumerazioni PHP 8.1+
│   ├── Filament/
│   │   ├── Resources/   # Resource Filament
│   │   └── Widgets/     # Widget Filament
│   ├── Models/          # Modelli Eloquent
│   └── Providers/       # Service Provider
├── config/              # Configurazioni
├── database/
│   ├── migrations/      # Migrazioni
│   └── seeders/         # Seeder
├── docs/                # Documentazione specifica del modulo
├── resources/
│   ├── lang/            # File di traduzione
│   └── views/           # Template Blade
└── routes/              # Definizioni delle rotte
```

## Localizzazione URL

### Regola Fondamentale

Tutti gli URL devono includere il prefisso della lingua come primo segmento del percorso:

```
/{locale}/{sezione}/{risorsa}
```

### Implementazione

#### Recuperare la Locale Corrente

Usare sempre la funzione `app()->getLocale()` per ottenere la lingua corrente:

```php
$locale = app()->getLocale();
```

Non utilizzare valori hardcoded come 'it' o 'en'.

#### Generare Link Localizzati

Quando si generano link, includere sempre la locale:

```php
// CORRETTO
<a href="{{ url('/' . app()->getLocale() . '/pages/' . $page->slug) }}">{{ $page->title }}</a>

// ERRATO
<a href="{{ url('/pages/' . $page->slug) }}">{{ $page->title }}</a>
```

## Console Commands

### Signature dei comandi

**REGOLA FONDAMENTALE**: Tutti i console commands all'interno di un modulo devono avere come signature il nome del modulo in minuscolo seguito da `:` e il nome del comando in kebab-case.

#### Formato corretto
```
{module-name}:{command-name}
```

#### Esempi

##### Corretto
- `xot:mcp-server` per `McpServerCommand` nel modulo Xot
- `patient:register-doctor` per `RegisterDoctorCommand` nel modulo Patient
- `lang:generate-translations` per `GenerateTranslationsCommand` nel modulo Lang

##### Errato
- `mcp-server` per `McpServerCommand` nel modulo Xot ❌
- `registerDoctor` per `RegisterDoctorCommand` nel modulo Patient ❌
- `generate-translations` per `GenerateTranslationsCommand` nel modulo Lang (senza prefisso del modulo) ❌

### Namespace dei comandi

I comandi devono essere nel namespace corretto:

```php
namespace Modules\{ModuleName}\App\Console\Commands;
```

### Registrazione dei comandi

I comandi devono essere registrati nel service provider del modulo:

```php
protected $commands = [
    Commands\RegisterDoctorCommand::class
];
```

## Qualità del Codice

### PHPStan

Per mantenere alta la qualità del codice, utilizziamo PHPStan per l'analisi statica.

#### Configurazione per Moduli

Ogni modulo Laravel deve avere un file `phpstan.neon.dist` configurato correttamente:

```neon
includes:
    - phpstan-baseline.neon

parameters:
    level: 5
    paths:
        - app

    excludePaths:
        - vendor
        - Tests
        - rector.php

    ignoreErrors:
        - '#Unsafe usage of new static#'
        - '#Access to an undefined property#'
```

### Classi Base Personalizzate

Il progetto utilizza classi base personalizzate al posto delle classi standard di Laravel:

- Utilizziamo `XotBaseRouteServiceProvider` invece di `Illuminate\Foundation\Support\Providers\RouteServiceProvider`
- Utilizziamo `XotBaseResource` invece di `Filament\Resources\Resource`
- Utilizziamo `BaseModel` di ciascun modulo (`Modules\\<Module>\\Models\\BaseModel`) invece di `Illuminate\\Database\\Eloquent\\Model`

### Convenzioni di Codice

#### Regole Generali

1. **Tipi PHP**: Usare sempre type hints e return types
2. **Nullability**: Usare tipi nullable (`?string`) quando appropriato
3. **Nomi Variabili**: camelCase per variabili e metodi, PascalCase per classi
4. **Metodi**: Nome verbo + sostantivo che descrive l'azione
5. **Commenti**: PHPDoc per tutti i metodi pubblici

#### ServiceProvider `$name` Property

Nelle classi che estendono `XotBaseServiceProvider`:
- Dichiarare `public string $name = '<ModuleName>';` immediatamente dopo la dichiarazione della classe.
- Non usare docblock sopra questa proprietà.
- Mantenere visibilità `public` per compatibilità con la classe base.
