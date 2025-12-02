---
name: "Documentation Sync"
description: "Sincronizza documentazione tra moduli e root, garantendo coerenza e linking bidirezionale"
version: "1.0"
author: "Laraxot AI Assistant"
tags: ["laraxot", "documentation", "sync", "consistency", "linking"]
---

# Documentation Sync Workflow

Questo workflow automatizza la sincronizzazione della documentazione tra moduli e root, garantendo coerenza, linking bidirezionale e conformità alle regole di naming.

## Filosofia
- Un solo punto di verità per ogni tipo di documentazione
- Collegamento bidirezionale tra docs modulo e root
- Coerenza nelle convenzioni di naming

## Religione
- "Non avrai altro file maiuscolo all'infuori di README.md"
- La documentazione è sacra e deve essere sempre aggiornata
- Ogni regola va documentata sia nel modulo che nella root

## Politica
- Documenti lowercase tranne README.md
- Backlink obbligatori tra modulo e root
- Aggiornamento sincrono di .cursor/rules e .windsurf/rules

## Zen
- Serenità della documentazione, nessun link rotto
- Navigazione fluida tra moduli e root
- Onboarding immediato tramite documentazione chiara

---

## Steps

### 1. Scan Documentation Structure
```bash

# Trova tutta la documentazione esistente
find docs/ -name "*.md" -type f | sort
find laravel/Modules/*/docs/ -name "*.md" -type f | sort
```

### 2. Check Naming Conventions
```bash

# Controlla file con maiuscole (tranne README.md)
find docs/ -name "*.md" -type f | grep -v "README.md" | grep '[A-Z]'
find laravel/Modules/*/docs/ -name "*.md" -type f | grep -v "README.md" | grep '[A-Z]'

# Controlla cartelle con maiuscole
find docs/ -type d | grep '[A-Z]'
find laravel/Modules/*/docs/ -type d | grep '[A-Z]'
```

### 3. Fix Naming Violations
```bash

# Rinomina file con maiuscole in lowercase
for file in $(find docs/ -name "*.md" -type f | grep -v "README.md" | grep '[A-Z]'); do
    lowercase_name=$(echo "$file" | tr '[:upper:]' '[:lower:]' | sed 's/[^a-z0-9._-]/_/g')
    if [ "$file" != "$lowercase_name" ]; then
        echo "Rinomino: $file -> $lowercase_name"
        mv "$file" "$lowercase_name"
    fi
done

# Rinomina cartelle con maiuscole in lowercase
for dir in $(find docs/ -type d | grep '[A-Z]' | sort -r); do
    lowercase_name=$(echo "$dir" | tr '[:upper:]' '[:lower:]' | sed 's/[^a-z0-9._/-]/_/g')
    if [ "$dir" != "$lowercase_name" ]; then
        echo "Rinomino cartella: $dir -> $lowercase_name"
        mv "$dir" "$lowercase_name"
    fi
done

# Applica lo stesso ai moduli
for module_dir in laravel/Modules/*/docs/; do
    for file in $(find "$module_dir" -name "*.md" -type f | grep -v "README.md" | grep '[A-Z]'); do
        lowercase_name=$(echo "$file" | tr '[:upper:]' '[:lower:]' | sed 's/[^a-z0-9._-]/_/g')
        if [ "$file" != "$lowercase_name" ]; then
            echo "Rinomino modulo: $file -> $lowercase_name"
            mv "$file" "$lowercase_name"
        fi
    done
done
```

### 4. Generate Documentation Index
```bash

# Crea indice master della documentazione
echo "# Documentation Index" > docs/documentation_index.md
echo "Indice completo di tutta la documentazione del progetto Laraxot." >> docs/documentation_index.md
echo "" >> docs/documentation_index.md
echo "## Root Documentation" >> docs/documentation_index.md

for file in $(find docs/ -name "*.md" -type f | grep -v "documentation_index.md" | sort); do
    basename_file=$(basename "$file" .md)
    title=$(head -n 10 "$file" | grep -E "^#[^#]" | head -n 1 | sed 's/^# //' || echo "$basename_file")
    echo "- [$title]($file)" >> docs/documentation_index.md
done

echo "" >> docs/documentation_index.md
echo "## Module Documentation" >> docs/documentation_index.md

for module in $(find laravel/Modules/ -type d -mindepth 1 -maxdepth 1 | sort); do
    module_name=$(basename "$module")
    echo "" >> docs/documentation_index.md
    echo "### $module_name Module" >> docs/documentation_index.md
    
    for file in $(find "$module/docs/" -name "*.md" -type f 2>/dev/null | sort); do
        relative_path="${file#laravel/Modules/}"
        basename_file=$(basename "$file" .md)
        title=$(head -n 10 "$file" | grep -E "^#[^#]" | head -n 1 | sed 's/^# //' || echo "$basename_file")
        echo "- [$title](laravel/Modules/$relative_path)" >> docs/documentation_index.md
    done
done
```

