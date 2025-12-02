---
description: Workflow specializzato per l'analisi statica del codice con PHPStan secondo gli standard Laraxot
---

# PHPStan Quality Check Workflow

Workflow dedicato all'esecuzione di controlli di qualità del codice con PHPStan, seguendo le best practice di Laraxot <nome progetto>.

## Utilizzo
Invoca con `/phpstan-check` per eseguire una completa analisi statica del codice.

## Fase 1: Preparazione Ambiente

### 1.1 Verifica Directory di Lavoro
```bash

# OBBLIGATORIO: Eseguire sempre da directory Laravel
cd /var/www/html/_bases/base_<nome progetto>/laravel

# Verifica struttura del progetto
ls -la phpstan.neon* composer.json
```

### 1.2 Controllo Dipendenze
```bash

# Verifica installazione PHPStan
./vendor/bin/phpstan --version

# Aggiorna autoload per nuove classi
composer dump-autoload
```

## Fase 2: Analisi Statica Completa

### 2.1 Analisi Progetto Completo
```bash

# Analisi livello 9 (standard minimo Laraxot)
./vendor/bin/phpstan analyze --level=9 --memory-limit=2G

# Con output dettagliato
./vendor/bin/phpstan analyze --level=9 --memory-limit=2G --verbose
```

### 2.2 Analisi per Modulo Specifico
```bash

# <nome progetto>
./vendor/bin/phpstan analyze Modules/<nome progetto> --level=9

# Performance
./vendor/bin/phpstan analyze Modules/Performance --level=9

# User
./vendor/bin/phpstan analyze Modules/User --level=9

# UI
./vendor/bin/phpstan analyze Modules/UI --level=9

# Xot (modulo base)
./vendor/bin/phpstan analyze Modules/Xot --level=9
```

### 2.3 Analisi con Baseline
```bash

# Genera baseline per errori esistenti
./vendor/bin/phpstan analyze --generate-baseline

# Analizza solo nuovi errori
./vendor/bin/phpstan analyze --baseline=phpstan-baseline.neon
```

## Fase 3: Controlli Specifici Laraxot

### 3.1 Verifica Namespace
Controlla che NON ci sia il segmento 'App' nei namespace:

```bash

# Cerca namespace errati nei moduli
grep -r "namespace.*App\\" Modules/ --include="*.php" || echo "✅ Namespace corretti"

# Cerca use statements errati
grep -r "use.*App\\" Modules/ --include="*.php" || echo "✅ Use statements corretti"
```

### 3.2 Verifica Ereditarietà Modelli
```bash

# Cerca modelli che estendono direttamente Model invece di BaseModel
grep -r "extends.*Model" Modules/*/Models/ --include="*.php" | grep -v "BaseModel" || echo "✅ Ereditarietà corretta"

# Cerca modelli che estendono XotBaseModel direttamente
grep -r "extends.*XotBaseModel" Modules/*/Models/ --include="*.php" | grep -v "BaseModel" || echo "✅ BaseModel specifici utilizzati"
```

### 3.3 Verifica Migrazioni
```bash

# Cerca migrazioni che estendono Migration invece di XotBaseMigration
grep -r "extends.*Migration" Modules/*/database/migrations/ --include="*.php" | grep -v "XotBaseMigration" || echo "✅ Migrazioni corrette"

# Cerca implementazioni del metodo down (vietate)
grep -r "function down" Modules/*/database/migrations/ --include="*.php" || echo "✅ Nessun metodo down trovato"
```

## Fase 4: Controlli Tipizzazione

### 4.1 Verifica Strict Types
```bash

# Cerca file senza declare(strict_types=1)
find Modules/ -name "*.php" -exec grep -L "declare(strict_types=1)" {} \; | head -10
```

### 4.2 Verifica PHPDoc
```bash

# Cerca proprietà senza annotazioni nelle migrazioni
grep -r "\$fillable" Modules/ --include="*.php" -A1 -B1 | grep -v "@var" || echo "✅ Proprietà annotate"
```

## Fase 5: Report e Risoluzione

### 5.1 Generazione Report
```bash

# Report dettagliato con formato table
./vendor/bin/phpstan analyze --level=9 --error-format=table

# Report in formato JSON per parsing
./vendor/bin/phpstan analyze --level=9 --error-format=json > phpstan-report.json

# Report con conteggio errori per tipo
./vendor/bin/phpstan analyze --level=9 --error-format=table | grep -E "ERROR|FOUND"
```

### 5.2 Controllo Performance
```bash

# Analisi con profiling per moduli grandi
./vendor/bin/phpstan analyze --level=9 --memory-limit=4G --debug

# Analisi incrementale (più veloce per controlli frequenti)
./vendor/bin/phpstan analyze --level=9 --memory-limit=2G --no-progress
```

## Fase 6: Automazione e CI/CD

### 6.1 Script di Pre-commit
```bash

# Verifica solo file modificati
git diff --cached --name-only --diff-filter=ACM | grep '\.php$' | xargs ./vendor/bin/phpstan analyze --level=9
```

### 6.2 Integrazione Continuous Integration
```bash

# Per pipeline CI/CD
./vendor/bin/phpstan analyze --level=9 --memory-limit=2G --no-interaction --no-ansi
```

## Errori Comuni e Soluzioni

### Errore: "Class not found"
**Soluzione**: Verifica namespace e esegui `composer dump-autoload`

### Errore: "Property not found"
**Soluzione**: Aggiungi annotazioni `@property` nel PHPDoc della classe

### Errore: "Method not found"
**Soluzione**: Verifica importazioni e namespace delle classi utilizzate

### Errore: "Return type mismatch"
**Soluzione**: Allinea tipi di ritorno PHPDoc con tipi nativi PHP

### Errore: Memory limit
**Soluzione**: Aumenta memory limit: `--memory-limit=4G`

## Best Practice per PHPStan

1. **Eseguire sempre da `/laravel`**: Directory corretta per autoload
2. **Livello 9 minimo**: Standard obbligatorio per nuovo codice
3. **Memory limit adeguato**: `2G` minimo, `4G` per moduli grandi
4. **Baseline per legacy**: Solo per errori esistenti, non per nuovo codice
5. **Controlli pre-commit**: Integrare nei workflow Git
6. **Documentazione errori**: Registrare pattern di errori ricorrenti

## Regole Specifiche Laraxot

- ❌ **MAI** usare `php artisan test:phpstan`
- ✅ **SEMPRE** eseguire da directory `/laravel`
- ✅ **SEMPRE** livello 9+ per nuovo codice
- ✅ **VERIFICARE** namespace senza segmento 'App'
- ✅ **CONTROLLARE** ereditarietà BaseModel specifici
- ✅ **VALIDARE** migrazioni XotBaseMigration senza down()

---

**Ultimo aggiornamento**: Dicembre 2024  
**Versione**: 1.0  
**Compatibilità**: PHPStan 1.10+, Laraxot <nome progetto> 
