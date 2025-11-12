---
name: "Naming Convention Audit"
description: "Audit completo delle convenzioni di naming: file, classi, metodi, variabili, database"
version: "1.0"
author: "Laraxot AI Assistant"
tags: ["laraxot", "naming", "conventions", "audit", "standards"]
---

# Naming Convention Audit Workflow

Questo workflow automatizza l'audit completo delle convenzioni di naming per garantire coerenza, leggibilità e manutenibilità del codice.

## Filosofia
- Naming consistente = codice comprensibile
- Convenzioni inglesi = collaborazione globale
- Standard PSR = interoperabilità

## Religione
- "Non avrai file maiuscolo in docs/ all'infuori di README.md"
- PascalCase per le classi, camelCase per i metodi
- snake_case per database e file config

## Politica
- English naming obbligatorio
- PSR standards rigorosamente applicati
- Convenzioni Laravel rispettate

## Zen
- Nome giusto = comprensione immediata
- Consistenza = manutenzione serena
- Standard = onboarding veloce

---

## Steps

### 1. File and Directory Naming Audit
```bash
echo "=== File and Directory Naming Audit ==="

# Controlla naming docs/ (lowercase tranne README.md)
echo "Controllo naming documentazione..."
find docs/ -name "*" | grep '[A-Z]' | grep -v "README.md" > reports/docs_naming_violations.txt
find laravel/Modules/*/docs/ -name "*" | grep '[A-Z]' | grep -v "README.md" > reports/module_docs_naming_violations.txt

# Controlla naming file PHP (PascalCase per classi)
echo "Controllo naming file PHP..."
find laravel/Modules/ -name "*.php" | while read file; do
    basename_file=$(basename "$file" .php)
    if [[ ! "$basename_file" =~ ^[A-Z][a-zA-Z0-9]*$ ]] && [[ "$file" != *"/web.php" ]] && [[ "$file" != *"/api.php" ]] && [[ "$file" != *"/channels.php" ]] && [[ "$file" != *"/console.php" ]]; then
        echo "$file" >> reports/php_file_naming_violations.txt
    fi
done

# Controlla naming config files (snake_case)
echo "Controllo naming file config..."
find laravel/config/ -name "*.php" | while read file; do
    basename_file=$(basename "$file" .php)
    if [[ ! "$basename_file" =~ ^[a-z][a-z0-9_]*$ ]]; then
        echo "$file" >> reports/config_naming_violations.txt
    fi
done

# Controlla naming migration files
echo "Controllo naming migration files..."
find laravel/Modules/*/database/migrations/ -name "*.php" | while read file; do
    basename_file=$(basename "$file")
    if [[ ! "$basename_file" =~ ^[0-9]{4}_[0-9]{2}_[0-9]{2}_[0-9]{6}_[a-z][a-z0-9_]*\.php$ ]]; then
        echo "$file" >> reports/migration_naming_violations.txt
    fi
done
```

### 2. Class Naming Audit
```bash
echo "=== Class Naming Audit ==="

# Controlla naming classi (PascalCase)
echo "Controllo naming classi..."
grep -r "^class [^A-Z]" laravel/Modules/ --include="*.php" > reports/class_naming_violations.txt
grep -r "^abstract class [^A-Z]" laravel/Modules/ --include="*.php" >> reports/class_naming_violations.txt
grep -r "^final class [^A-Z]" laravel/Modules/ --include="*.php" >> reports/class_naming_violations.txt

# Controlla naming interfacce (PascalCase + Interface suffix)
echo "Controllo naming interfacce..."
grep -r "^interface " laravel/Modules/ --include="*.php" | grep -v "Interface$" > reports/interface_naming_violations.txt

# Controlla naming trait (PascalCase + Trait suffix)
echo "Controllo naming trait..."
grep -r "^trait " laravel/Modules/ --include="*.php" | grep -v "Trait$" > reports/trait_naming_violations.txt

# Controlla naming enum (PascalCase + Enum suffix)
echo "Controllo naming enum..."
grep -r "^enum " laravel/Modules/ --include="*.php" | grep -v "Enum$" > reports/enum_naming_violations.txt

# Controlla naming controller (PascalCase + Controller suffix)
echo "Controllo naming controller..."
find laravel/Modules/*/app/Http/Controllers/ -name "*.php" | while read file; do
    basename_file=$(basename "$file" .php)
    if [[ ! "$basename_file" =~ Controller$ ]]; then
        echo "$file" >> reports/controller_naming_violations.txt
    fi
done

# Controlla naming modelli (PascalCase, singolare)
echo "Controllo naming modelli..."
find laravel/Modules/*/app/Models/ -name "*.php" | while read file; do
    basename_file=$(basename "$file" .php)
    # Verifica plurali comuni (semplificato)
    if [[ "$basename_file" =~ s$ ]] && [[ ! "$basename_file" =~ (ss|us|is)$ ]]; then
        echo "$file (possibile plurale)" >> reports/model_naming_violations.txt
    fi
done
```

