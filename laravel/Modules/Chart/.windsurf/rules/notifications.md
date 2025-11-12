# Regole Notifiche

## Indice
- [Regole Fondamentali](#regole-fondamentali)
- [RecordNotificationAction](#recordnotificationaction)
- [Best Practices](#best-practices)
- [Checklist](#checklist)

## Regole Fondamentali

### RecordNotificationAction
- **REGOLA FONDAMENTALE**: Utilizzare `RecordNotificationAction` per tutte le notifiche
- Non creare classi specifiche per le notifiche
- Utilizzare i canali supportati
- Documentare le notifiche

### Esempio Corretto
```php
// CORRETTO
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

### Esempio Errato
```php
// ERRATO
class DoctorRegistrationNotification // ❌ Non creare classi specifiche
{
    public function send($doctor, $type)
    {
        // Implementazione specifica...
    }
}
```

## RecordNotificationAction

### Regole Fondamentali
1. **Parametri**
   - `$userId`: ID dell'utente destinatario
   - `$entityType`: Tipo di entità correlata
   - `$entityId`: ID dell'entità correlata
   - `$type`: Tipo di notifica
   - `$channels`: Canali di invio
   - `$data`: Dati aggiuntivi

2. **Canali**
   - `email`: Invia email
   - `database`: Salva nel database
   - `sms`: Invia SMS
   - `push`: Invia notifica push
   - `telegram`: Invia messaggio Telegram
   - `whatsapp`: Invia messaggio WhatsApp

3. **Tipi**
   - `approved`: Approvazione
   - `rejected`: Rifiuto
   - `created`: Creazione
   - `updated`: Aggiornamento
   - `deleted`: Eliminazione
   - `custom`: Personalizzato

### Esempi

#### Notifica Email
```php
// CORRETTO
app(RecordNotificationAction::class)->execute(
    $userId,
    Doctor::class,
    $entityId,
    'approved',
    ['email'],
    [
        'subject' => 'Approvazione Registrazione',
        'body' => 'La tua registrazione è stata approvata',
    ]
);

// ERRATO
Mail::to($user)->send(new DoctorRegistrationMail($doctor)); // ❌ Non usare direttamente Mail
```

#### Notifica Database
```php
// CORRETTO
app(RecordNotificationAction::class)->execute(
    $userId,
    Doctor::class,
    $entityId,
    'approved',
    ['database'],
    [
        'title' => 'Approvazione Registrazione',
        'message' => 'La tua registrazione è stata approvata',
    ]
);

// ERRATO
$user->notifications()->create([ // ❌ Non creare direttamente
    'type' => 'App\\Notifications\\DoctorRegistration',
    'data' => ['message' => 'Approved'],
]);
```

#### Notifica Multi Canale
```php
// CORRETTO
app(RecordNotificationAction::class)->execute(
    $userId,
    Doctor::class,
    $entityId,
    'approved',
    ['email', 'database', 'sms'],
    [
        'subject' => 'Approvazione Registrazione',
        'body' => 'La tua registrazione è stata approvata',
        'sms' => 'Registrazione approvata',
    ]
);

// ERRATO
Mail::to($user)->send(new DoctorRegistrationMail($doctor)); // ❌ Non usare direttamente
$user->notifications()->create([...]); // ❌ Non creare direttamente
Sms::send($user->phone, 'Approved'); // ❌ Non usare direttamente
```

## Best Practices

### Regole Fondamentali
1. **Notifiche**
   - Utilizzare RecordNotificationAction
   - Non creare classi specifiche
   - Utilizzare canali supportati
   - Documentare notifiche

2. **Canali**
   - Utilizzare canali appropriati
   - Configurare canali correttamente
   - Testare canali
   - Monitorare canali

3. **Tipi**
   - Utilizzare tipi standard
   - Documentare tipi
   - Testare tipi
   - Monitorare tipi

4. **Dati**
   - Utilizzare dati necessari
   - Validare dati
   - Documentare dati
   - Testare dati

5. **Test**
   - Testare notifiche
   - Testare canali
   - Testare tipi
   - Testare dati

### Esempi

#### Notifica Completa
```php
// CORRETTO
app(RecordNotificationAction::class)->execute(
    $userId,
    Doctor::class,
    $entityId,
    'approved',
    ['email', 'database', 'sms'],
    [
        'subject' => 'Approvazione Registrazione',
        'body' => 'La tua registrazione è stata approvata',
        'sms' => 'Registrazione approvata',
        'workflow_id' => $workflow->id,
        'notes' => $notes,
    ]
);

// ERRATO
// ❌ Non usare direttamente i canali
Mail::to($user)->send(new DoctorRegistrationMail($doctor));
$user->notifications()->create([...]);
Sms::send($user->phone, 'Approved');
```

#### Notifica Personalizzata
```php
// CORRETTO
app(RecordNotificationAction::class)->execute(
    $userId,
    Doctor::class,
    $entityId,
    'custom',
    ['email', 'database'],
    [
        'subject' => 'Notifica Personalizzata',
        'body' => 'Questo è un messaggio personalizzato',
        'custom_data' => $data,
    ]
);

// ERRATO
// ❌ Non creare classi specifiche
class CustomNotification extends Notification
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Notifica Personalizzata')
            ->line('Questo è un messaggio personalizzato');
    }
}
```

## Checklist

### Per Ogni Notifica
- [ ] Usa RecordNotificationAction
- [ ] No classi specifiche
- [ ] Canali supportati
- [ ] Documentata
- [ ] Testata

### Per Canali
- [ ] Appropriati
- [ ] Configurati
- [ ] Testati
- [ ] Monitorati
- [ ] Performance

### Per Tipi
- [ ] Standard
- [ ] Documentati
- [ ] Testati
- [ ] Monitorati
- [ ] Performance

### Per Dati
- [ ] Necessari
- [ ] Validati
- [ ] Documentati
- [ ] Testati
- [ ] Performance

### Per Test
- [ ] Notifiche
- [ ] Canali
- [ ] Tipi
- [ ] Dati
- [ ] Performance
- [ ] Copertura 