### 5. Check Bidirectional Links
```bash

# Verifica link bidirezionali tra root e moduli
echo "# Link Verification Report" > docs/link_verification_report.md
echo "Data: $(date)" >> docs/link_verification_report.md
echo "" >> docs/link_verification_report.md

# Controlla link dalla root ai moduli
echo "## Link dalla Root ai Moduli" >> docs/link_verification_report.md
for file in $(find docs/ -name "*.md" -type f); do
    module_links=$(grep -o "laravel/Modules/[^)]*\.md" "$file" 2>/dev/null || true)
    if [ -n "$module_links" ]; then
        echo "### $file" >> docs/link_verification_report.md
        echo "$module_links" | while read link; do
            if [ -f "$link" ]; then
                echo "✅ $link" >> docs/link_verification_report.md
            else
                echo "❌ $link (non trovato)" >> docs/link_verification_report.md
            fi
        done
    fi
done

# Controlla link dai moduli alla root
echo "" >> docs/link_verification_report.md
echo "## Link dai Moduli alla Root" >> docs/link_verification_report.md
for file in $(find laravel/Modules/*/docs/ -name "*.md" -type f 2>/dev/null); do
    root_links=$(grep -o "\.\./\.\./\.\./docs/[^)]*\.md" "$file" 2>/dev/null || true)
    if [ -n "$root_links" ]; then
        echo "### $file" >> docs/link_verification_report.md
        echo "$root_links" | while read link; do
            # Converti path relativo in assoluto
            abs_path=$(echo "$link" | sed 's|\.\./\.\./\.\./||')
            if [ -f "$abs_path" ]; then
                echo "✅ $link -> $abs_path" >> docs/link_verification_report.md
            else
                echo "❌ $link -> $abs_path (non trovato)" >> docs/link_verification_report.md
            fi
        done
    fi
done
```

### 6. Update .mdc Rules
```bash

# Sincronizza regole tra .cursor e .windsurf
echo "# Rules Sync Report" > docs/rules_sync_report.md
echo "Data: $(date)" >> docs/rules_sync_report.md
echo "" >> docs/rules_sync_report.md

# Confronta file .mdc tra .cursor/rules e .windsurf/rules
echo "## Regole in .cursor/rules ma non in .windsurf/rules" >> docs/rules_sync_report.md
for cursor_file in .cursor/rules/*.mdc; do
    basename_file=$(basename "$cursor_file")
    windsurf_file=".windsurf/rules/$basename_file"
    if [ ! -f "$windsurf_file" ]; then
        echo "❌ $basename_file" >> docs/rules_sync_report.md
        # Copia automaticamente
        cp "$cursor_file" "$windsurf_file"
        echo "✅ Copiato $cursor_file -> $windsurf_file" >> docs/rules_sync_report.md
    fi
done

echo "" >> docs/rules_sync_report.md
echo "## Regole in .windsurf/rules ma non in .cursor/rules" >> docs/rules_sync_report.md
for windsurf_file in .windsurf/rules/*.mdc; do
    basename_file=$(basename "$windsurf_file")
    cursor_file=".cursor/rules/$basename_file"
    if [ ! -f "$cursor_file" ]; then
        echo "❌ $basename_file" >> docs/rules_sync_report.md
        # Copia automaticamente
        cp "$windsurf_file" "$cursor_file"
        echo "✅ Copiato $windsurf_file -> $cursor_file" >> docs/rules_sync_report.md
    fi
done
```

### 7. Generate Module README Updates
```bash

# Aggiorna README dei moduli con link alla documentazione root
for module_dir in laravel/Modules/*/; do
    module_name=$(basename "$module_dir")
    readme_file="$module_dir/docs/README.md"
    
    if [ ! -f "$readme_file" ]; then
        # Crea README se non esiste
        echo "# $module_name Module" > "$readme_file"
        echo "" >> "$readme_file"
        echo "Documentazione del modulo $module_name." >> "$readme_file"
        echo "" >> "$readme_file"
        echo "## Filosofia" >> "$readme_file"
        echo "- Centralizzazione, DRY, refactoring sicuro" >> "$readme_file"
        echo "- Un solo punto di verità, nessuna duplicazione" >> "$readme_file"
        echo "- Override solo per logica realmente custom" >> "$readme_file"
        echo "" >> "$readme_file"
        echo "## Collegamenti alla Documentazione Root" >> "$readme_file"
        echo "- [Provider XotBase Philosophy](../../../docs/provider_xotbase_philosophy.md)" >> "$readme_file"
        echo "- [Naming Conventions](../../../docs/naming_conventions.md)" >> "$readme_file"
        echo "- [Laravel 12 Best Practices](../../../docs/laravel12_best_practices.md)" >> "$readme_file"
        echo "- [Documentation Index](../../../docs/documentation_index.md)" >> "$readme_file"
        echo "" >> "$readme_file"
        echo "## Struttura del Modulo" >> "$readme_file"
        echo "```" >> "$readme_file"
        tree "$module_dir" -I 'vendor|node_modules|.git' | head -n 20 >> "$readme_file"
        echo "```" >> "$readme_file"
        echo "" >> "$readme_file"
        echo "*Ultimo aggiornamento: $(date +%Y-%m-%d)*" >> "$readme_file"
    fi
    
    # Verifica e aggiorna collegamenti
    if ! grep -q "docs/documentation_index.md" "$readme_file"; then
        echo "" >> "$readme_file"
        echo "## Collegamenti Aggiornati" >> "$readme_file"
        echo "- [Documentation Index](../../../docs/documentation_index.md)" >> "$readme_file"
    fi
