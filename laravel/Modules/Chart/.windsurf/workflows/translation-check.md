---
description: Workflow specializzato per il controllo e validazione dei file di traduzione secondo gli standard Laraxot
---

# Translation Validation Workflow

Workflow dedicato al controllo completo dei file di traduzione, verifica della struttura espansa e conformità agli standard Laraxot <nome progetto>.

## Utilizzo
Invoca con `/translation-check` per eseguire una validazione completa delle traduzioni.

## Fase 1: Setup e Localizzazione

### 1.1 Verifica Struttura Directory
```bash

# Verifica directory traduzioni per ogni modulo
find Modules/ -type d -name "lang" -exec ls -la {} \;

# Controlla presenza file di traduzione principali
find Modules/ -name "*.php" -path "*/lang/*" | head -20
```

### 1.2 Controllo Naming Convention
```bash

# Verifica che tutti i file siano in minuscolo (eccetto README.md)
find Modules/*/docs/ -name "*.md" | grep -E "[A-Z]" | grep -v "README.md" || echo "✅ Naming convention corretta"

# Verifica file traduzione seguano convenzioni
find Modules/*/lang/ -name "*.php" | grep -E "[A-Z]" || echo "✅ File traduzione in minuscolo"
```

## Fase 2: Validazione Struttura Traduzioni

### 2.1 Controllo Struttura Espansa Obbligatoria
Verifica che tutte le traduzioni usino la struttura espansa:

```bash

# Cerca uso di struttura semplificata (NON PERMESSA)
grep -r "'[a-zA-Z_]*' =>" Modules/*/lang/ --include="*.php" | grep -v "label\|placeholder\|help" | head -10 || echo "✅ Struttura espansa utilizzata"

# Cerca campi senza struttura completa
grep -r "fields.*=>" Modules/*/lang/ --include="*.php" -A 10 | grep -B2 -A8 "=>" | grep -v "label\|placeholder\|help" | head -10
```

### 2.2 Verifica Struttura Campi
Controlla che ogni campo abbia label, placeholder e help:

```bash

# Script per verificare completezza campi
for file in $(find Modules/*/lang/ -name "*.php" -path "*/fields*"); do
    echo "Controllo: $file"
    
    # Verifica presenza sezione fields
    if grep -q "'fields'" "$file"; then
        echo "  ✅ Sezione fields trovata"
        
        # Verifica struttura espansa
        if grep -A 20 "'fields'" "$file" | grep -q "label.*placeholder.*help\|help.*placeholder.*label"; then
            echo "  ✅ Struttura espansa presente"
        else
            echo "  ❌ Struttura espansa mancante"
        fi
    else
        echo "  ⚠️  Nessuna sezione fields"
    fi
done
```

### 2.3 Controllo Azioni (Actions)
Verifica struttura completa per le azioni:

```bash

# Controlla che le azioni abbiano tutte le chiavi necessarie
for file in $(find Modules/*/lang/ -name "*action*" -o -name "*resource*" | grep "\.php$"); do
    echo "Controllo azioni: $file"
    
    if grep -q "'actions'" "$file"; then
        # Verifica presenza chiavi obbligatorie
        if grep -A 30 "'actions'" "$file" | grep -q "label.*success.*error\|error.*success.*label"; then
            echo "  ✅ Struttura azioni completa"
        else
            echo "  ❌ Struttura azioni incompleta"
        fi
    fi
done
```

## Fase 3: Controllo Componenti Filament

### 3.1 Verifica Assenza di ->label() hardcoded
```bash

# Cerca uso di ->label() nei componenti (VIETATO)
grep -r "->label(" Modules/ --include="*.php" | grep -v "test\|Test" | head -10 || echo "✅ Nessun ->label() hardcoded trovato"

# Cerca ->placeholder() hardcoded
grep -r "->placeholder(" Modules/ --include="*.php" | grep -v "test\|Test" | head -10 || echo "✅ Nessun ->placeholder() hardcoded trovato"

# Cerca ->helperText() hardcoded
grep -r "->helperText(" Modules/ --include="*.php" | grep -v "test\|Test" | head -10 || echo "✅ Nessun ->helperText() hardcoded trovato"
```

### 3.2 Controllo Uso Corretto Traduzioni
```bash

# Verifica uso di __() per traduzioni
grep -r "__(" Modules/ --include="*.blade.php" | head -10

# Verifica uso di trans() 
grep -r "trans(" Modules/ --include="*.blade.php" | head -10

# Cerca stringhe hardcoded in blade (potenziali problemi)
grep -r ">[A-Z][a-z]" Modules/ --include="*.blade.php" | grep -v "__\|trans\|{{\|@\|</" | head -10
```

## Fase 4: Validazione Sintassi e Struttura

### 4.1 Controllo Sintassi PHP
```bash

# Verifica sintassi PHP per tutti i file di traduzione
find Modules/*/lang/ -name "*.php" -exec php -l {} \; | grep -v "No syntax errors"
```

### 4.2 Verifica Array Syntax
```bash

# Controlla uso di sintassi [] invece di array() (OBBLIGATORIO)
grep -r "array(" Modules/*/lang/ --include="*.php" || echo "✅ Sintassi array[] utilizzata correttamente"

# Verifica presenza declare(strict_types=1)
find Modules/*/lang/ -name "*.php" -exec grep -L "declare(strict_types=1)" {} \; | head -10
```

