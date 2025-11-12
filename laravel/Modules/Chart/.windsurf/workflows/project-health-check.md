---
name: "Project Health Check"
description: "Controllo completo dello stato di salute del progetto Laraxot: architettura, qualità, conformità"
version: "1.0"
author: "Laraxot AI Assistant"
tags: ["laraxot", "health", "overview", "audit", "dashboard"]
---

# Project Health Check Workflow

Questo workflow esegue un controllo completo dello stato di salute del progetto Laraxot, combinando tutti gli audit in un dashboard unificato.

## Filosofia
- Visione d'insieme = controllo totale
- Automazione = controllo continuo
- Metriche = miglioramento guidato

## Religione
- "Conosci te stesso" - Socrate applicato al codice
- La salute del progetto è sacra
- Il monitoring continuo è la via

## Politica
- Controlli regolari obbligatori
- Standard elevati non negoziabili
- Trasparenza completa sui problemi

## Zen
- Consapevolezza = controllo
- Semplicità = eleganza
- Miglioramento continuo = perfezione

---

## Steps

### 1. Environment and Dependencies Check
```bash
echo "=== Environment and Dependencies Check ==="

# Sistema e versioni
echo "Controllo ambiente..."
cat > reports/environment_info.md << EOF

# Environment Information

## Sistema
- OS: $(uname -a)
- PHP: $(php --version | head -n 1)
- Composer: $(composer --version 2>/dev/null || echo "Non installato")
- Node.js: $(node --version 2>/dev/null || echo "Non installato")
- NPM: $(npm --version 2>/dev/null || echo "Non installato")

## Laravel
- Laravel Version: $(cd laravel && php artisan --version 2>/dev/null || echo "Non rilevabile")
- Environment: $(cd laravel && php artisan env 2>/dev/null || echo "Non rilevabile")

## Database
- Driver: $(cd laravel && php artisan tinker --execute="echo config('database.default')" 2>/dev/null || echo "Non rilevabile")
- Connection: $(cd laravel && php artisan migrate:status >/dev/null 2>&1 && echo "✅ Connesso" || echo "❌ Non connesso")

## Cache e Queue
- Cache Driver: $(cd laravel && php artisan tinker --execute="echo config('cache.default')" 2>/dev/null || echo "Non rilevabile")
- Queue Driver: $(cd laravel && php artisan tinker --execute="echo config('queue.default')" 2>/dev/null || echo "Non rilevabile")

EOF

# Spazio disco
echo "## Spazio Disco" >> reports/environment_info.md
df -h . >> reports/environment_info.md
```

