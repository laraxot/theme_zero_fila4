# Gestione Errori

## Indice
- [Errori Comuni](#errori-comuni)
- [Soluzioni](#soluzioni)
- [Best Practices](#best-practices)
- [Checklist](#checklist)

## Errori Comuni

### Migrazioni
1. **Colonne Mancanti**
   - Errore: `SQLSTATE[42S22]: Column not found: 1054 Unknown column 'column_name' in 'field list'`
   - Causa: Colonna non presente nella tabella
   - Soluzione: Aggiungere colonna tramite migration

2. **Colonne Duplicate**
   - Errore: `SQLSTATE[42S21]: Column already exists: 1060 Duplicate column name 'column_name'`
   - Causa: Tentativo di aggiungere colonna già esistente
   - Soluzione: Controllare esistenza colonna prima di aggiungerla

3. **Tabelle Mancanti**
   - Errore: `SQLSTATE[42S02]: Base table or view not found: 1146 Table 'database.table' doesn't exist`
   - Causa: Tabella non creata
   - Soluzione: Eseguire migration per creare tabella

### Modelli
1. **Namespace Errati**
   - Errore: `Class "App\Models\Model" not found`
   - Causa: Namespace non corretto
   - Soluzione: Correggere namespace

2. **Trait Duplicati**
   - Errore: `Trait "HasFactory" is already used`
   - Causa: Trait già ereditato dalla classe base
   - Soluzione: Rimuovere trait duplicato

3. **Override Proprietà Deprecate**
   - Errore: `Property "property" is already defined in parent class`
   - Causa: Tentativo di ridefinire proprietà già definita
   - Soluzione: Rimuovere override

### Validazione
1. **Email Duplicata**
   - Errore: `The email has already been taken`
   - Causa: Tentativo di usare email già registrata
   - Soluzione: Validare unicità prima della creazione

2. **Campi Richiesti**
   - Errore: `The field field is required`
   - Causa: Campo obbligatorio non fornito
   - Soluzione: Aggiungere validazione required

3. **Formato Non Valido**
   - Errore: `The field field must be a valid email`
   - Causa: Formato campo non valido
   - Soluzione: Aggiungere validazione formato

## Soluzioni

### Migrazioni
```php
// CORRETTO: Controllo esistenza colonna
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

// ERRATO: Nessun controllo
return new class extends XotBaseMigration
{
    public function up()
    {
        $this->tableUpdate('users', function (Blueprint $table) {
            $table->string('type')->nullable(); // ❌ Può generare errore se colonna esiste
        });
    }
};
```

### Modelli
```php
// CORRETTO: Namespace e trait corretti
namespace Modules\User\Models;

use Parental\HasParent;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends User
{
    use HasParent;
}

// ERRATO: Namespace e trait errati
namespace App\Models; // ❌ Namespace errato

use HasFactory; // ❌ Trait duplicato
use Notifiable; // ❌ Trait duplicato

class Doctor extends Model // ❌ Estende Model invece di User
{
    use HasFactory; // ❌ Trait duplicato
    use Notifiable; // ❌ Trait duplicato
}
```

### Validazione
```php
// CORRETTO: Validazione completa
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

// ERRATO: Validazione incompleta
class CreateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => ['required'], // ❌ Validazione incompleta
            'password' => ['required'], // ❌ Validazione incompleta
        ];
    }
}
```

## Best Practices

### Regole Fondamentali
1. **Gestione Errori**
   - Utilizzare try-catch solo quando necessario
   - Utilizzare custom exceptions
   - Utilizzare validation exceptions
   - Utilizzare authorization exceptions
   - Utilizzare not found exceptions

2. **Validazione**
   - Validare input prima della creazione
   - Utilizzare form requests
   - Utilizzare validation rules
   - Utilizzare validation messages
   - Utilizzare validation attributes

3. **Migrazioni**
   - Estendere sempre XotBaseMigration
   - Non implementare il metodo down
   - Utilizzare tableUpdate per modifiche
   - Controllare esistenza colonne
   - Aggiungere colonna type solo nella migration base

4. **Modelli**
   - Utilizzare namespace corretti
   - Evitare trait duplicati
   - Evitare override proprietà deprecate
   - Utilizzare Parental per STI
   - Aggiungere tutti i campi nella tabella base

## Checklist

### Per Ogni Modifica
- [ ] Documentare errore
- [ ] Implementare soluzione
- [ ] Testare soluzione
- [ ] Aggiornare documentazione
- [ ] Verificare collegamenti bidirezionali

### Per Ogni Migration
- [ ] Estende XotBaseMigration
- [ ] Non implementa down
- [ ] Usa tableUpdate
- [ ] Controlla esistenza colonne
- [ ] Aggiunge type solo in base

### Per Ogni Modello
- [ ] Namespace corretto
- [ ] No trait duplicati
- [ ] No override proprietà
- [ ] Usa Parental per STI
- [ ] Campi in tabella base

### Per Ogni Validazione
- [ ] Validazione completa
- [ ] Messaggi personalizzati
- [ ] Attributi personalizzati
- [ ] Regole custom se necessario
- [ ] Test validazione 