### 4.3 Controllo Return Statement
```bash

# Verifica che tutti i file abbiano return con array
for file in $(find Modules/*/lang/ -name "*.php"); do
    if ! grep -q "^return \[" "$file"; then
        echo "❌ $file - Mancante return array"
    fi
done
```

## Fase 5: Controlli di Completezza

### 5.1 Verifica Traduzioni Mancanti
```bash

# Confronta chiavi tra italiano e inglese
for module in $(ls Modules/); do
    if [ -d "Modules/$module/lang/it" ] && [ -d "Modules/$module/lang/en" ]; then
        echo "Controllo completezza $module:"
        
        # Elenca file it
        it_files=$(find "Modules/$module/lang/it" -name "*.php" | sort)
        
        # Controlla corrispondenza file en
        for it_file in $it_files; do
            en_file=${it_file/\/it\//\/en\/}
            if [ ! -f "$en_file" ]; then
                echo "  ❌ Mancante: $en_file"
            fi
        done
    fi
done
```

### 5.2 Controllo helper_text Duplicati
```bash

# Trova helper_text identici a description o placeholder
for file in $(find Modules/*/lang/ -name "*.php"); do
    # Cerca pattern con helper_text uguale a placeholder
    awk '
    /helper_text.*=>/ { 
        helper = $0; 
        getline; 
        if ($0 ~ /placeholder.*=>/ && helper == $0) 
            print FILENAME ": helper_text uguale a placeholder"
    }' "$file"
done
```

## Fase 6: Generazione Report

### 6.1 Report Completezza Traduzioni
```bash

# Genera report di completezza per modulo
echo "# Report Completezza Traduzioni" > translation-report.md
echo "Data: $(date)" >> translation-report.md
echo "" >> translation-report.md

for module in $(ls Modules/); do
    if [ -d "Modules/$module/lang" ]; then
        echo "## Modulo: $module" >> translation-report.md
        
        # Conta file di traduzione
        it_count=$(find "Modules/$module/lang/it" -name "*.php" 2>/dev/null | wc -l)
        en_count=$(find "Modules/$module/lang/en" -name "*.php" 2>/dev/null | wc -l)
        
        echo "- File IT: $it_count" >> translation-report.md
        echo "- File EN: $en_count" >> translation-report.md
        echo "" >> translation-report.md
    fi
done

echo "Report generato: translation-report.md"
```

### 6.2 Controllo Coerenza Icon Names
```bash

# Verifica che le icone nei file di traduzione usino nomi corretti
grep -r "'icon'" Modules/*/lang/ --include="*.php" | grep -v "heroicon-\|{module"
```

## Fase 7: Automazione e Fix

### 7.1 Fix Automatico Helper Text Duplicati
```bash

# Script per rimuovere helper_text identici (se regola utente applicabile)
for file in $(find Modules/*/lang/ -name "*.php"); do
    # Backup
    cp "$file" "$file.backup"
    
    # Applica fix per helper_text duplicati
    sed -i "/helper_text.*=>/s/'helper_text' => '\(.*\)',/'helper_text' => '',/g" "$file"
done
```

### 7.2 Validazione Post-Fix
```bash

# Verifica che i fix non abbiano rotto la sintassi
find Modules/*/lang/ -name "*.php" -exec php -l {} \; | grep -v "No syntax errors"
```

## Best Practice e Regole

### Struttura Obbligatoria per Campi
```php
// ✅ CORRETTO - Struttura espansa completa
'fields' => [
    'nome_campo' => [
        'label' => 'Etichetta Campo',
        'placeholder' => 'Placeholder diverso',
        'help' => 'Testo di aiuto specifico'
    ]
]

// ❌ ERRATO - Struttura semplificata
'fields' => [
    'nome_campo' => 'Etichetta Campo'
]

// ❌ ERRATO - helper_text uguale a placeholder
'nome_campo' => [
    'label' => 'Campo',
    'placeholder' => 'Inserisci valore',
    'helper_text' => 'Inserisci valore'  // Deve essere diverso!
]
```

### Struttura per Azioni
```php
// ✅ CORRETTO - Azioni complete
'actions' => [
    'create' => [
        'label' => 'Crea nuovo',
        'success' => 'Creato con successo',
        'error' => 'Errore durante creazione',
        'confirmation' => 'Confermi creazione?'
    ]
]
```

## Regole di Conformità

1. **Struttura Espansa**: SEMPRE obbligatoria per fields e actions
2. **No Hardcoded**: MAI usare ->label(), ->placeholder(), ->helperText()
3. **Array Syntax**: SEMPRE usare [] invece di array()
4. **Strict Types**: SEMPRE includere declare(strict_types=1)
5. **Helper Text**: SEMPRE diverso da placeholder e description
6. **Naming**: File e cartelle docs in minuscolo (eccetto README.md)
7. **Return Array**: SEMPRE return con array alla fine del file

---

**Ultimo aggiornamento**: Dicembre 2024  
**Versione**: 1.0  
**Compatibilità**: Laraxot <nome progetto>, Filament 4.x 
