---
name: "Provider Validation"
description: "Valida che tutti i ServiceProvider seguano la filosofia, religione, politica e zen XotBase"
version: "1.0"
author: "Laraxot AI Assistant"
tags: ["laraxot", "provider", "validation", "xotbase", "quality"]
---

# Provider Validation Workflow

Questo workflow automatizza la validazione di tutti i ServiceProvider per garantire che seguano le regole XotBase.

## Filosofia
- Centralizzazione, DRY, refactoring sicuro
- Un solo punto di verità, nessuna duplicazione
- Override solo per logica realmente custom

## Religione
- "Non avrai altro provider all'infuori di XotBase..."
- La catena di ereditarietà è sacra
- Ogni deviazione va motivata e documentata

## Politica
- Tutti i provider DEVONO estendere le rispettive classi base Xot
- Vietato estendere direttamente provider Laravel
- Non ridefinire $namespace (deprecato in Laravel 12+)

## Zen
- Serenità del codice, onboarding immediato
- Nessuna sorpresa, nessun comportamento inatteso
- Refactoring senza paura

---

## Steps

### 1. Scan All ServiceProviders
```bash
find laravel/Modules -name "*ServiceProvider.php" -type f
```

### 2. Check ServiceProvider Extensions
```bash

# Controlla che non estendano direttamente ServiceProvider Laravel
grep -r "extends ServiceProvider" laravel/Modules/*/app/Providers/ --include="*ServiceProvider.php" | grep -v "XotBase"

# Controlla che estendano XotBaseServiceProvider
grep -r "extends XotBaseServiceProvider" laravel/Modules/*/app/Providers/ --include="*ServiceProvider.php"
```

### 3. Check RouteServiceProvider Extensions
```bash

# Controlla che non estendano direttamente RouteServiceProvider Laravel
grep -r "extends RouteServiceProvider" laravel/Modules/*/app/Providers/ --include="RouteServiceProvider.php" | grep -v "XotBase"

# Controlla che estendano XotBaseRouteServiceProvider
grep -r "extends XotBaseRouteServiceProvider" laravel/Modules/*/app/Providers/ --include="RouteServiceProvider.php"
```

### 4. Check EventServiceProvider Extensions
```bash

# Controlla che non estendano direttamente EventServiceProvider Laravel
grep -r "extends EventServiceProvider" laravel/Modules/*/app/Providers/ --include="EventServiceProvider.php" | grep -v "XotBase"

# Controlla che estendano XotBaseEventServiceProvider
grep -r "extends XotBaseEventServiceProvider" laravel/Modules/*/app/Providers/ --include="EventServiceProvider.php"
```

### 5. Check Forbidden $namespace Property
```bash

# Controlla la proprietà $namespace vietata (causa errori in Laravel 12+)
grep -r "protected.*\$namespace" laravel/Modules/*/app/Providers/RouteServiceProvider.php
grep -r "public.*\$namespace" laravel/Modules/*/app/Providers/RouteServiceProvider.php
```

### 6. Check Required Properties
```bash

# Controlla presenza proprietà $name pubblica
grep -r "public.*\$name" laravel/Modules/*/app/Providers/ --include="*ServiceProvider.php"

# Controlla presenza proprietà $nameLower pubblica
grep -r "public.*\$nameLower" laravel/Modules/*/app/Providers/ --include="*ServiceProvider.php"
```

### 7. Check Parent Calls
```bash

# Controlla che boot() chiami parent::boot()
grep -A 5 "public function boot" laravel/Modules/*/app/Providers/ --include="*ServiceProvider.php" | grep "parent::boot"

# Controlla che register() chiami parent::register()
grep -A 5 "public function register" laravel/Modules/*/app/Providers/ --include="*ServiceProvider.php" | grep "parent::register"
```

### 8. Check declare(strict_types=1)
```bash

# Controlla presenza di declare(strict_types=1)
head -n 5 laravel/Modules/*/app/Providers/*.php | grep "declare(strict_types=1)"
```

### 9. Check Namespace Consistency
```bash

# Controlla namespace corretti (senza segmento 'app')
grep -r "namespace.*App" laravel/Modules/*/app/Providers/ --include="*.php"
```