### 3. Method and Variable Naming Audit
```bash
echo "=== Method and Variable Naming Audit ==="

# Controlla naming metodi (camelCase)
echo "Controllo naming metodi..."
grep -r "public function [A-Z]" laravel/Modules/ --include="*.php" > reports/method_naming_violations.txt
grep -r "protected function [A-Z]" laravel/Modules/ --include="*.php" >> reports/method_naming_violations.txt
grep -r "private function [A-Z]" laravel/Modules/ --include="*.php" >> reports/method_naming_violations.txt

# Controlla naming variabili (camelCase)
echo "Controllo naming variabili..."
grep -r "\\$[A-Z]" laravel/Modules/ --include="*.php" | grep -v "\\$GLOBALS\\|\\$_" > reports/variable_naming_violations.txt

# Controlla naming proprietà (camelCase per pubbliche, camelCase o snake_case per protette/private)
echo "Controllo naming proprietà..."
grep -r "public .*\\$[A-Z]" laravel/Modules/ --include="*.php" > reports/property_naming_violations.txt

# Controlla naming costanti (UPPER_SNAKE_CASE)
echo "Controllo naming costanti..."
grep -r "const [a-z]" laravel/Modules/ --include="*.php" > reports/constant_naming_violations.txt
```

### 4. Database Naming Audit
```bash
echo "=== Database Naming Audit ==="

# Controlla naming tabelle (snake_case, plurale)
echo "Controllo naming tabelle..."
grep -r "Schema::create\\|\\$table->create" laravel/Modules/ --include="*.php" | while read line; do
    table_name=$(echo "$line" | grep -o "'[^']*'" | head -n 1 | tr -d "'")
    if [[ -n "$table_name" ]]; then
        # Verifica snake_case
        if [[ ! "$table_name" =~ ^[a-z][a-z0-9_]*$ ]]; then
            echo "$line (naming errato: $table_name)" >> reports/table_naming_violations.txt
        fi
        # Verifica plurale (semplificato)
        if [[ ! "$table_name" =~ s$ ]] && [[ ! "$table_name" =~ _pivot$ ]]; then
            echo "$line (possibile singolare: $table_name)" >> reports/table_singular_violations.txt
        fi
    fi
done

# Controlla naming colonne (snake_case)
echo "Controllo naming colonne..."
grep -r "\\$table->" laravel/Modules/ --include="*.php" | grep -E "(string|integer|boolean|decimal|date|timestamp|text|json)" | while read line; do
    column_name=$(echo "$line" | grep -o "'[^']*'" | head -n 1 | tr -d "'")
    if [[ -n "$column_name" ]] && [[ ! "$column_name" =~ ^[a-z][a-z0-9_]*$ ]]; then
        echo "$line (naming errato: $column_name)" >> reports/column_naming_violations.txt
    fi
done

# Controlla naming foreign key (snake_case + _id suffix)
echo "Controllo naming foreign key..."
grep -r "foreignId\\|foreign.*references" laravel/Modules/ --include="*.php" | while read line; do
    if [[ "$line" =~ foreignId\(\'([^\']+)\'\) ]]; then
        fk_name="${BASH_REMATCH[1]}"
        if [[ ! "$fk_name" =~ _id$ ]]; then
            echo "$line (foreign key senza _id suffix: $fk_name)" >> reports/foreign_key_naming_violations.txt
        fi
    fi
done
```

