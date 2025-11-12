---
name: "Test SaluteMo Module"
description: "Esegui test completi per il modulo SaluteMo, inclusi test unitari, feature e integrazione"
version: "1.0"
author: "Laraxot AI Assistant"
tags: ["salutemo", "testing", "phpunit", "pest"]
---

# Test del Modulo SaluteMo

Workflow completo per eseguire test sul modulo SaluteMo, garantendo qualità e stabilità del codice.

## 🎯 Scopo

Eseguire una suite completa di test per il modulo SaluteMo, inclusi:
- Test unitari
- Test di integrazione
- Test di feature
- Test di sicurezza
- Verifica delle rotte

## Prerequisiti

- PHP 8.2+
- Composer
- Estensioni PHP richieste: pdo, pdo_mysql, mbstring, xml, ctype, json, tokenizer
- Database configurato per i test

## 🚀 Esecuzione dei Test

### 1. Preparazione Ambiente

```bash

# Assicurati di essere nella directory corretta
cd /var/www/html/_bases/base_saluteora/laravel

# Installa le dipendenze se necessario
composer install

# Pubblica i file di configurazione
php artisan vendor:publish --tag=config

# Genera la chiave dell'applicazione
php artisan key:generate

# Esegui le migrazioni per i test
php artisan migrate:fresh --seed --env=testing
```

### 2. Esecuzione Test Unitari

```bash

# Esegui tutti i test unitari del modulo SaluteMo
php artisan test Modules/SaluteMo/tests/Unit

# Esegui un singolo test

# php artisan test Modules/SaluteMo/tests/Unit/ExampleTest.php
```

### 3. Esecuzione Test di Feature

```bash

# Esegui tutti i test di feature del modulo SaluteMo
php artisan test Modules/SaluteMo/tests/Feature

# Esegui un singolo test di feature

# php artisan test Modules/SaluteMo/tests/Feature/ExampleFeatureTest.php
```

### 4. Test di Integrazione

```bash

# Esegui i test di integrazione
php artisan test Modules/SaluteMo/tests/Integration
```

### 5. Test di Sicurezza

```bash

# Verifica le vulnerabilità di sicurezza con PHP Security Checker
if ! command -v local-php-security-checker &> /dev/null; then
    echo "Installazione di PHP Security Checker..."
    wget https://github.com/fabpot/local-php-security-checker/releases/download/v2.0.5/local-php-security-checker_2.0.5_linux_amd64 -O local-php-security-checker
    chmod +x local-php-security-checker
    sudo mv local-php-security-checker /usr/local/bin/
fi

local-php-security-checker --path=/var/www/html/_bases/base_saluteora/laravel
```

## 🔍 Analisi Codice

### 1. PHPStan (Analisi Statica)

```bash

# Esegui PHPStan sul modulo SaluteMo
./vendor/bin/phpstan analyse Modules/SaluteMo --level=9
```

### 2. PHP CS Fixer (Formattazione Codice)

```bash

# Verifica problemi di formattazione
./vendor/bin/php-cs-fixer fix --dry-run --diff Modules/SaluteMo

# Correggi automaticamente i problemi

# ./vendor/bin/php-cs-fixer fix Modules/SaluteMo
```

## 📊 Copertura del Codice

```bash

# Genera report di copertura
XDEBUG_MODE=coverage php artisan test --coverage-html=coverage-report Modules/SaluteMo

# Apri il report nel browser
xdg-open coverage-report/index.html
```

## 🐛 Debug

### Abilita il Debug

```bash

# Modifica il file .env.testing
cp .env .env.testing

# Abilita il debug
sed -i 's/APP_DEBUG=.*/APP_DEBUG=true/' .env.testing
sed -i 's/APP_ENV=.*/APP_ENV=testing/' .env.testing
```

### Visualizza i Log

```bash

# Monitora i log in tempo reale
tail -f storage/logs/laravel-$(date +'%Y-%m-%d').log
```

## 🛠️ Strumenti Aggiuntivi

### 1. Genera Report di Copertura

