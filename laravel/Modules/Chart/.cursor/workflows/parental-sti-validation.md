# Workflow: Validazione Modularità Parental STI

## Invocazione
Usa `/parental-validation` in Cursor per eseguire controlli completi sulla modularità con Parental STI.

## Scopo
Garantire che i moduli User rimangano generici e riutilizzabili, senza dipendenze specifiche del progetto.

## Controlli Automatici

### 1. Verifica Dipendenze Modulo User
```bash

# Controlla import da moduli specifici
grep -r "use Modules\\" Modules/User/ --include="*.php" | grep -v "use Modules\\User\\" | grep -v "use Modules\\Xot\\"

# Se restituisce risultati, ci sono dipendenze errate da correggere
```

### 2. Controllo BaseUser Configuration
```bash

# Verifica che BaseUser abbia $childTypes vuoto
grep -A 5 "protected \$childTypes" Modules/User/app/Models/BaseUser.php
```

### 3. Controllo Comandi Console
```bash

# Cerca enum specifici nei comandi User
grep -r "Enum::" Modules/User/app/Console/Commands/ --include="*.php"

# Cerca metodi specifici di enum
grep -r "->value\|->getLabel\|->name" Modules/User/app/Console/Commands/ --include="*.php"
```

## Verifica Manuale

### 1. Architettura STI Corretta

#### ✅ BaseUser (Generico)
- [ ] Usa trait `HasChildren`
- [ ] Ha `protected $childColumn = 'type'`
- [ ] Ha `protected $childTypes = []` vuoto
- [ ] Nessun cast specifico nei casts()

#### ✅ User Specifico (es. SaluteOra)
- [ ] Estende BaseUser
- [ ] Definisce $childTypes specifici del progetto
- [ ] Implementa cast per enum specifici
- [ ] Ha connessione database specifica

#### ✅ Modelli Figli (Admin, Doctor, Patient)
- [ ] Usano trait `HasParent`
- [ ] Sono nel namespace del modulo specifico
- [ ] Non sono referenziati nel modulo User generico

### 2. Comandi Console Generici

#### ✅ Pattern Obbligatori
- [ ] Usa reflection per ispezionare tipi disponibili
- [ ] Ha fallback per configurazioni mancanti
- [ ] Gestisce enum/stringhe/oggetti genericamente
- [ ] Non assume strutture specifiche

#### ✅ Metodi Richiesti
```php
// Template per comandi generici
private function getAvailableTypes($user): array {
    if (property_exists($user, 'childTypes') && !empty($user->childTypes)) {
        return $user->childTypes;
    }
    return ['admin' => 'Administrator', 'user' => 'Regular User'];
}

private function getCurrentTypeDisplay($user): string {
    if (is_object($user->type) && method_exists($user->type, 'getLabel')) {
        return $user->type->getLabel() ?? 'Unknown';
    }
    return (string) $user->type;
}
```

### 3. Struttura Directory

#### ✅ Modulo User (Generico)
```
Modules/User/
├── app/Models/BaseUser.php              # Trait HasChildren, $childTypes = []
├── app/Console/Commands/                # Comandi senza dipendenze specifiche
├── docs/parental_inheritance.md         # Documentazione architettura
└── ...
```

#### ✅ Modulo Specifico (es. SaluteOra)
```
Modules/SaluteOra/
├── app/Models/User.php                  # Estende BaseUser, definisce $childTypes
├── app/Models/Admin.php                 # HasParent trait
├── app/Models/Doctor.php                # HasParent trait
├── app/Models/Patient.php               # HasParent trait
├── app/Enums/UserTypeEnum.php           # Enum specifico del progetto
└── docs/user-types.md                   # Documentazione implementazione
```

## Red Flags - Errori da Intercettare

### ❌ Dipendenze Errate
- `use Modules\ProjectName\...` nel modulo User
- Import di enum specifici nei comandi generici
- Reference a classi di moduli specifici in BaseUser

### ❌ Configurazioni Sbagliate
- Cast specifici in BaseUser
- $childTypes definiti in BaseUser invece che vuoti
- Logiche di business specifiche nel modulo User

### ❌ Pattern Scorretti
- Comandi che assumono enum specifici
- Metodi hardcoded per tipi specifici
- Gestione non generica di oggetti type

## Correzioni Tipo

### Problema: Dipendenza specifica in comando
```php
// ❌ ERRATO
use Modules\SaluteOra\Enums\UserTypeEnum;
$newType = UserTypeEnum::ADMIN->value;

// ✅ CORRETTO
$availableTypes = $this->getAvailableTypes($user);
$newType = $this->choice('Select type:', array_keys($availableTypes));
```

### Problema: Cast hardcoded in BaseUser
```php
// ❌ ERRATO in BaseUser
protected function casts(): array {
    return ['type' => UserTypeEnum::class];
}

// ✅ CORRETTO in User specifico
protected function casts(): array {
    return array_merge(parent::casts(), [
        'type' => UserTypeEnum::class,
    ]);
}
```

## Testing di Modularità

### Test Modulo User Standalone
```php
// Verifica che il modulo User funzioni senza moduli specifici
class UserModularityTest extends TestCase
{
    /** @test */
    public function base_user_works_without_specific_modules()
    {
        // Test che BaseUser funzioni senza dipendenze esterne
    }
    
    /** @test */
    public function commands_work_with_fallback_types()
    {
        // Test che i comandi funzionino con tipi di fallback
    }
}
```

### Test Cross-Project
```php
// Verifica riutilizzabilità in progetti diversi
class CrossProjectTest extends TestCase
{
    /** @test */
    public function user_module_works_in_different_projects()
    {
        // Simula uso in progetto diverso da SaluteOra
    }
}
```

## Documentazione Richiesta

### 1. Architettura (Modulo User)
- `Modules/User/docs/parental_inheritance.md`
- Spiega principi STI generici
- Pattern per comandi generici
- Best practices modularità

### 2. Implementazione (Modulo Specifico)
- `Modules/ProjectName/docs/user-types.md`
- Configurazione $childTypes specifica
- Enum e cast del progetto
- Casi d'uso specifici

### 3. Regole e Memorie
- `.cursor/rules/parental-sti-modularity.mdc`
- `.windsurf/rules/parental-sti-modularity.mdc`
- `.cursor/memories/parental-sti-modularity-fix.md`
- `.windsurf/memories/parental-sti-modularity-fix.md`

## Checklist Finale

Prima di considerare il modulo conforme:

- [ ] Nessuna dipendenza specifica nel modulo User
- [ ] BaseUser completamente generico
- [ ] Comandi usano reflection e fallback
- [ ] User specifici definiscono i propri tipi
- [ ] Documentazione completa e aggiornata
- [ ] Test di modularità passano
- [ ] Red flags risolti
- [ ] Regole e memorie aggiornate

---
**Ultima revisione**: Dicembre 2024
**Prossima verifica**: Validare su altri progetti che usano modulo User 