### 2. Module Structure Analysis
```bash
echo "=== Module Structure Analysis ==="

echo "Analisi struttura moduli..."
cat > reports/module_structure_analysis.md << 'EOF'

# Module Structure Analysis

## Moduli Esistenti
EOF

# Lista moduli con statistiche
for module_dir in laravel/Modules/*/; do
    module_name=$(basename "$module_dir")
    echo "### $module_name" >> reports/module_structure_analysis.md
    
    # Conta file per tipo
    php_files=$(find "$module_dir" -name "*.php" | wc -l)
    blade_files=$(find "$module_dir" -name "*.blade.php" | wc -l)
    js_files=$(find "$module_dir" -name "*.js" | wc -l)
    css_files=$(find "$module_dir" -name "*.css" -o -name "*.scss" | wc -l)
    test_files=$(find "$module_dir" -name "*Test.php" | wc -l)
    docs_files=$(find "$module_dir/docs/" -name "*.md" 2>/dev/null | wc -l)
    
    echo "- **File PHP**: $php_files" >> reports/module_structure_analysis.md
    echo "- **Template Blade**: $blade_files" >> reports/module_structure_analysis.md
    echo "- **File JavaScript**: $js_files" >> reports/module_structure_analysis.md
    echo "- **File CSS/SCSS**: $css_files" >> reports/module_structure_analysis.md
    echo "- **Test**: $test_files" >> reports/module_structure_analysis.md
    echo "- **Documentazione**: $docs_files" >> reports/module_structure_analysis.md
    
    # Verifica struttura essenziale
    echo "- **Struttura Essenziale**:" >> reports/module_structure_analysis.md
    
    # ServiceProvider
    if [ -f "$module_dir/app/Providers/${module_name}ServiceProvider.php" ]; then
        echo "  - ✅ ServiceProvider presente" >> reports/module_structure_analysis.md
    else
        echo "  - ❌ ServiceProvider mancante" >> reports/module_structure_analysis.md
    fi
    
    # RouteServiceProvider
    if [ -f "$module_dir/app/Providers/RouteServiceProvider.php" ]; then
        echo "  - ✅ RouteServiceProvider presente" >> reports/module_structure_analysis.md
    else
        echo "  - ❌ RouteServiceProvider mancante" >> reports/module_structure_analysis.md
    fi
    
    # composer.json
    if [ -f "$module_dir/composer.json" ]; then
        echo "  - ✅ composer.json presente" >> reports/module_structure_analysis.md
    else
        echo "  - ❌ composer.json mancante" >> reports/module_structure_analysis.md
    fi
    
    # module.json
    if [ -f "$module_dir/module.json" ]; then
        echo "  - ✅ module.json presente" >> reports/module_structure_analysis.md
    else
        echo "  - ❌ module.json mancante" >> reports/module_structure_analysis.md
    fi
    
    # Documentation
    if [ -f "$module_dir/docs/README.md" ]; then
        echo "  - ✅ Documentazione presente" >> reports/module_structure_analysis.md
    else
        echo "  - ❌ Documentazione mancante" >> reports/module_structure_analysis.md
    fi
    
    echo "" >> reports/module_structure_analysis.md
done

# Sommario statistiche
echo "## Statistiche Complessive" >> reports/module_structure_analysis.md
total_modules=$(find laravel/Modules/ -maxdepth 1 -type d | grep -c "Modules/[A-Z]")
echo "- **Totale Moduli**: $total_modules" >> reports/module_structure_analysis.md

total_php=$(find laravel/Modules/ -name "*.php" | wc -l)
echo "- **Totale File PHP**: $total_php" >> reports/module_structure_analysis.md

total_tests=$(find laravel/Modules/ -name "*Test.php" | wc -l)
echo "- **Totale Test**: $total_tests" >> reports/module_structure_analysis.md

total_docs=$(find laravel/Modules/*/docs/ -name "*.md" 2>/dev/null | wc -l)
echo "- **Totale Documentazione**: $total_docs" >> reports/module_structure_analysis.md
```

### 3. Execute All Audits
```bash
echo "=== Executing All Audits ==="

# Provider Validation
echo "Esecuzione Provider Validation..."
.windsurf/workflows/provider-validation.md 2>&1 | tee reports/provider_validation.log

# Naming Convention Audit
echo "Esecuzione Naming Convention Audit..."
.windsurf/workflows/naming-convention-audit.md 2>&1 | tee reports/naming_audit.log

# Code Quality Check
echo "Esecuzione Code Quality Check..."
.windsurf/workflows/code-quality-check.md 2>&1 | tee reports/quality_check.log

# Documentation Sync
echo "Esecuzione Documentation Sync..."
.windsurf/workflows/documentation-sync.md 2>&1 | tee reports/documentation_sync.log
```

