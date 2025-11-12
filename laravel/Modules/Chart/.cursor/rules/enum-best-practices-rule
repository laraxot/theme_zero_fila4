# Best Practices per l'Utilizzo degli Enum in PHP 8.1+

## Principi Fondamentali

Gli enum in PHP 8.1+ offrono un modo tipo-sicuro per rappresentare un insieme fisso di valori possibili, come stati, tipi o categorie.

## Regole Specifiche

### 1. Utilizzo Corretto degli Enum

- Utilizzare gli enum per rappresentare stati, tipi o categorie con un numero finito di valori possibili
- Preferire gli enum backed (con valore) per facilitare la persistenza nel database
- Esempio:
  ```php
  enum DoctorStatus: string
  {
      case PENDING = 'pending';
      case APPROVED = 'approved';
      case REJECTED = 'rejected';
  }
  ```

### 2. Aggiungere Metodi Helper

- Arricchire gli enum con metodi helper per incapsulare la logica specifica dello stato
- Esempi comuni:
  ```php
  // Etichette leggibili
  public function getLabel(): string
  {
      return match($this) {
          self::PENDING => 'In attesa',
          self::APPROVED => 'Approvato',
          self::REJECTED => 'Rifiutato',
      };
  }
  
  // Colori per UI
  public function getColor(): string
  {
      return match($this) {
          self::PENDING => 'warning',
          self::APPROVED => 'success',
          self::REJECTED => 'danger',
      };
  }
  
  // Metodi di verifica
  public function canAccess(): bool
  {
      return $this === self::APPROVED;
  }
  ```

### 3. Casting nei Modelli

- Utilizzare il casting automatico nei modelli Eloquent per convertire il valore del database nell'enum
- Esempio:
  ```php
  protected $casts = [
      'status' => DoctorStatus::class,
  ];
  ```

### 4. Validazione degli Enum

- Utilizzare le regole di validazione specifiche per enum di Laravel
- Esempio:
  ```php
  use Illuminate\Validation\Rules\Enum;
  
  $request->validate([
      'status' => ['required', new Enum(DoctorStatus::class)],
  ]);
  ```

### 5. Transizioni di Stato

- Implementare metodi per gestire le transizioni di stato in modo sicuro
- Esempio:
  ```php
  enum OrderStatus: string
  {
      case PENDING = 'pending';
      case PROCESSING = 'processing';
      case SHIPPED = 'shipped';
      case DELIVERED = 'delivered';
      case CANCELLED = 'cancelled';
      
      public function canTransitionTo(self $newStatus): bool
      {
          return match($this) {
              self::PENDING => in_array($newStatus, [self::PROCESSING, self::CANCELLED]),
              self::PROCESSING => in_array($newStatus, [self::SHIPPED, self::CANCELLED]),
              self::SHIPPED => in_array($newStatus, [self::DELIVERED]),
              self::DELIVERED, self::CANCELLED => false,
          };
      }
  }
  ```

## Vantaggi degli Enum

### 1. Tipo-Sicurezza
- Il compilatore PHP verifica che vengano utilizzati solo valori validi
- Errori rilevati in fase di compilazione anziché in runtime

### 2. Autocompletamento
- Gli IDE possono suggerire i valori disponibili
- Migliora la produttività e riduce gli errori

### 3. Refactoring
- Rinominare un caso dell'enum aggiorna automaticamente tutti i riferimenti
- Facilita la manutenzione del codice

### 4. Documentazione Integrata
- Il codice stesso documenta i valori possibili
- Migliora la comprensione del dominio

## Esempi di Utilizzo

### In Controller
```php
public function approveDoctorRegistration(Doctor $doctor)
{
    if ($doctor->status !== DoctorStatus::PENDING) {
        return back()->with('error', 'Solo i dottori in attesa possono essere approvati');
    }
    
    $doctor->status = DoctorStatus::APPROVED;
    $doctor->save();
    
    return back()->with('success', 'Dottore approvato con successo');
}
```

### In Viste
```php
<span class="badge badge-{{ $doctor->status->getColor() }}">
    {{ $doctor->status->getLabel() }}
</span>
```

### In Condizioni
```php
@if ($doctor->status->canAccess())
    <a href="{{ route('doctor.dashboard') }}" class="btn btn-primary">Accedi</a>
@endif
```

## Anti-Pattern da Evitare

### 1. Stringhe Letterali
```php
// ❌ NON FARE QUESTO
if ($doctor->status === 'approved') {
    // ...
}

// ✅ CORRETTO
if ($doctor->status === DoctorStatus::APPROVED) {
    // ...
}
```

### 2. Costanti di Classe
```php
// ❌ NON FARE QUESTO
class DoctorStatus
{
    public const PENDING = 'pending';
    public const APPROVED = 'approved';
    public const REJECTED = 'rejected';
}

// ✅ CORRETTO
enum DoctorStatus: string
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
}
```

### 3. Array di Valori
```php
// ❌ NON FARE QUESTO
$statuses = [
    'pending' => 'In attesa',
    'approved' => 'Approvato',
    'rejected' => 'Rifiutato',
];

// ✅ CORRETTO
enum DoctorStatus: string
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    
    public function getLabel(): string
    {
        return match($this) {
            self::PENDING => 'In attesa',
            self::APPROVED => 'Approvato',
            self::REJECTED => 'Rifiutato',
        };
    }
}
```
