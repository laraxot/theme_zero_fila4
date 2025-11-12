---
trigger: manual
description:
globs:
---
# Regole FullCalendar Widget per <nome progetto>

## Principi Fondamentali

### Estensione delle Classi Base
- **SEMPRE** estendere direttamente `Saade\FilamentFullCalendar\Widgets\FullCalendarWidget`
- **MAI** utilizzare `Modules\Xot\Filament\Widgets\XotBaseFullCalendarWidget` (non esiste nel modulo Xot)
- Utilizzare il trait `Modules\<nome progetto>\Traits\HasFullCalendarConfig` per configurazioni comuni

### Architettura Multi-Tenant con Parental STI
- **Single Table Inheritance**: Utilizzo di `tightenco/parental` per tipi utente
- **3 tipi di utente**: Patient, Doctor, Admin (non ruoli ma tipi)
- **Tenancy di Filament**: Utilizzare `Filament::getTenant()` per studio corrente
- **Isolamento dati**: Ogni widget filtra automaticamente per permessi utente
- **Sicurezza**: Policy e controlli di accesso sempre implementati

### Namespace e Struttura
- Widget calendar: `Modules\<nome progetto>\Filament\Widgets\`
- Modelli: `Modules\<nome progetto>\Models\`
- Enum: `Modules\<nome progetto>\Enums\`
- Trait: `Modules\<nome progetto>\Traits\`
- Middleware: `Modules\<nome progetto>\Http\Middleware\`

## Implementazione Widget

### Proprietà Obbligatorie
```php
class MyCalendarWidget extends FullCalendarWidget
{
    use HasFullCalendarConfig;

    // Modello associato SEMPRE richiesto
    public Model|string|null $model = Appointment::class;

    // Ordinamento per dashboard
    protected static ?int $sort = 1;

    // Altezza massima consigliata
    protected static ?string $maxHeight = '600px';
}
```

### Metodi Richiesti

#### canView()
- **SEMPRE** implementare controllo accesso basato su tipo utente
- **SEMPRE** verificare tenancy per dottori
- **SEMPRE** utilizzare enum UserType per confronti

#### fetchEvents()
- **SEMPRE** utilizzare eager loading con `with()`
- **SEMPRE** filtrare per range di date: `whereBetween('start_time', [$fetchInfo['start'], $fetchInfo['end']])`
- **SEMPRE** restituire array di `EventData` objects
- **SEMPRE** implementare caching con `cache()->remember()`
- **MAI** restituire più di 100 eventi per chiamata

#### getFormSchema()
- **SEMPRE** restituire array associativo con chiavi string
- **SEMPRE** raggruppare campi in Section con chiavi descrittive
- **MAI** utilizzare `->label()` (gestito da LangServiceProvider)

#### config()
- **SEMPRE** utilizzare il trait `HasFullCalendarConfig`
- **SEMPRE** chiamare `parent::config()` se sovrascritto
- **SEMPRE** includere configurazione localizzata italiana

### Gestione Eventi

#### EventData Structure
```php
EventData::make()
    ->id($appointment->id)                    // SEMPRE richiesto
    ->title($this->formatEventTitle($appointment)) // SEMPRE formattato con trait
    ->start($appointment->start_time)         // SEMPRE datetime
    ->end($appointment->end_time)             // SEMPRE datetime
    ->backgroundColor($this->getAppointmentStatusColor($appointment->status->value))
    ->borderColor($this->getAppointmentTypeColor($appointment->type->value))
    ->textColor('#ffffff')                    // Contrasto leggibile
    ->extendedProps([                         // Dati aggiuntivi
        'patient_name' => $appointment->patient?->full_name,
        'doctor_name' => $appointment->doctor?->full_name,
        'status' => $appointment->status->value,
        'type' => $appointment->type->value,
        'tooltip' => $this->formatTooltip($appointment),
        'can_edit' => $this->canEditAppointment($appointment),
    ])