### 10. Generate Validation Report
```bash

# Crea report di validazione
echo "# Provider Validation Report" > provider_validation_report.md
echo "Data: $(date)" >> provider_validation_report.md
echo "" >> provider_validation_report.md

# Conta provider per tipo
echo "## Statistiche" >> provider_validation_report.md
echo "ServiceProvider trovati: $(find laravel/Modules -name "*ServiceProvider.php" -type f | wc -l)" >> provider_validation_report.md
echo "RouteServiceProvider trovati: $(find laravel/Modules -name "RouteServiceProvider.php" -type f | wc -l)" >> provider_validation_report.md
echo "EventServiceProvider trovati: $(find laravel/Modules -name "EventServiceProvider.php" -type f | wc -l)" >> provider_validation_report.md
echo "" >> provider_validation_report.md

# Controlla conformità
echo "## Errori Critici" >> provider_validation_report.md

# Provider che non estendono XotBase
WRONG_EXTENSIONS=$(grep -r "extends ServiceProvider" laravel/Modules/*/app/Providers/ --include="*ServiceProvider.php" | grep -v "XotBase" | wc -l)
if [ $WRONG_EXTENSIONS -gt 0 ]; then
    echo "❌ $WRONG_EXTENSIONS provider estendono direttamente ServiceProvider Laravel" >> provider_validation_report.md
    grep -r "extends ServiceProvider" laravel/Modules/*/app/Providers/ --include="*ServiceProvider.php" | grep -v "XotBase" >> provider_validation_report.md
else
    echo "✅ Tutti i ServiceProvider estendono XotBase" >> provider_validation_report.md
fi

# RouteProvider che non estendono XotBase
WRONG_ROUTE_EXTENSIONS=$(grep -r "extends RouteServiceProvider" laravel/Modules/*/app/Providers/ --include="RouteServiceProvider.php" | grep -v "XotBase" | wc -l)
if [ $WRONG_ROUTE_EXTENSIONS -gt 0 ]; then
    echo "❌ $WRONG_ROUTE_EXTENSIONS RouteServiceProvider estendono direttamente Laravel" >> provider_validation_report.md
    grep -r "extends RouteServiceProvider" laravel/Modules/*/app/Providers/ --include="RouteServiceProvider.php" | grep -v "XotBase" >> provider_validation_report.md
else
    echo "✅ Tutti i RouteServiceProvider estendono XotBase" >> provider_validation_report.md
fi

# Proprietà $namespace vietata
NAMESPACE_VIOLATIONS=$(grep -r "\$namespace" laravel/Modules/*/app/Providers/RouteServiceProvider.php | wc -l)
if [ $NAMESPACE_VIOLATIONS -gt 0 ]; then
    echo "❌ $NAMESPACE_VIOLATIONS RouteServiceProvider hanno proprietà \$namespace vietata" >> provider_validation_report.md
    grep -r "\$namespace" laravel/Modules/*/app/Providers/RouteServiceProvider.php >> provider_validation_report.md
else
    echo "✅ Nessun RouteServiceProvider ha proprietà \$namespace vietata" >> provider_validation_report.md
fi

echo "" >> provider_validation_report.md
echo "## Raccomandazioni" >> provider_validation_report.md
echo "- Correggere tutti gli errori critici sopra elencati" >> provider_validation_report.md
echo "- Aggiornare la documentazione dei moduli interessati" >> provider_validation_report.md
echo "- Eseguire PHPStan livello 9+ per validazione finale" >> provider_validation_report.md
echo "- Aggiornare file .mdc con nuove regole se necessario" >> provider_validation_report.md

cat provider_validation_report.md
```

---

## Checklist di Validazione

### ServiceProvider
- [ ] Estende XotBaseServiceProvider (mai ServiceProvider direttamente)
- [ ] Ha proprietà pubblica $name
- [ ] Ha proprietà pubblica $nameLower (se richiesta)
- [ ] boot() chiama parent::boot() se presente
- [ ] register() chiama parent::register() se presente
- [ ] Ha declare(strict_types=1) in testa
- [ ] Namespace corretto (senza segmento 'app')
- [ ] PHPDoc completo per classe e metodi

### RouteServiceProvider
- [ ] Estende XotBaseRouteServiceProvider (mai RouteServiceProvider direttamente)
- [ ] NON ha proprietà $namespace (vietata in Laravel 12+)
- [ ] Ha proprietà pubblica $name
- [ ] Usa $moduleNamespace solo se serve override avanzato
- [ ] Ha declare(strict_types=1) in testa
- [ ] Namespace corretto
- [ ] PHPDoc completo

### EventServiceProvider
- [ ] Estende XotBaseEventServiceProvider (mai EventServiceProvider direttamente)
- [ ] Ha declare(strict_types=1) in testa
- [ ] Namespace corretto
- [ ] PHPDoc completo

### Generali
- [ ] Nessuna duplicazione di metodi già gestiti dalla base
- [ ] Override solo per logica custom, sempre dopo parent
- [ ] Documentazione aggiornata in docs/ modulo
- [ ] File .mdc aggiornati in .cursor/rules e .windsurf/rules

---

## Correzioni Automatiche

### Fix ServiceProvider Extension
```bash

# Trova e correggi provider che estendono ServiceProvider Laravel
for file in $(grep -l "extends ServiceProvider" laravel/Modules/*/app/Providers/*ServiceProvider.php | grep -v "XotBase"); do
    sed -i 's/extends ServiceProvider/extends XotBaseServiceProvider/g' "$file"
    sed -i 's/use Illuminate\\Support\\ServiceProvider;/use Modules\\Xot\\Providers\\XotBaseServiceProvider;/g' "$file"
done
```

### Fix RouteServiceProvider Extension
```bash

# Trova e correggi RouteServiceProvider che estendono Laravel
for file in $(grep -l "extends RouteServiceProvider" laravel/Modules/*/app/Providers/RouteServiceProvider.php | grep -v "XotBase"); do
    sed -i 's/extends RouteServiceProvider/extends XotBaseRouteServiceProvider/g' "$file"
    sed -i 's/use Illuminate\\Foundation\\Support\\Providers\\RouteServiceProvider;/use Modules\\Xot\\Providers\\XotBaseRouteServiceProvider;/g' "$file"
done
```

### Remove $namespace Property
```bash

# Rimuovi proprietà $namespace vietata
for file in laravel/Modules/*/app/Providers/RouteServiceProvider.php; do
    sed -i '/protected.*\$namespace/d' "$file"
    sed -i '/public.*\$namespace/d' "$file"
done
```

---

## Collegamenti
- [Provider XotBase Philosophy](../rules/provider_xotbase_philosophy.mdc)
- [Laravel 12 Best Practices](../rules/laravel12.mdc)
- [Naming Conventions](../rules/naming_conventions.mdc)