### 4. Generate Health Score
```bash
echo "=== Generating Health Score ==="

cat > reports/health_score.md << 'EOF'

# Project Health Score

Data generazione: $(date)

## Metodologia di Calcolo

Il punteggio di salute è calcolato su diversi criteri:
- **Architettura** (25%): Conformità provider XotBase, struttura moduli
- **Qualità Codice** (25%): PHPStan, PSR-12, sicurezza
- **Naming** (20%): Convenzioni nomenclatura
- **Documentazione** (15%): Completezza e coerenza docs
- **Test** (15%): Coverage e presenza test

## Calcolo Punteggi

EOF

# Calcolo punteggio architettura
echo "### Architettura (25 punti)" >> reports/health_score.md

architecture_score=0

# Provider compliance (10 punti)
wrong_providers=$(grep -c "❌" reports/provider_validation_report.md 2>/dev/null || echo "0")
if [ "$wrong_providers" -eq "0" ]; then
    architecture_score=$((architecture_score + 10))
    echo "- ✅ Provider Compliance: 10/10 punti" >> reports/health_score.md
else
    provider_score=$((10 - wrong_providers))
    if [ "$provider_score" -lt "0" ]; then provider_score=0; fi
    architecture_score=$((architecture_score + provider_score))
    echo "- ❌ Provider Compliance: $provider_score/10 punti ($wrong_providers errori)" >> reports/health_score.md
fi

# Module structure (15 punti)
total_modules=$(find laravel/Modules/ -maxdepth 1 -type d | grep -c "Modules/[A-Z]")
modules_with_docs=$(find laravel/Modules/*/docs/README.md 2>/dev/null | wc -l)
modules_with_composer=$(find laravel/Modules/*/composer.json 2>/dev/null | wc -l)

structure_score=$(( (modules_with_docs + modules_with_composer) * 15 / (total_modules * 2) ))
architecture_score=$((architecture_score + structure_score))
echo "- Module Structure: $structure_score/15 punti" >> reports/health_score.md

echo "**Totale Architettura: $architecture_score/25**" >> reports/health_score.md
echo "" >> reports/health_score.md

# Calcolo punteggio qualità codice
echo "### Qualità Codice (25 punti)" >> reports/health_score.md

quality_score=0

# PHPStan (15 punti)
if [ -f "reports/phpstan_report.txt" ]; then
    if grep -q "No errors" reports/phpstan_report.txt; then
        quality_score=$((quality_score + 15))
        echo "- ✅ PHPStan: 15/15 punti (nessun errore)" >> reports/health_score.md
    else
        phpstan_errors=$(grep -c "ERROR" reports/phpstan_report.txt 2>/dev/null || echo "0")
        phpstan_score=$((15 - phpstan_errors / 2))
        if [ "$phpstan_score" -lt "0" ]; then phpstan_score=0; fi
        quality_score=$((quality_score + phpstan_score))
        echo "- ❌ PHPStan: $phpstan_score/15 punti ($phpstan_errors errori)" >> reports/health_score.md
    fi
else
    echo "- ❓ PHPStan: 0/15 punti (report non disponibile)" >> reports/health_score.md
fi

# PSR-12 (10 punti)
if [ -f "reports/style_report.json" ]; then
    if [ ! -s "reports/style_report.json" ]; then
        quality_score=$((quality_score + 10))
        echo "- ✅ PSR-12: 10/10 punti (nessuna violazione)" >> reports/health_score.md
    else
        echo "- ❌ PSR-12: 5/10 punti (violazioni trovate)" >> reports/health_score.md
        quality_score=$((quality_score + 5))
    fi
else
    echo "- ❓ PSR-12: 0/10 punti (report non disponibile)" >> reports/health_score.md
fi

echo "**Totale Qualità: $quality_score/25**" >> reports/health_score.md
echo "" >> reports/health_score.md

# Calcolo punteggio naming
echo "### Naming Conventions (20 punti)" >> reports/health_score.md

naming_score=0

# Conta violazioni naming
total_violations=0
if [ -f "reports/class_naming_violations.txt" ]; then
    class_violations=$(wc -l < reports/class_naming_violations.txt)
    total_violations=$((total_violations + class_violations))
fi

if [ -f "reports/namespace_violations.txt" ]; then
    namespace_violations=$(wc -l < reports/namespace_violations.txt)
    total_violations=$((total_violations + namespace_violations))
fi

if [ -f "reports/docs_naming_violations.txt" ]; then
    docs_violations=$(wc -l < reports/docs_naming_violations.txt)
    total_violations=$((total_violations + docs_violations))
fi

if [ "$total_violations" -eq "0" ]; then
    naming_score=20
    echo "- ✅ Naming Compliance: 20/20 punti (nessuna violazione)" >> reports/health_score.md
else
    naming_score=$((20 - total_violations / 2))
    if [ "$naming_score" -lt "0" ]; then naming_score=0; fi
    echo "- ❌ Naming Compliance: $naming_score/20 punti ($total_violations violazioni)" >> reports/health_score.md
fi

echo "**Totale Naming: $naming_score/20**" >> reports/health_score.md
echo "" >> reports/health_score.md

# Calcolo punteggio documentazione
echo "### Documentazione (15 punti)" >> reports/health_score.md

docs_score=0

# Presenza README nei moduli
modules_with_readme=$(find laravel/Modules/*/docs/README.md 2>/dev/null | wc -l)
readme_score=$((modules_with_readme * 10 / total_modules))
docs_score=$((docs_score + readme_score))

# Link bidirezionali (5 punti base se non ci sono errori)
if [ -f "reports/link_verification_report.md" ]; then
    broken_links=$(grep -c "❌" reports/link_verification_report.md 2>/dev/null || echo "0")
    if [ "$broken_links" -eq "0" ]; then
        docs_score=$((docs_score + 5))
        echo "- ✅ README Modules: $readme_score/10, Link: 5/5" >> reports/health_score.md
    else
        echo "- ❌ README Modules: $readme_score/10, Link: 0/5 ($broken_links link rotti)" >> reports/health_score.md
    fi
else
    echo "- README Modules: $readme_score/10, Link: 0/5 (report non disponibile)" >> reports/health_score.md
fi

echo "**Totale Documentazione: $docs_score/15**" >> reports/health_score.md
echo "" >> reports/health_score.md

# Calcolo punteggio test
echo "### Test Coverage (15 punti)" >> reports/health_score.md

test_score=0

# Presenza test
total_test_files=$(find laravel/Modules/ -name "*Test.php" | wc -l)
modules_with_tests=$(find laravel/Modules/*/tests/ -name "*Test.php" 2>/dev/null | wc -l)

if [ "$total_test_files" -gt "0" ]; then
    test_score=$((modules_with_tests * 15 / total_modules))
    echo "- Test Presence: $test_score/15 punti ($total_test_files test files)" >> reports/health_score.md
else
    echo "- ❌ Test Presence: 0/15 punti (nessun test trovato)" >> reports/health_score.md
fi

echo "**Totale Test: $test_score/15**" >> reports/health_score.md
echo "" >> reports/health_score.md

# Calcolo punteggio finale
total_score=$((architecture_score + quality_score + naming_score + docs_score + test_score))
echo "## Punteggio Finale" >> reports/health_score.md
echo "" >> reports/health_score.md
echo "### $total_score/100 punti" >> reports/health_score.md
echo "" >> reports/health_score.md

# Classificazione
if [ "$total_score" -ge "90" ]; then
    echo "🏆 **ECCELLENTE** - Progetto in ottima salute" >> reports/health_score.md
elif [ "$total_score" -ge "75" ]; then
    echo "✅ **BUONO** - Progetto in buona salute con miglioramenti minori" >> reports/health_score.md
elif [ "$total_score" -ge "60" ]; then
    echo "⚠️ **SUFFICIENTE** - Progetto funzionale ma necessita miglioramenti" >> reports/health_score.md
elif [ "$total_score" -ge "40" ]; then
    echo "❌ **INSUFFICIENTE** - Progetto necessita interventi significativi" >> reports/health_score.md
else
    echo "🚨 **CRITICO** - Progetto necessita refactoring completo" >> reports/health_score.md
fi
```