### 5. Namespace and Import Audit
```bash
echo "=== Namespace and Import Audit ==="

# Controlla namespace corretti
echo "Controllo namespace..."
find laravel/Modules/ -name "*.php" | while read file; do
    expected_namespace=$(dirname "$file" | sed 's|laravel/Modules/||' | sed 's|/app/|/|' | sed 's|/|\\\\|g' | sed 's|^|Modules\\\\|')
    actual_namespace=$(grep "^namespace " "$file" | head -n 1 | sed 's/namespace //; s/;//')
    
    if [[ -n "$actual_namespace" ]] && [[ "$actual_namespace" != "$expected_namespace" ]]; then
        echo "$file: expected '$expected_namespace', got '$actual_namespace'" >> reports/namespace_violations.txt
    fi
done

# Controlla import inutili
echo "Controllo import inutili..."
find laravel/Modules/ -name "*.php" | while read file; do
    # Estrai tutte le classi importate
    imports=$(grep "^use " "$file" | sed 's/^use //; s/;//' | sed 's/ as .*//')
    
    for import in $imports; do
        class_name=$(basename "$import" | sed 's/.*\\//')
        # Controlla se la classe è utilizzata nel file
        if ! grep -q "$class_name" "$file" | grep -v "^use "; then
            echo "$file: unused import $import" >> reports/unused_imports.txt
        fi
    done
done

# Controlla import con alias
echo "Controllo import con alias..."
grep -r "use.*as [a-z]" laravel/Modules/ --include="*.php" > reports/lowercase_alias_violations.txt
```

### 6. Translation File Naming Audit
```bash
echo "=== Translation File Naming Audit ==="

# Controlla naming file traduzione (snake_case)
echo "Controllo naming file traduzione..."
find laravel/Modules/*/resources/lang/ -name "*.php" | while read file; do
    basename_file=$(basename "$file" .php)
    if [[ ! "$basename_file" =~ ^[a-z][a-z0-9_]*$ ]]; then
        echo "$file" >> reports/translation_file_naming_violations.txt
    fi
done

# Controlla chiavi traduzione (snake_case con punti)
echo "Controllo chiavi traduzione..."
find laravel/Modules/*/resources/lang/ -name "*.php" -exec grep -H "=>" {} \; | while read line; do
    key=$(echo "$line" | grep -o "'[^']*'" | head -n 1 | tr -d "'")
    if [[ -n "$key" ]] && [[ ! "$key" =~ ^[a-z][a-z0-9_.]*$ ]]; then
        echo "$line (chiave non conforme: $key)" >> reports/translation_key_violations.txt
    fi
done
```

### 7. Route Naming Audit
```bash
echo "=== Route Naming Audit ==="

# Controlla naming route (snake_case con punti)
echo "Controllo naming route..."
grep -r "->name(" laravel/Modules/ --include="*.php" | while read line; do
    route_name=$(echo "$line" | grep -o "'[^']*'" | grep -o "[^']*" | head -n 1)
    if [[ -n "$route_name" ]] && [[ ! "$route_name" =~ ^[a-z][a-z0-9_.]*$ ]]; then
        echo "$line (route name non conforme: $route_name)" >> reports/route_naming_violations.txt
    fi
done

# Controlla prefix route (snake_case)
echo "Controllo prefix route..."
grep -r "->prefix(" laravel/Modules/ --include="*.php" | while read line; do
    prefix=$(echo "$line" | grep -o "'[^']*'" | head -n 1 | tr -d "'")
    if [[ -n "$prefix" ]] && [[ ! "$prefix" =~ ^[a-z][a-z0-9_-]*$ ]]; then
        echo "$line (prefix non conforme: $prefix)" >> reports/route_prefix_violations.txt
    fi
done
```

### 8. Blade Template Naming Audit
```bash
echo "=== Blade Template Naming Audit ==="

# Controlla naming file blade (kebab-case)
echo "Controllo naming file blade..."
find laravel/Modules/*/resources/views/ -name "*.blade.php" | while read file; do
    basename_file=$(basename "$file" .blade.php)
    if [[ ! "$basename_file" =~ ^[a-z][a-z0-9-]*$ ]]; then
        echo "$file" >> reports/blade_naming_violations.txt
    fi
done

# Controlla naming component blade (kebab-case)
echo "Controllo naming component blade..."
find laravel/Modules/*/resources/views/components/ -name "*.blade.php" | while read file; do
    basename_file=$(basename "$file" .blade.php)
    if [[ ! "$basename_file" =~ ^[a-z][a-z0-9-]*$ ]]; then
        echo "$file" >> reports/blade_component_naming_violations.txt
    fi
done
```