done
```

### 8. Validate Documentation Consistency
```bash

# Verifica coerenza della documentazione
echo "# Documentation Consistency Report" > docs/documentation_consistency_report.md
echo "Data: $(date)" >> docs/documentation_consistency_report.md
echo "" >> docs/documentation_consistency_report.md

# Conta documenti per modulo
echo "## Statistiche Documentazione" >> docs/documentation_consistency_report.md
echo "Documenti root: $(find docs/ -name "*.md" -type f | wc -l)" >> docs/documentation_consistency_report.md

for module_dir in laravel/Modules/*/; do
    module_name=$(basename "$module_dir")
    doc_count=$(find "$module_dir/docs/" -name "*.md" -type f 2>/dev/null | wc -l)
    echo "$module_name: $doc_count documenti" >> docs/documentation_consistency_report.md
done

echo "" >> docs/documentation_consistency_report.md

# Controlla pattern obbligatori
echo "## Pattern Obbligatori" >> docs/documentation_consistency_report.md

for module_dir in laravel/Modules/*/; do
    module_name=$(basename "$module_dir")
    echo "### $module_name" >> docs/documentation_consistency_report.md
    
    # README.md obbligatorio
    if [ -f "$module_dir/docs/README.md" ]; then
        echo "✅ README.md presente" >> docs/documentation_consistency_report.md
    else
        echo "❌ README.md mancante" >> docs/documentation_consistency_report.md
    fi
    
    # providers/ directory
    if [ -d "$module_dir/docs/providers/" ]; then
        echo "✅ docs/providers/ presente" >> docs/documentation_consistency_report.md
    else
        echo "❌ docs/providers/ mancante" >> docs/documentation_consistency_report.md
    fi
    
    # Architecture doc
    if [ -f "$module_dir/docs/architecture.md" ] || [ -f "$module_dir/docs/architecture/README.md" ]; then
        echo "✅ Documentazione architettura presente" >> docs/documentation_consistency_report.md
    else
        echo "❌ Documentazione architettura mancante" >> docs/documentation_consistency_report.md
    fi
done
```

---

## Checklist Sincronizzazione

### Naming Conventions
- [ ] Tutti i file docs/ in lowercase (tranne README.md)
- [ ] Tutte le cartelle docs/ in lowercase
- [ ] Nomi file descrittivi e consistenti
- [ ] Uso di underscore invece di spazi e caratteri speciali

### Struttura Documentazione
- [ ] README.md presente in ogni modulo
- [ ] Cartella docs/providers/ presente dove necessario
- [ ] Documentazione architettura presente
- [ ] Link bidirezionali tra modulo e root funzionanti

### Regole .mdc
- [ ] Sync completo tra .cursor/rules e .windsurf/rules
- [ ] Tutte le regole aggiornate con esempi pratici
- [ ] Collegamenti corretti tra regole e documentazione

### Indici e Navigazione
- [ ] Documentation index aggiornato
- [ ] Link verification report pulito
- [ ] Consistency report senza errori critici

---

## Correzioni Automatiche

### Auto-Fix Naming
```bash

# Script per rinominare automaticamente file non conformi
.windsurf/workflows/scripts/fix_documentation_naming.sh
```

### Auto-Generate Missing Docs
```bash

# Script per generare documentazione mancante
.windsurf/workflows/scripts/generate_missing_docs.sh
```

### Auto-Update Links
```bash

# Script per aggiornare automaticamente i link rotti
.windsurf/workflows/scripts/fix_broken_links.sh
```

---

## Collegamenti
- [Documentation Naming Rules](../rules/documentation_naming.mdc)
- [Provider XotBase Philosophy](../rules/provider_xotbase_philosophy.mdc)
- [Filament Best Practices](../rules/filament-best-practices.mdc)