### 5. Generate Action Plan
```bash
echo "=== Generating Action Plan ==="

cat > reports/action_plan.md << 'EOF'

# Action Plan - Piano di Miglioramento

Basato sui risultati del Project Health Check.

## Priorità Immediate (Critiche)

### Architettura
EOF

# Analizza errori architetturali
if [ -f "reports/provider_validation_report.md" ]; then
    critical_provider_errors=$(grep -c "❌" reports/provider_validation_report.md 2>/dev/null || echo "0")
    if [ "$critical_provider_errors" -gt "0" ]; then
        echo "- 🚨 **Correggere $critical_provider_errors errori provider XotBase**" >> reports/action_plan.md
        echo "  - Eseguire: \`.windsurf/workflows/provider-validation.md\`" >> reports/action_plan.md
        echo "  - Utilizzare le correzioni automatiche nel workflow" >> reports/action_plan.md
    fi
fi

# Analizza errori qualità
echo "" >> reports/action_plan.md
echo "### Qualità Codice" >> reports/action_plan.md

if [ -f "reports/phpstan_report.txt" ]; then
    if ! grep -q "No errors" reports/phpstan_report.txt; then
        phpstan_errors=$(grep -c "ERROR" reports/phpstan_report.txt 2>/dev/null || echo "0")
        echo "- 🚨 **Correggere $phpstan_errors errori PHPStan**" >> reports/action_plan.md
        echo "  - Eseguire: \`cd laravel && ./vendor/bin/phpstan analyze --level=9\`" >> reports/action_plan.md
        echo "  - Focus su tipizzazione e PHPDoc" >> reports/action_plan.md
    fi
fi

# Analizza errori naming
echo "" >> reports/action_plan.md
echo "### Naming Conventions" >> reports/action_plan.md

if [ -f "reports/namespace_violations.txt" ] && [ -s "reports/namespace_violations.txt" ]; then
    namespace_violations=$(wc -l < reports/namespace_violations.txt)
    echo "- 🚨 **Correggere $namespace_violations errori namespace**" >> reports/action_plan.md
    echo "  - Utilizzare correzioni automatiche in naming-convention-audit" >> reports/action_plan.md
fi

if [ -f "reports/docs_naming_violations.txt" ] && [ -s "reports/docs_naming_violations.txt" ]; then
    docs_violations=$(wc -l < reports/docs_naming_violations.txt)
    echo "- ⚠️ **Rinominare $docs_violations file documentazione**" >> reports/action_plan.md
    echo "  - Utilizzare script automatico di renaming" >> reports/action_plan.md
fi

# Piano medio termine
echo "" >> reports/action_plan.md
echo "## Priorità Media (1-2 Settimane)" >> reports/action_plan.md
echo "" >> reports/action_plan.md

echo "### Documentazione" >> reports/action_plan.md
modules_without_readme=$(find laravel/Modules/ -maxdepth 1 -type d | grep "Modules/[A-Z]" | wc -l)
modules_with_readme=$(find laravel/Modules/*/docs/README.md 2>/dev/null | wc -l)
missing_readme=$((modules_without_readme - modules_with_readme))

if [ "$missing_readme" -gt "0" ]; then
    echo "- 📝 **Creare README per $missing_readme moduli**" >> reports/action_plan.md
    echo "  - Utilizzare template da module-setup workflow" >> reports/action_plan.md
fi

echo "" >> reports/action_plan.md
echo "### Test Coverage" >> reports/action_plan.md
modules_without_tests=$(find laravel/Modules/ -maxdepth 1 -type d | grep "Modules/[A-Z]" | while read module; do
    if [ ! -d "$module/tests/" ]; then
        echo "$module"
    fi
done | wc -l)

if [ "$modules_without_tests" -gt "0" ]; then
    echo "- 🧪 **Aggiungere test per $modules_without_tests moduli**" >> reports/action_plan.md
    echo "  - Implementare test unitari per Actions e Data" >> reports/action_plan.md
    echo "  - Aggiungere feature test per Resources Filament" >> reports/action_plan.md
fi

# Piano lungo termine
echo "" >> reports/action_plan.md
echo "## Priorità Bassa (1+ Mesi)" >> reports/action_plan.md
echo "" >> reports/action_plan.md

echo "### Performance e Ottimizzazioni" >> reports/action_plan.md
echo "- 🚀 **Implementare caching avanzato**" >> reports/action_plan.md
echo "- 📊 **Aggiungere monitoring e metriche**" >> reports/action_plan.md
echo "- 🔧 **Ottimizzare query database**" >> reports/action_plan.md

echo "" >> reports/action_plan.md
echo "### CI/CD e Automazione" >> reports/action_plan.md
echo "- 🤖 **Implementare GitHub Actions**" >> reports/action_plan.md
echo "- 🪝 **Configurare pre-commit hooks**" >> reports/action_plan.md
echo "- 📦 **Automatizzare deployment**" >> reports/action_plan.md

# Script di esecuzione
echo "" >> reports/action_plan.md
echo "## Script di Esecuzione Rapida" >> reports/action_plan.md
echo "" >> reports/action_plan.md
echo '```bash' >> reports/action_plan.md
echo "# Correzioni immediate" >> reports/action_plan.md
echo ".windsurf/workflows/provider-validation.md" >> reports/action_plan.md
echo ".windsurf/workflows/naming-convention-audit.md" >> reports/action_plan.md
echo "" >> reports/action_plan.md
echo "# Controllo qualità" >> reports/action_plan.md
echo "cd laravel" >> reports/action_plan.md
echo "./vendor/bin/phpstan analyze --level=9" >> reports/action_plan.md
echo "./vendor/bin/php-cs-fixer fix" >> reports/action_plan.md
echo "" >> reports/action_plan.md
echo "# Sincronizzazione documentazione" >> reports/action_plan.md
echo ".windsurf/workflows/documentation-sync.md" >> reports/action_plan.md
echo '```' >> reports/action_plan.md
```

### 6. Create Dashboard
```bash
echo "=== Creating Project Dashboard ==="

