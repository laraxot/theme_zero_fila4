# Regole per il Sistema di Traduzione

## Principi Fondamentali

Il sistema di traduzione deve seguire una struttura coerente e standardizzata per garantire manutenibilità, scalabilità e facilità d'uso.

## Regole per le Chiavi di Traduzione

### 1. Struttura Gerarchica delle Chiavi

Le chiavi di traduzione devono seguire una struttura gerarchica che riflette la struttura dell'applicazione:

```
modulo::risorsa.fields.campo.label
```

Esempi:
- `patient::doctor-resource.fields.first_name.label`
- `user::auth.login.button.label`
- `dental::appointment.fields.date.label`

### 2. MAI Utilizzare Testo Diretto

**NO**:
```php
__('Accedi')
__('Registrati')
__('Esci')
```

**SÌ**:
```php
__('user::auth.login.button.label')
__('user::auth.register.button.label')
__('user::auth.logout.button.label')
```

### 3. Organizzazione dei File di Traduzione

- Ogni modulo deve avere la propria directory di traduzioni
- I file di traduzione devono essere organizzati per risorsa
- Utilizzare una struttura gerarchica nei file di traduzione

```php
// resources/lang/it/patient/doctor-resource.php
return [
    'fields' => [
        'first_name' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome',
            'help' => 'Inserisci il nome del dottore',
        ],
        'last_name' => [
            'label' => 'Cognome',
            'placeholder' => 'Inserisci il cognome',
            'help' => 'Inserisci il cognome del dottore',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Dottore',
            'success' => 'Dottore creato con successo',
            'error' => 'Errore durante la creazione del dottore',
        ],
    ],
];
```

## Regole per Filament

### 1. MAI Utilizzare il Metodo `->label()`

**NO**:
```php
Forms\Components\TextInput::make('first_name')
    ->label('Nome')
```

**SÌ**:
```php
Forms\Components\TextInput::make('first_name')
    // Il LangServiceProvider gestirà automaticamente la traduzione
```

### 2. Convenzione per le Etichette dei Campi

Il LangServiceProvider cercherà automaticamente le traduzioni seguendo questa convenzione:

```
{modulo}::{risorsa}.fields.{campo}.label
```

Esempio:
- Campo: `first_name` in DoctorResource
- Chiave di traduzione: `patient::doctor-resource.fields.first_name.label`

### 3. Convenzione per i Placeholder

```
{modulo}::{risorsa}.fields.{campo}.placeholder
```

Esempio:
- Campo: `first_name` in DoctorResource
- Chiave di traduzione: `patient::doctor-resource.fields.first_name.placeholder`

### 4. Convenzione per i Messaggi di Aiuto

```
{modulo}::{risorsa}.fields.{campo}.help
```

Esempio:
- Campo: `first_name` in DoctorResource
- Chiave di traduzione: `patient::doctor-resource.fields.first_name.help`

## Regole per le Notifiche

### 1. Struttura delle Chiavi per le Notifiche

```
{modulo}::notifications.{tipo_notifica}.{elemento}
```

Esempio:
```php
return [
    'doctor_registration_pending' => [
        'subject' => 'Registrazione in attesa',
        'greeting' => 'Ciao :name,',
        'line1' => 'La tua registrazione è in attesa di approvazione.',
        'action' => 'Visualizza stato',
        'line2' => 'Ti informeremo quando la tua registrazione sarà approvata.',
    ],
];
```

### 2. Utilizzo nelle Notifiche

```php
public function toMail($notifiable): MailMessage
{
    return (new MailMessage)
        ->subject(__('patient::notifications.doctor_registration_pending.subject'))
        ->greeting(__('patient::notifications.doctor_registration_pending.greeting', ['name' => $notifiable->first_name]))
        ->line(__('patient::notifications.doctor_registration_pending.line1'))
        ->action(__('patient::notifications.doctor_registration_pending.action'), $url)
        ->line(__('patient::notifications.doctor_registration_pending.line2'));
}
```

## Regole per le Enum

### 1. Utilizzare Metodi Helper per le Etichette

```php
enum DoctorStatus: string
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    
    public function getLabel(): string
    {
        return match($this) {
            self::PENDING => __('patient::enums.doctor_status.pending'),
            self::APPROVED => __('patient::enums.doctor_status.approved'),
            self::REJECTED => __('patient::enums.doctor_status.rejected'),
        };
    }
}
```

### 2. Struttura delle Chiavi per le Enum

```
{modulo}::enums.{nome_enum}.{caso}
```

Esempio:
```php
// resources/lang/it/patient/enums.php
return [
    'doctor_status' => [
        'pending' => 'In attesa',
        'approved' => 'Approvato',
        'rejected' => 'Rifiutato',
    ],
];
```

## Motivazioni

### Perché Utilizzare Chiavi di Traduzione Standardizzate

1. **Manutenibilità**: Facilita l'aggiornamento e la modifica delle traduzioni
2. **Internazionalizzazione**: Semplifica l'aggiunta di nuove lingue
3. **Coerenza**: Garantisce un'esperienza utente coerente in tutta l'applicazione
4. **Automazione**: Consente l'estrazione automatica delle chiavi di traduzione

### Perché NON Utilizzare il Metodo `->label()`

1. **Centralizzazione**: Il LangServiceProvider gestisce automaticamente le traduzioni
2. **Coerenza**: Garantisce un'approccio coerente in tutta l'applicazione
3. **Manutenibilità**: Facilita l'aggiornamento e la modifica delle traduzioni
4. **Automazione**: Consente l'estrazione automatica delle chiavi di traduzione