### 9. Generate Naming Report
```bash
echo "=== Generating Naming Report ==="

cat > reports/naming_convention_report.md << 'EOF'

# Naming Convention Audit Report

Data generazione: $(date)

## Sommario Violazioni

### File e Directory
- **Documentazione**: $(wc -l < reports/docs_naming_violations.txt 2>/dev/null || echo 0) violazioni
- **File PHP**: $(wc -l < reports/php_file_naming_violations.txt 2>/dev/null || echo 0) violazioni
- **File Config**: $(wc -l < reports/config_naming_violations.txt 2>/dev/null || echo 0) violazioni
- **Migration**: $(wc -l < reports/migration_naming_violations.txt 2>/dev/null || echo 0) violazioni

### Classi e Structure
- **Classi**: $(wc -l < reports/class_naming_violations.txt 2>/dev/null || echo 0) violazioni
- **Interfacce**: $(wc -l < reports/interface_naming_violations.txt 2>/dev/null || echo 0) violazioni
- **Trait**: $(wc -l < reports/trait_naming_violations.txt 2>/dev/null || echo 0) violazioni
- **Enum**: $(wc -l < reports/enum_naming_violations.txt 2>/dev/null || echo 0) violazioni
- **Controller**: $(wc -l < reports/controller_naming_violations.txt 2>/dev/null || echo 0) violazioni
- **Model**: $(wc -l < reports/model_naming_violations.txt 2>/dev/null || echo 0) violazioni

### Metodi e Variabili
- **Metodi**: $(wc -l < reports/method_naming_violations.txt 2>/dev/null || echo 0) violazioni
- **Variabili**: $(wc -l < reports/variable_naming_violations.txt 2>/dev/null || echo 0) violazioni
- **Proprietà**: $(wc -l < reports/property_naming_violations.txt 2>/dev/null || echo 0) violazioni
- **Costanti**: $(wc -l < reports/constant_naming_violations.txt 2>/dev/null || echo 0) violazioni

### Database
- **Tabelle**: $(wc -l < reports/table_naming_violations.txt 2>/dev/null || echo 0) violazioni
- **Colonne**: $(wc -l < reports/column_naming_violations.txt 2>/dev/null || echo 0) violazioni
- **Foreign Key**: $(wc -l < reports/foreign_key_naming_violations.txt 2>/dev/null || echo 0) violazioni

### Namespace e Import
- **Namespace**: $(wc -l < reports/namespace_violations.txt 2>/dev/null || echo 0) violazioni
- **Import Inutili**: $(wc -l < reports/unused_imports.txt 2>/dev/null || echo 0) violazioni
- **Alias Minuscole**: $(wc -l < reports/lowercase_alias_violations.txt 2>/dev/null || echo 0) violazioni

### Traduzioni e Route
- **File Traduzione**: $(wc -l < reports/translation_file_naming_violations.txt 2>/dev/null || echo 0) violazioni
- **Chiavi Traduzione**: $(wc -l < reports/translation_key_violations.txt 2>/dev/null || echo 0) violazioni
- **Route Names**: $(wc -l < reports/route_naming_violations.txt 2>/dev/null || echo 0) violazioni
- **Route Prefix**: $(wc -l < reports/route_prefix_violations.txt 2>/dev/null || echo 0) violazioni

### Template Blade
- **File Blade**: $(wc -l < reports/blade_naming_violations.txt 2>/dev/null || echo 0) violazioni
- **Component Blade**: $(wc -l < reports/blade_component_naming_violations.txt 2>/dev/null || echo 0) violazioni

## Dettagli Violazioni

### Violazioni Critiche da Correggere Immediatamente

if [ -s "reports/class_naming_violations.txt" ]; then
    echo "#### Classi con Naming Errato"
    echo '```'
    head -n 10 reports/class_naming_violations.txt
    echo '```'
fi

if [ -s "reports/namespace_violations.txt" ]; then
    echo "#### Namespace Errati"
    echo '```'
    head -n 10 reports/namespace_violations.txt
    echo '```'
fi

if [ -s "reports/table_naming_violations.txt" ]; then
    echo "#### Tabelle con Naming Errato"
    echo '```'
    head -n 10 reports/table_naming_violations.txt
    echo '```'
fi

## Convenzioni di Riferimento

### File e Directory
- **Documentazione**: lowercase tranne README.md
- **Classi PHP**: PascalCase.php
- **Config**: snake_case.php
- **Migration**: YYYY_MM_DD_HHMMSS_snake_case_description.php

### Classi
- **Classi**: PascalCase
- **Interfacce**: PascalCase + Interface suffix
- **Trait**: PascalCase + Trait suffix
- **Enum**: PascalCase + Enum suffix
- **Controller**: PascalCase + Controller suffix
- **Model**: PascalCase (singolare)