cat > reports/project_dashboard.md << 'EOF'

# 🏥 Laraxot Project Health Dashboard

*Ultimo aggiornamento: $(date)*

## 📊 Health Score

EOF

# Include health score
if [ -f "reports/health_score.md" ]; then
    grep "### [0-9]" reports/health_score.md >> reports/project_dashboard.md
    grep "🏆\\|✅\\|⚠️\\|❌\\|🚨" reports/health_score.md | head -n 1 >> reports/project_dashboard.md
fi

echo "" >> reports/project_dashboard.md
echo "## 📈 Metriche Chiave" >> reports/project_dashboard.md
echo "" >> reports/project_dashboard.md

# Statistiche moduli
total_modules=$(find laravel/Modules/ -maxdepth 1 -type d | grep -c "Modules/[A-Z]")
echo "- **Moduli Totali**: $total_modules" >> reports/project_dashboard.md

total_php=$(find laravel/Modules/ -name "*.php" | wc -l)
echo "- **File PHP**: $total_php" >> reports/project_dashboard.md

total_tests=$(find laravel/Modules/ -name "*Test.php" | wc -l)
echo "- **Test Files**: $total_tests" >> reports/project_dashboard.md

total_docs=$(find laravel/Modules/*/docs/ -name "*.md" 2>/dev/null | wc -l)
echo "- **File Documentazione**: $total_docs" >> reports/project_dashboard.md

# Stato providers
echo "" >> reports/project_dashboard.md
echo "## 🔧 Stato Provider" >> reports/project_dashboard.md

wrong_providers=$(find laravel/Modules/*/app/Providers/ -name "*.php" -exec grep -l "extends ServiceProvider" {} \; | grep -v "XotBase" | wc -l)
if [ "$wrong_providers" -eq "0" ]; then
    echo "- ✅ **Tutti i provider estendono XotBase**" >> reports/project_dashboard.md
