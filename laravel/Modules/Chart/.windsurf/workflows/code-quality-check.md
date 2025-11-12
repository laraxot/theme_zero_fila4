---
name: "Code Quality Check"
description: "Controlli completi di qualità del codice: PHPStan, style, security, performance"
version: "1.0"
author: "Laraxot AI Assistant"
tags: ["laraxot", "quality", "phpstan", "security", "performance", "style"]
---

# Code Quality Check Workflow

Questo workflow automatizza tutti i controlli di qualità del codice per garantire standard elevati, sicurezza e performance.

## Filosofia
- Qualità del codice = serenità del deploy
- Automazione dei controlli = riduzione errori umani
- Standard elevati = manutenzione semplificata

## Religione
- "Non commitare codice senza aver passato tutti i controlli"
- PHPStan livello 9+ è sacro
- Zero warning, zero notice, zero deprecation

## Politica
- Controlli obbligatori prima di ogni commit
- Standard PSR-12 rigorosamente applicati
- Sicurezza come priorità assoluta

## Zen
- Codice pulito = mente serena
- Automazione = tempo per innovare
- Standard = collaborazione fluida

---

## Steps

### 1. Environment Check
```bash

# Verifica ambiente e dipendenze
echo "=== Environment Check ==="
php --version
composer --version

# Verifica presenza strumenti di qualità
if ! command -v vendor/bin/phpstan &> /dev/null; then
    echo "❌ PHPStan non trovato. Installazione..."
    composer require --dev phpstan/phpstan
fi

if ! command -v vendor/bin/php-cs-fixer &> /dev/null; then
    echo "❌ PHP CS Fixer non trovato. Installazione..."
    composer require --dev friendsofphp/php-cs-fixer
fi

if ! command -v vendor/bin/phpunit &> /dev/null; then
    echo "❌ PHPUnit non trovato. Installazione..."
    composer require --dev phpunit/phpunit
fi
```

### 2. PHPStan Analysis (Livello 9+)
```bash
echo "=== PHPStan Analysis ==="
cd laravel

# Analisi globale
echo "Analisi globale (livello 9)..."
./vendor/bin/phpstan analyze --level=9 --memory-limit=2G

# Analisi per modulo
for module in Modules/*/; do
    module_name=$(basename "$module")
    echo "Analizzando modulo $module_name..."
    ./vendor/bin/phpstan analyze "$module" --level=9 --memory-limit=2G
done

# Genera report PHPStan
echo "Generazione report PHPStan..."
./vendor/bin/phpstan analyze --level=9 --memory-limit=2G --error-format=json > ../docs/reports/phpstan_report.json
./vendor/bin/phpstan analyze --level=9 --memory-limit=2G --error-format=table > ../docs/reports/phpstan_report.txt
```

### 3. Code Style Check (PSR-12)
```bash
echo "=== Code Style Check ==="

# Verifica PSR-12 compliance
echo "Controllo PSR-12 compliance..."
./vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.php --dry-run --diff --verbose

# Genera report style
echo "Generazione report style..."
./vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.php --dry-run --format=json > ../docs/reports/style_report.json
```

### 4. Security Analysis
```bash
echo "=== Security Analysis ==="

# Controlla vulnerabilità nelle dipendenze
echo "Controllo vulnerabilità dipendenze..."
composer audit

# Controlla pattern di sicurezza nei moduli
echo "Controllo pattern di sicurezza..."

# SQL Injection patterns
echo "Controllo SQL Injection patterns..."
grep -r "DB::raw\|\\$.*query\|SELECT.*\$\|INSERT.*\$\|UPDATE.*\$\|DELETE.*\$" Modules/ --include="*.php" | grep -v "vendor" > ../docs/reports/sql_injection_patterns.txt

# XSS patterns
echo "Controllo XSS patterns..."
grep -r "{!!\|html_entity_decode\|strip_tags.*false" Modules/ --include="*.php" --include="*.blade.php" > ../docs/reports/xss_patterns.txt

# CSRF patterns
echo "Controllo CSRF patterns..."
grep -r "@csrf\|csrf_token\|_token" Modules/ --include="*.blade.php" > ../docs/reports/csrf_usage.txt

# File upload patterns
echo "Controllo file upload security..."
grep -r "move_uploaded_file\|file_get_contents.*\$_\|fopen.*\$_" Modules/ --include="*.php" > ../docs/reports/file_upload_patterns.txt
```