```bash

# Installa le dipendenze per il report HTML
composer require --dev phpunit/php-code-coverage

# Genera report di copertura
XDEBUG_MODE=coverage php artisan test --coverage-html=coverage-report
```

### 2. Analisi della Qualità con PHP Insights

```bash

# Installa PHP Insights
composer require nunomaduro/phpinsights --dev

# Esegui PHP Insights sul modulo
php artisan phpinsights Modules/SaluteMo
```

## 🔄 Integrazione Continua

### GitHub Actions

Crea un file `.github/workflows/test-salutemo.yml` con il seguente contenuto:

```yaml
name: Test SaluteMo Module

on:
  push:
    paths:
      - 'Modules/SaluteMo/**'
  pull_request:
    paths:
      - 'Modules/SaluteMo/**'

jobs:
  test:
    runs-on: ubuntu-latest
    
    services:
      mysql:
        image: mysql:8.0
        env:
          MYSQL_ROOT_PASSWORD: password
          MYSQL_DATABASE: test_db
        ports:
          - 3306:3306
        options: >-
          --health-cmd "mysqladmin ping"
          --health-interval 10s
          --health-timeout 5s
          --health-retries 3

    steps:
    - uses: actions/checkout@v3
    
    - name: Setup PHP
      uses: shivammathur/setup-php@v2
      with:
        php-version: '8.2'
        extensions: mbstring, xml, ctype, json, tokenizer, pdo, pdo_mysql
        coverage: xdebug
    
    - name: Install Dependencies
      run: |
        composer install --prefer-dist --no-interaction
        cp .env.example .env
        php artisan key:generate
    
    - name: Prepare Test Environment
      run: |
        touch database/database.sqlite
        cp .env .env.testing
        echo "DB_CONNECTION=sqlite" >> .env.testing
        echo "DB_DATABASE=database/database.sqlite" >> .env.testing
        php artisan config:clear
    
    - name: Execute Tests
      run: |
        php artisan migrate:fresh --env=testing
        php artisan test --env=testing Modules/SaluteMo
    
    - name: Code Coverage
      if: success()
      run: |
        XDEBUG_MODE=coverage php artisan test --coverage-clover=coverage.xml Modules/SaluteMo
    
    - name: Upload Coverage to Codecov
      uses: codecov/codecov-action@v3
      with:
        token: ${{ secrets.CODECOV_TOKEN }}
        file: coverage.xml
        fail_ci_if_error: true
```

## 📝 Report

Dopo l'esecuzione dei test, vengono generati i seguenti report:

1. **PHPUnit**: `./storage/logs/phpunit.log`
2. **PHPStan**: `./storage/logs/phpstan.log`
3. **PHP CS Fixer**: `./storage/logs/php-cs-fixer.log`
4. **Copertura Codice**: `./coverage-report/`
5. **Sicurezza**: `./security-checker-report.json`

## 🔄 Automazione

Per eseguire tutti i test in un unico comando, aggiungi questo script al tuo `composer.json`:

```json
"scripts": {
    "test:salutemo": [
        "@php artisan test Modules/SaluteMo/tests/Unit",
        "@php artisan test Modules/SaluteMo/tests/Feature",
        "@php artisan test Modules/SaluteMo/tests/Integration",
        "./vendor/bin/phpstan analyse Modules/SaluteMo --level=9",
        "./vendor/bin/php-cs-fixer fix --dry-run --diff Modules/SaluteMo"
    ]
}
```

Esegui con:
```bash
composer test:salutemo
```

## 📚 Risorse

- [Documentazione PHPUnit](https://phpunit.readthedocs.io/)
- [PHPStan - PHP Static Analysis Tool](https://phpstan.org/)
- [PHP CS Fixer](https://cs.symfony.com/)
- [Laravel Testing](https://laravel.com/docs/testing)
- [Pest PHP](https://pestphp.com/)

## 📅 Manutenzione

Questo workflow viene aggiornato regolarmente per includere nuovi controlli e miglioramenti. Si prega di verificare periodicamente gli aggiornamenti.

---

*Ultimo aggiornamento: 4 Giugno 2025*  
*Versione: 1.0*  
*Autore: Laraxot AI Assistant*