### Metodi e Variabili
- **Metodi**: camelCase
- **Variabili**: camelCase
- **Proprietà pubbliche**: camelCase
- **Costanti**: UPPER_SNAKE_CASE

### Database
- **Tabelle**: snake_case (plurale)
- **Colonne**: snake_case
- **Foreign Key**: snake_case + _id suffix
- **Indici**: snake_case

### Traduzioni e Route
- **File traduzione**: snake_case.php
- **Chiavi traduzione**: snake_case con punti
- **Route names**: snake_case con punti
- **Route prefix**: snake_case o kebab-case

### Template
- **File Blade**: kebab-case.blade.php
- **Component**: kebab-case.blade.php

## Raccomandazioni

### Priorità Alta
1. Correggere namespace errati
2. Rinominare classi non conformi
3. Correggere naming tabelle database

### Priorità Media
1. Rinominare file documentazione
2. Correggere naming metodi
3. Rimuovere import inutili

### Priorità Bassa
1. Standardizzare naming variabili
2. Ottimizzare alias import
3. Uniformare naming template

## Script di Correzione Automatica

### Rinomina File Documentazione
```bash
find docs/ -name "*" | grep '[A-Z]' | grep -v "README.md" | while read file; do
    new_name=$(echo "$file" | tr '[:upper:]' '[:lower:]' | sed 's/[^a-z0-9._/-]/_/g')
    mv "$file" "$new_name"
done
```

### Correzione Namespace
```bash

# Implementare script di correzione automatica namespace
```

### Standardizzazione Import
```bash

# Implementare script per rimuovere import inutili
```

EOF

# Esegui il report
bash reports/naming_convention_report.md > reports/naming_convention_report_final.md
```

### 10. Automatic Fixes
```bash
echo "=== Automatic Fixes ==="

# Fix documentation naming
echo "Fixing documentation naming..."
find docs/ -name "*" | grep '[A-Z]' | grep -v "README.md" | while read file; do
    if [ -f "$file" ]; then
        new_name=$(echo "$file" | tr '[:upper:]' '[:lower:]' | sed 's/[^a-z0-9._/-]/_/g')
        if [ "$file" != "$new_name" ]; then
            echo "Renaming: $file -> $new_name"
            mv "$file" "$new_name"
        fi
    fi
done

# Fix module documentation naming
for module_docs in laravel/Modules/*/docs/; do
    find "$module_docs" -name "*" | grep '[A-Z]' | grep -v "README.md" | while read file; do
        if [ -f "$file" ]; then
            new_name=$(echo "$file" | tr '[:upper:]' '[:lower:]' | sed 's/[^a-z0-9._/-]/_/g')
            if [ "$file" != "$new_name" ]; then
                echo "Renaming module doc: $file -> $new_name"
                mv "$file" "$new_name"
            fi
        fi
    done
done

# Remove unused imports (simplified)
echo "Removing obviously unused imports..."
find laravel/Modules/ -name "*.php" -exec sed -i '/^use.*App\\/d' {} \;

echo "✅ Naming Convention Audit completed. Check reports/ directory for detailed results."
```

---

## Checklist Conformità

### File e Directory
- [ ] Documenti in lowercase (tranne README.md)
- [ ] Classi PHP in PascalCase.php
- [ ] Config in snake_case.php
- [ ] Migration con timestamp e snake_case

### Classi e Strutture
- [ ] Classi in PascalCase
- [ ] Interfacce con suffix Interface
- [ ] Trait con suffix Trait
- [ ] Enum con suffix Enum
- [ ] Controller con suffix Controller
- [ ] Model singolari in PascalCase

### Metodi e Variabili
- [ ] Metodi in camelCase
- [ ] Variabili in camelCase
- [ ] Costanti in UPPER_SNAKE_CASE
- [ ] Proprietà pubbliche in camelCase

### Database
- [ ] Tabelle in snake_case plurale
- [ ] Colonne in snake_case
- [ ] Foreign key con suffix _id
- [ ] Indici in snake_case

### Namespace e Import
- [ ] Namespace conformi alla struttura
- [ ] Nessun import inutile
- [ ] Alias in PascalCase

### Route e Traduzioni
- [ ] Route names in snake_case.dot.notation
- [ ] File traduzione in snake_case.php
- [ ] Chiavi traduzione in snake_case.dot.notation

---

## Collegamenti
- [Naming Philosophy](../rules/naming_philosophy.mdc)
- [Laravel Conventions](../rules/laravel_conventions.mdc)
- [PSR Standards](../rules/psr_standards.mdc)