```

#### Colori Standardizzati
- Utilizzare metodi del trait: `getAppointmentTypeColor()`, `getAppointmentStatusColor()`
- Schema colori da `config('fullcalendar.colors')`
- Stati appuntamenti: blu (scheduled), verde (confirmed), rosso (cancelled)
- Priorità emergenze: rosso intenso (critical), arancione (high), verde (low)
- **MAI** hardcodare colori nei widget

## Widget Specifici Implementati

### PatientCalendarWidget
- **Estende**: `FullCalendarWidget`
- **Trait**: `HasFullCalendarConfig`
- **Vista**: `timeGridWeek`
- **Accesso**: `UserType::PATIENT`
- **Filtro**: `where('patient_id', auth()->id())`
- **Funzionalità**: Solo visualizzazione (sola lettura)
- **Configurazione**: `config('fullcalendar.widgets.patient')`

### DoctorCalendarWidget
- **Estende**: `FullCalendarWidget`
- **Trait**: `HasFullCalendarConfig`
- **Vista**: `timeGridWeek`
- **Accesso**: `UserType::DOCTOR` + tenancy
- **Filtro**: `where('studio_id', Filament::getTenant()->id)`
- **Funzionalità**: CRUD completo, drag&drop, resize
- **Configurazione**: `config('fullcalendar.widgets.doctor')`

### AdminCalendarWidget
- **Estende**: `FullCalendarWidget`
- **Trait**: `HasFullCalendarConfig`
- **Vista**: `dayGridMonth`
- **Accesso**: `UserType::ADMIN`
- **Filtro**: Tutti gli appuntamenti (opzionale per studio)
- **Funzionalità**: Vista globale, filtri avanzati
- **Configurazione**: `config('fullcalendar.widgets.admin')`

## Configurazioni

### File di Configurazione
- Configurazione centralizzata: `config/fullcalendar.php`
- Configurazioni widget-specific: `config('fullcalendar.widgets.{type}')`
- Colori standardizzati: `config('fullcalendar.colors.{category}')`
- Performance settings: `config('fullcalendar.performance')`

### Localizzazione Italiana
```php
'locale' => 'it',
'timezone' => 'Europe/Rome',
'firstDay' => 1, // Lunedì
'buttonText' => [
    'today' => 'Oggi',
    'month' => 'Mese',
    'week' => 'Settimana',
    'day' => 'Giorno',
],
'eventTimeFormat' => [
    'hour' => '2-digit',
    'minute' => '2-digit',
    'hour12' => false,
],
```

### Business Hours Sanitarie
```php
'businessHours' => [
    'daysOfWeek' => [1, 2, 3, 4, 5, 6], // Lun-Sab
    'startTime' => '08:00',
    'endTime' => '19:00',
],
'eventConstraint' => 'businessHours',
'selectConstraint' => 'businessHours',
'slotDuration' => '00:30:00', // Slot da 30 minuti
```

## Sicurezza e Controlli Accesso

### Middleware EnsureUserType
- **SEMPRE** utilizzare per proteggere panel
- **SEMPRE** verificare tipo utente con enum
- **SEMPRE** loggare accessi se configurato
- Sintassi: `EnsureUserType::class.':patient'`

### Policy AppointmentPolicy
- **SEMPRE** implementare controlli granulari
- **SEMPRE** utilizzare match expression con UserType
- **SEMPRE** verificare tenancy per dottori
- **SEMPRE** filtrare dati sensibili per pazienti

### Privacy e Audit
- Mascheramento nomi pazienti se configurato
- Audit trail per modifiche eventi
- Logging delle azioni utente
- Crittografia dati sensibili

## Performance e Ottimizzazioni

### Caching
- **SEMPRE** utilizzare caching per eventi: `cache()->remember()`
- **SEMPRE** generare chiave cache con `getCacheKey()` del trait
- **SEMPRE** impostare TTL appropriato (300 secondi default)
- **SEMPRE** invalidare cache su modifiche

### Query Optimization
- **SEMPRE** utilizzare eager loading: `with(['patient', 'doctor', 'studio'])`
- **SEMPRE** limitare query con `limit()` (100 eventi max)
- **SEMPRE** utilizzare `lazy_fetching` per grandi dataset
- **SEMPRE** filtrare per range di date

### Responsive Design
- **SEMPRE** utilizzare configurazioni responsive
- **SEMPRE** adattare vista per mobile (`listWeek`)
- **SEMPRE** ridurre altezza per tablet
- **SEMPRE** testare su dispositivi diversi

## Enum e Modelli

### AppointmentType Enum
- **SEMPRE** implementare `HasLabel`, `HasIcon`, `HasColor`
- **SEMPRE** utilizzare colori standardizzati
- **SEMPRE** fornire durate per tipi
- Tipi: CONSULTATION, CLEANING, TREATMENT, EMERGENCY, FOLLOWUP, SURGERY, ORTHODONTICS, PREVENTION

### AppointmentStatus Enum
- **SEMPRE** implementare `HasLabel`, `HasColor`
- **SEMPRE** definire transizioni di stato
- **SEMPRE** implementare metodi `isActive()`, `isFinal()`
- Stati: SCHEDULED, CONFIRMED, IN_PROGRESS, COMPLETED, CANCELLED, NO_SHOW, RESCHEDULED, PENDING

### Studio Model (Tenant)
- **SEMPRE** implementare `HasName` per Filament tenancy
- **SEMPRE** definire relazioni con doctors e appointments
- **SEMPRE** implementare metodi business (getColor, isActive)

## Errori Comuni da Evitare

### ❌ Errori di Implementazione
- Estendere classi Xot invece di Filament direttamente
- Non utilizzare trait HasFullCalendarConfig
- Non implementare controlli di accesso canView()
- Hardcodare colori nei widget
- Utilizzare `->label()` nei form components
- Non utilizzare enum per confronti tipo utente

### ❌ Errori di Performance
- Caricare troppi eventi contemporaneamente (>100)
- Non utilizzare caching
- Query N+1 nelle relazioni
- Non limitare range di date
- Non utilizzare eager loading

### ❌ Errori di Sicurezza
- Non verificare tenancy per dottori
- Esporre dati sensibili senza autorizzazione
- Non implementare middleware di protezione
- Non loggare azioni per audit trail
- Non mascherare nomi pazienti quando necessario

### ❌ Errori di Configurazione
- Non utilizzare configurazione centralizzata
- Non localizzare in italiano
- Non rispettare business hours sanitarie
- Non implementare responsive design
- Non configurare tooltip e accessibilità

## Testing

### Test Obbligatori
```php
// Test caricamento eventi
public function test_can_fetch_events_for_date_range()