else
    echo "- ❌ **$wrong_providers provider non XotBase**" >> reports/project_dashboard.md
fi

# Stato naming
echo "" >> reports/project_dashboard.md
echo "## 📝 Stato Naming" >> reports/project_dashboard.md

wrong_docs=$(find docs/ -name "*" | grep '[A-Z]' | grep -v "README.md" | wc -l)
if [ "$wrong_docs" -eq "0" ]; then
    echo "- ✅ **Naming documentazione conforme**" >> reports/project_dashboard.md
else
    echo "- ❌ **$wrong_docs file docs con naming errato**" >> reports/project_dashboard.md
fi

# Stato qualità
echo "" >> reports/project_dashboard.md
echo "## 🔍 Stato Qualità" >> reports/project_dashboard.md

if [ -f "reports/phpstan_report.txt" ]; then
    if grep -q "No errors" reports/phpstan_report.txt; then
        echo "- ✅ **PHPStan livello 9: nessun errore**" >> reports/project_dashboard.md
    else
        phpstan_errors=$(grep -c "ERROR" reports/phpstan_report.txt 2>/dev/null || echo "0")
        echo "- ❌ **PHPStan livello 9: $phpstan_errors errori**" >> reports/project_dashboard.md
    fi
else
    echo "- ❓ **PHPStan: stato non verificato**" >> reports/project_dashboard.md
fi

