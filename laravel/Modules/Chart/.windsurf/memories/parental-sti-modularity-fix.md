# Memoria: Fix Modularità Parental STI - Dicembre 2024

## Contesto del Problema
**File coinvolto**: `/var/www/html/_bases/base_saluteora/laravel/Modules/User/app/Console/Commands/ChangeTypeCommand.php`

**Errore critico commesso**: Creazione di dipendenza diretta dal modulo User generico al modulo SaluteOra specifico attraverso l'import:
```php
use Modules\SaluteOra\Enums\UserTypeEnum; // ❌ ERRORE CRITICO
```

## Causa Root
Mancanza di comprensione dell'architettura modulare del progetto basata su [Parental STI](https://github.com/tighten/parental):
- Il modulo User è **generico** e deve essere riutilizzabile in più progetti
- I moduli specifici del progetto (es. SaluteOra) estendono il modulo User base
- Le dipendenze devono fluire dai moduli specifici verso quelli generici, **MAI il contrario**

## Soluzione Implementata

### 1. Comando Generico con Reflection
```php
// ✅ SOLUZIONE CORRETTA
private function getAvailableTypes(UserContract $user): array
{
    // Ispeziona il modello corrente per tipi configurati
    if (property_exists($user, 'childTypes') && !empty($user->childTypes)) {
        return $user->childTypes;
    }
    
    // Fallback per progetti senza configurazione STI
    return ['admin' => 'Administrator', 'user' => 'Regular User'];
}
```

### 2. Gestione Dinamica dei Tipi
```php
// Gestisce enum, stringhe, oggetti in modo generico
private function getCurrentTypeDisplay(UserContract $user): string
{
    if (is_object($user->type) && method_exists($user->type, 'getLabel')) {
        return $user->type->getLabel() ?? 'Unknown';
    }
    return (string) $user->type;
}
```

## Architettura Corretta Appresa

### BaseUser (Modulo User - Generico)
```php
abstract class BaseUser extends Authenticatable
{
    use HasChildren;
    
    protected $childColumn = 'type';
    protected $childTypes = []; // Vuoto per default
}
```

### User (Modulo SaluteOra - Specifico)
```php
class User extends BaseUser
{
    protected $childTypes = [
        'admin' => Admin::class,
        'doctor' => Doctor::class,
        'patient' => Patient::class,
    ];
    
    protected function casts(): array {
        return array_merge(parent::casts(), [
            'type' => UserTypeEnum::class, // Solo qui l'enum specifico
        ]);
    }
}
```

## Lezioni Apprese

### ❌ Cosa NON fare mai
1. **Dipendenze inverse**: Modulo generico che importa da modulo specifico
2. **Enum hardcoded**: Assumere strutture specifiche nei comandi generici  
3. **Cast globali**: Definire cast specifici nei modelli base generici
4. **Logiche di dominio**: Implementare business logic specifica nel modulo User base

### ✅ Pattern da seguire sempre
1. **Inspection dinamica**: Usare reflection per ispezionare configurazioni correnti
2. **Fallback ragionevoli**: Fornire alternative base per progetti senza configurazione
3. **Tipizzazione flessibile**: Gestire enum, stringhe, oggetti con metodi generici
4. **Documentazione separata**: Mantenere docs separate per livello generico vs specifico

## Impatto e Validazione

### Prima (Errato)
- ❌ Modulo User dipendeva da SaluteOra
- ❌ Non riutilizzabile in altri progetti
- ❌ Violazione principi di modularità

### Dopo (Corretto)
- ✅ Modulo User completamente generico
- ✅ Funziona con qualsiasi configurazione STI
- ✅ Riutilizzabile in progetti diversi
- ✅ Fallback per progetti senza tipi configurati

## File Aggiornati
1. `Modules/User/app/Console/Commands/ChangeTypeCommand.php` - Reso generico
2. `Modules/User/docs/parental_inheritance.md` - Documentazione architettura
3. `.cursor/rules/parental-sti-modularity.mdc` - Regole per il futuro
4. `.windsurf/rules/parental-sti-modularity.mdc` - Regole per il futuro

## Validazione Futura

### Checklist per Comandi nel Modulo User
- [ ] Nessun import da moduli specifici del progetto
- [ ] Uso di reflection per ispezionare configurazioni
- [ ] Fallback per configurazioni mancanti
- [ ] Gestione generica di enum/stringhe/oggetti
- [ ] Documentazione separata per livelli diversi

### Red Flags da riconoscere
- `use Modules\ProjectName\...` nel modulo User
- Metodi specifici di enum chiamati direttamente
- Cast hardcoded nei BaseModel
- Logiche di business specifiche nei moduli generici

## Riferimenti
- [Parental Documentation](https://github.com/tighten/parental)
- [Laravel STI Patterns](https://laravel.com/docs/eloquent-relationships)
- [Modular Architecture Principles](../../docs/module-architecture.md)

---
**Data**: Dicembre 2024  
**Severità**: Critica  
**Status**: Risolto e documentato  
**Prossimo Review**: Validare in altri progetti che usano modulo User 