// Test permessi per tipo utente
public function test_patient_can_view_only_own_appointments()
public function test_doctor_can_view_studio_appointments()
public function test_admin_can_view_all_appointments()

// Test tenancy
public function test_doctor_cannot_view_other_studio_appointments()

// Test performance
public function test_events_are_limited_to_reasonable_number()

// Test sicurezza
public function test_sensitive_data_is_protected()
public function test_middleware_blocks_wrong_user_type()
```

## Filosofia e Zen

### Principi Guida
- **Semplicità**: Widget facili da comprendere e mantenere
- **Coerenza**: Schema colori e comportamenti uniformi tra widget
- **Accessibilità**: Supporto screen reader e navigazione keyboard
- **Performance**: Caricamento rapido e fluido con caching intelligente
- **Sicurezza**: Protezione dati sensibili sempre prioritaria

### Approccio Sanitario
- Priorità alla sicurezza dei dati pazienti
- Interfaccia intuitiva per operatori sanitari
- Gestione emergenze con priorità visive chiare (🚨)
- Workflow ottimizzati per ambiente ospedaliero multi-studio
- Conformità normative settore sanitario
- Audit trail completo per responsabilità legali

### Architettura Multi-Tenant
- Isolamento completo dati tra studi
- Tenancy trasparente per dottori
- Scalabilità orizzontale per nuovi studi
- Performance ottimizzate per tenant
- Backup e restore per tenant specifici

Ricorda: ogni widget calendar deve essere progettato pensando all'operatore sanitario che lo utilizzerà in situazioni di stress e urgenza. La chiarezza, l'immediatezza e la sicurezza sono fondamentali per un sistema sanitario affidabile.

## Errori comuni nella configurazione FullCalendarWidget

### 1. Errori di sintassi array
- **Errore tipico:** chiudere un array con `])` invece che solo `]`, oppure lasciare una virgola in eccesso.
- **Corretto:**
```php
'businessHours' => [
    'startTime' => '08:00',
    'endTime' => '19:00',
    'daysOfWeek' => [1, 2, 3, 4, 5],
],
```

### 2. Errori di import Action
- **Errore tipico:** `use Filament\Pages\Actions\Action;` (classe non trovata)
- **Corretto:** `use Filament\Actions\Action;`

### 3. Errori di configurazione FullCalendar
- **Errore tipico:** usare `->config([...])` su `FullCalendarWidget::make()`
- **Corretto:** override del metodo `config()` in un widget custom.

### Motivazione filosofica, politica, zen
- Un solo punto di verità: sintassi e import corretti, configurazione centralizzata
- DRY, KISS, serenità del codice: niente hack, niente override strani, tutto documentato e coerente
- Politica: ogni modulo è autonomo, ma rispetta la centralizzazione delle entità e dei componenti