# Collegamenti rapidi
echo "" >> reports/project_dashboard.md
echo "## 🔗 Collegamenti Rapidi" >> reports/project_dashboard.md
echo "" >> reports/project_dashboard.md
echo "### Report Dettagliati" >> reports/project_dashboard.md
echo "- [📊 Health Score Completo](health_score.md)" >> reports/project_dashboard.md
echo "- [🏗️ Analisi Architettura](provider_validation_report.md)" >> reports/project_dashboard.md
echo "- [🔍 Analisi Qualità Codice](quality_report_final.md)" >> reports/project_dashboard.md
echo "- [📝 Audit Naming](naming_convention_report_final.md)" >> reports/project_dashboard.md
echo "- [📚 Stato Documentazione](link_verification_report.md)" >> reports/project_dashboard.md
echo "" >> reports/project_dashboard.md
echo "### Workflow di Correzione" >> reports/project_dashboard.md
echo "- [🛠️ Provider Validation](.windsurf/workflows/provider-validation.md)" >> reports/project_dashboard.md
echo "- [✨ Code Quality Check](.windsurf/workflows/code-quality-check.md)" >> reports/project_dashboard.md
echo "- [📛 Naming Audit](.windsurf/workflows/naming-convention-audit.md)" >> reports/project_dashboard.md
echo "- [📖 Documentation Sync](.windsurf/workflows/documentation-sync.md)" >> reports/project_dashboard.md
echo "" >> reports/project_dashboard.md
echo "### Piano d'Azione" >> reports/project_dashboard.md
echo "- [📋 Action Plan Dettagliato](action_plan.md)" >> reports/project_dashboard.md

echo "" >> reports/project_dashboard.md
echo "---" >> reports/project_dashboard.md
echo "*Dashboard generato automaticamente dal Project Health Check Workflow*" >> reports/project_dashboard.md
```

### 7. Cleanup and Summary
```bash
echo "=== Cleanup and Summary ==="

# Crea directory reports se non esiste
mkdir -p reports

# Sposta tutti i report nella directory reports
mv *.txt reports/ 2>/dev/null || true
mv *.log reports/ 2>/dev/null || true
mv *.json reports/ 2>/dev/null || true

# Genera summary finale
echo ""
echo "🏥 PROJECT HEALTH CHECK COMPLETATO"
echo "=================================="
echo ""
echo "📊 Report generati in: reports/"
echo "📋 Dashboard principale: reports/project_dashboard.md"
echo "📈 Health Score: reports/health_score.md"
echo "📝 Action Plan: reports/action_plan.md"
echo ""
echo "🔧 Workflow disponibili:"
echo "- .windsurf/workflows/provider-validation.md"
echo "- .windsurf/workflows/code-quality-check.md"
echo "- .windsurf/workflows/naming-convention-audit.md"
echo "- .windsurf/workflows/documentation-sync.md"
echo ""

# Mostra health score se disponibile
if [ -f "reports/health_score.md" ]; then
    echo "🏆 HEALTH SCORE:"
    grep "### [0-9]" reports/health_score.md
    grep "🏆\\|✅\\|⚠️\\|❌\\|🚨" reports/health_score.md | head -n 1
fi

echo ""
echo "✨ Per migliorare il progetto, seguire l'Action Plan in reports/action_plan.md"
```

---

## Checklist Health Check

### Ambiente
- [ ] PHP 8.1+ installato
- [ ] Composer funzionante
- [ ] Laravel configurato
- [ ] Database connesso

### Moduli
- [ ] Tutti i moduli hanno ServiceProvider XotBase
- [ ] Tutti i moduli hanno composer.json
- [ ] Tutti i moduli hanno documentazione base
- [ ] Struttura cartelle conforme

### Qualità
- [ ] PHPStan livello 9 senza errori
- [ ] PSR-12 compliance
- [ ] Naming conventions rispettate
- [ ] Documentazione aggiornata

### Test
- [ ] Test presenti per moduli critici
- [ ] Coverage accettabile
- [ ] Test automatizzati in CI/CD

### Sicurezza
- [ ] Dipendenze aggiornate
- [ ] Nessun pattern insicuro rilevato
- [ ] Configurazione sicura

---

## Automazione Continua

### Scheduling
```bash

# Aggiungi al crontab per controlli giornalieri
0 6 * * * /path/to/project/.windsurf/workflows/project-health-check.md
```

### GitHub Actions
```yaml
name: Daily Health Check
on:
  schedule:
    - cron: '0 6 * * *'
jobs:
  health-check:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      - run: .windsurf/workflows/project-health-check.md
      - uses: actions/upload-artifact@v3
        with:
          name: health-reports
          path: reports/
```

---

## Collegamenti
- [Module Setup Workflow](module-setup.md)
- [Provider Validation Workflow](provider-validation.md)
- [Code Quality Check Workflow](code-quality-check.md)
- [Naming Convention Audit Workflow](naming-convention-audit.md)