### 5. Performance Analysis
```bash
echo "=== Performance Analysis ==="

# N+1 Query patterns
echo "Controllo N+1 Query patterns..."
grep -r "foreach.*->.*->" Modules/ --include="*.php" | grep -E "(User::|Post::|Model::)" > ../docs/reports/n_plus_one_patterns.txt

# Memory usage patterns
echo "Controllo memory usage patterns..."
grep -r "memory_get_usage\|ini_set.*memory\|->chunk\|->get()" Modules/ --include="*.php" > ../docs/reports/memory_patterns.txt

# Eager loading check
echo "Controllo eager loading..."
grep -r "::with\|->with\|->load" Modules/ --include="*.php" > ../docs/reports/eager_loading_usage.txt

# Cache usage patterns
echo "Controllo cache usage..."
grep -r "Cache::\|->cache\|->remember" Modules/ --include="*.php" > ../docs/reports/cache_usage.txt
```

### 6. Architecture Compliance
```bash
echo "=== Architecture Compliance ==="

# Verifica estensioni XotBase
echo "Controllo estensioni XotBase..."
grep -r "extends.*Resource" Modules/*/app/Filament/ --include="*.php" | grep -v "XotBase" > ../docs/reports/wrong_filament_extensions.txt
grep -r "extends.*ServiceProvider" Modules/*/app/Providers/ --include="*.php" | grep -v "XotBase" > ../docs/reports/wrong_provider_extensions.txt

# Verifica namespace patterns
echo "Controllo namespace patterns..."
grep -r "namespace.*App\\" Modules/ --include="*.php" > ../docs/reports/wrong_namespaces.txt

# Verifica import patterns
echo "Controllo import patterns..."
grep -r "use.*App\\" Modules/ --include="*.php" > ../docs/reports/wrong_imports.txt

# Verifica trait usage
echo "Controllo trait usage..."
grep -r "use.*Trait" Modules/ --include="*.php" > ../docs/reports/trait_usage.txt
```

### 7. Testing Coverage
```bash
echo "=== Testing Coverage ==="

# Esegui test con coverage
echo "Esecuzione test con coverage..."
./vendor/bin/phpunit --coverage-html ../docs/reports/coverage --coverage-text

# Verifica presenza test per moduli
echo "Controllo presenza test..."
for module in Modules/*/; do
    module_name=$(basename "$module")
    if [ -d "$module/tests/" ]; then
        test_count=$(find "$module/tests/" -name "*Test.php" | wc -l)
        echo "✅ $module_name: $test_count test files"
    else
        echo "❌ $module_name: nessun test trovato"
    fi
done > ../docs/reports/test_coverage_summary.txt
```

### 8. Dependencies Analysis
```bash
echo "=== Dependencies Analysis ==="

# Analizza dipendenze
echo "Analisi dipendenze..."
composer show --tree > ../docs/reports/dependencies_tree.txt
composer show --latest > ../docs/reports/dependencies_latest.txt

# Verifica dipendenze obsolete
echo "Controllo dipendenze obsolete..."
composer outdated > ../docs/reports/dependencies_outdated.txt

# Verifica dipendenze di sicurezza
echo "Controllo sicurezza dipendenze..."
composer audit --format=json > ../docs/reports/dependencies_security.json
```

### 9. Generate Quality Report
```bash
echo "=== Generating Quality Report ==="

# Crea report completo
cat > ../docs/reports/quality_report.md << 'EOF'

# Code Quality Report

Data generazione: $(date)

## Sommario Controlli

### PHPStan (Livello 9)
```bash
if [ -f "../docs/reports/phpstan_report.txt" ]; then
    if grep -q "No errors" ../docs/reports/phpstan_report.txt; then
        echo "✅ PHPStan: Nessun errore"
    else
        error_count=$(grep -c "ERROR" ../docs/reports/phpstan_report.txt || echo "0")
        echo "❌ PHPStan: $error_count errori trovati"
    fi
else
    echo "❌ PHPStan: Report non generato"
fi
```

### Code Style (PSR-12)
```bash
if [ -f "../docs/reports/style_report.json" ]; then
    if [ -s "../docs/reports/style_report.json" ]; then
        echo "❌ Code Style: Violazioni trovate"
    else
        echo "✅ Code Style: PSR-12 compliant"
    fi
else
    echo "❌ Code Style: Report non generato"
fi
```

### Security Checks
```bash
if [ -f "../docs/reports/sql_injection_patterns.txt" ]; then
    sql_patterns=$(wc -l < ../docs/reports/sql_injection_patterns.txt)
    if [ "$sql_patterns" -gt "0" ]; then
        echo "⚠️ Security: $sql_patterns pattern SQL potenzialmente insicuri"
    else
        echo "✅ Security: Nessun pattern SQL insicuro trovato"
    fi
fi

