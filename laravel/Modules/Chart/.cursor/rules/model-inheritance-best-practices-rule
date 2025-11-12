# Best Practices per l'Ereditarietà dei Modelli

## Regole per Single Table Inheritance (STI)

### Gerarchia di Ereditarietà
- I modelli specializzati (es. Doctor, Patient) **devono** estendere il modello User del modulo Patient
- Il modello User del modulo Patient estende BaseUser del modulo User
- MAI estendere direttamente Model, BaseModel o XotBaseModel nei modelli specializzati

### Trait Necessari
- Usare sempre il trait `\Parental\HasParent` nei modelli che partecipano a STI
- Esempio corretto:
  ```php
  class Doctor extends User
  {
      use HasParent;
      // ...
  }
  ```

### Evitare Duplicazione di Trait
- MAI ridichiarare trait già presenti nelle classi genitori
- Verificare sempre la catena di ereditarietà completa prima di aggiungere trait
- Esempio errato:
  ```php
  // ❌ NON FARE QUESTO
  use Illuminate\Database\Eloquent\Factories\HasFactory;

  class Doctor extends User
  {
      use HasFactory; // Già ereditato da BaseUser
      use HasParent;
      // ...
  }
  ```

### Campi nella Tabella Base
- Tutti i campi usati dai modelli specializzati devono essere presenti nella tabella base (`users`)
- Se aggiungi un campo (es. `certifications`), aggiorna la migration della tabella `users`
- Errore tipico: `Unknown column 'certifications' in 'field list'`

## Regole per i Modelli con Enum

### Utilizzo degli Enum
- Utilizzare gli enum PHP 8.1+ per la gestione degli stati (es. DoctorStatus, DoctorRegistrationStatus)
- Aggiungere metodi helper agli enum per incapsulare la logica specifica dello stato
- Esempio:
  ```php
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

### Casting degli Enum
- Utilizzare il casting automatico nei modelli per convertire il valore del database nell'enum
- Esempio:
  ```php
  protected $casts = [
      'status' => DoctorStatus::class,
  ];
  ```

## Motivazioni

### Perché Evitare la Duplicazione di Trait
- Duplicare trait già ereditati causa confusione e potenziali conflitti
- Aumenta la complessità del codice senza aggiungere funzionalità
- Rende più difficile il refactoring e la manutenzione

### Perché Usare STI Correttamente
- Permette di gestire più tipi di utente sulla stessa tabella
- Centralizza la logica comune nel modello base
- Migliora la manutenibilità: cambiando la logica nel modello base, tutti i figli ne beneficiano

### Perché Usare Enum
- Tipo-sicurezza: il compilatore PHP verifica che vengano utilizzati solo valori validi
- Autocompletamento: gli IDE possono suggerire i valori disponibili
- Refactoring: rinominare un caso dell'enum aggiorna automaticamente tutti i riferimenti