if [ -f "../docs/reports/xss_patterns.txt" ]; then
    xss_patterns=$(wc -l < ../docs/reports/xss_patterns.txt)
    if [ "$xss_patterns" -gt "0" ]; then
        echo "⚠️ Security: $xss_patterns pattern XSS potenzialmente insicuri"
    else
        echo "✅ Security: Nessun pattern XSS insicuro trovato"
    fi
fi
```

### Performance Checks
```bash
if [ -f "../docs/reports/n_plus_one_patterns.txt" ]; then
    n_plus_one=$(wc -l < ../docs/reports/n_plus_one_patterns.txt)
    if [ "$n_plus_one" -gt "0" ]; then
        echo "⚠️ Performance: $n_plus_one potenziali problemi N+1"
    else
        echo "✅ Performance: Nessun problema N+1 rilevato"
    fi
fi
```

### Architecture Compliance
```bash
if [ -f "../docs/reports/wrong_filament_extensions.txt" ]; then
    wrong_extensions=$(wc -l < ../docs/reports/wrong_filament_extensions.txt)
    if [ "$wrong_extensions" -gt "0" ]; then
        echo "❌ Architecture: $wrong_extensions estensioni Filament non XotBase"
    else
        echo "✅ Architecture: Tutte le estensioni Filament sono XotBase"
    fi
fi
```

## Raccomandazioni

### Errori Critici da Correggere
- Correggere tutti gli errori PHPStan livello 9
- Risolvere violazioni PSR-12
- Correggere estensioni non XotBase

### Miglioramenti Suggeriti
- Aggiungere test per moduli senza coverage
- Ottimizzare query con problemi N+1
- Aggiornare dipendenze obsolete

### Prossimi Passi
- Implementare CI/CD con questi controlli
- Aggiungere pre-commit hooks
- Configurare monitoring continuo

EOF

# Esegui il report
bash ../docs/reports/quality_report.md > ../docs/reports/quality_report_final.md
```

### 10. Fix Common Issues
```bash
echo "=== Automatic Fixes ==="

# Fix code style automaticamente
echo "Fixing code style..."
./vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.php

# Fix namespace issues
echo "Fixing namespace issues..."
for file in $(grep -l "namespace.*App\\" Modules/ --include="*.php"); do
    # Correggi namespace errati
    module=$(echo "$file" | cut -d'/' -f2)
    correct_namespace=$(echo "$file" | sed "s|Modules/$module/app/|Modules\\\\$module\\\\|" | sed 's|/|\\\\|g' | sed 's|\\\\.php||')
    
    echo "Correggendo namespace in $file -> $correct_namespace"
    # Implementa correzione automatica qui
done

# Remove unused imports
echo "Removing unused imports..."

# Implementa rimozione import inutili
```

---

## Checklist Qualità

### PHPStan
- [ ] Livello 9+ senza errori
- [ ] Tipizzazione completa
- [ ] Nessun mixed type
- [ ] Documentazione PHPDoc completa

### Code Style
- [ ] PSR-12 compliant
- [ ] Naming conventions rispettate
- [ ] Indentazione corretta
- [ ] Import ordinati e ottimizzati

### Security
- [ ] Nessun pattern SQL injection
- [ ] Output correttamente escaped
- [ ] CSRF protection implementata
- [ ] File upload sicuri
- [ ] Validazione input completa

### Performance
- [ ] Nessun problema N+1
- [ ] Eager loading implementato
- [ ] Cache utilizzata appropriatamente
- [ ] Query ottimizzate

### Architecture
- [ ] Estensioni XotBase corrette
- [ ] Namespace conformi
- [ ] Trait utilizzati appropriatamente
- [ ] Dipendenze aggiornate

### Testing
- [ ] Coverage > 80%
- [ ] Test per funzionalità critiche
- [ ] Test per edge cases
- [ ] Integration test implementati

---

## Configurazione CI/CD

### GitHub Actions
```yaml
name: Quality Checks
on: [push, pull_request]
jobs:
  quality:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      - uses: shivammathur/setup-php@v2
        with:
          php-version: '8.1'
      - run: composer install
      - run: .windsurf/workflows/code-quality-check.md
```

### Pre-commit Hook
```bash
#!/bin/sh

# .git/hooks/pre-commit
cd laravel
./vendor/bin/phpstan analyze --level=9 --memory-limit=2G
./vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.php --dry-run
```

---

## Collegamenti
- [PHPStan Configuration](../rules/phpstan_configuration.mdc)
- [Laravel 12 Best Practices](../rules/laravel12.mdc)
- [Security Guidelines](../rules/security_guidelines.mdc)
