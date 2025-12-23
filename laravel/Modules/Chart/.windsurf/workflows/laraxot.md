---
name: "Laraxot Workflows Overview"
description: "Panoramica completa di tutti i workflow automatizzati per il progetto Laraxot"
version: "2.0"
author: "Laraxot AI Assistant"
tags: ["laraxot", "overview", "automation", "workflows"]
---

# Laraxot Workflows - Panoramica Completa

Questo documento fornisce una panoramica di tutti i workflow automatizzati disponibili per il progetto Laraxot, basati su filosofia, religione, politica e zen definiti.

## 🎯 Filosofia, Religione, Politica, Zen

### Filosofia

- **Centralizzazione**: Un solo punto di verità, nessuna duplicazione
- **Automazione**: Riduzione errori umani, controlli continui
- **DRY**: Don't Repeat Yourself, refactoring sicuro
- **Onboarding**: Immediato per nuovi sviluppatori

### Religione

- "Non avrai altro provider all'infuori di XotBase..."
- "Non avrai file maiuscolo in docs/ all'infuori di README.md"
- PHPStan livello 9+ è sacro
- La catena di ereditarietà è sacra

### Politica

- Standard elevati non negoziabili
- Controlli obbligatori prima di ogni commit
- Estensioni XotBase obbligatorie per tutti i provider
- English naming conventions rigorose

### Zen

- Serenità del codice = serenità del deploy
- Automazione = tempo per innovare
- Standard = collaborazione fluida
- Qualità = manutenzione serena

---

## 🚀 Workflow Disponibili

### 1. 🏗️ Module Setup Workflow

**File**: `module-setup.md`  
**Scopo**: Creazione automatica di un nuovo modulo Laraxot completo

**Caratteristiche**:

- Struttura directory completa
- ServiceProvider XotBase conformi
- Filament Dashboard pronto
- composer.json e module.json configurati
- Documentazione base
- Route e traduzioni iniziali

**Quando usare**: Per ogni nuovo modulo del progetto

**Esempio**:

```bash
.windsurf/workflows/module-setup.md

# Seguire le istruzioni per inserire nome modulo
```

---

### 2. 🔧 Provider Validation Workflow
**File**: `provider-validation.md`  
**Scopo**: Validazione completa di tutti i ServiceProvider per conformità XotBase

**Caratteristiche**:
- Controllo estensioni XotBase
- Verifica proprietà obbligatorie
- Rilevazione errori Laravel 12+ (es. $namespace deprecato)
- Correzioni automatiche disponibili
- Report dettagliato con statistiche

**Quando usare**: Prima di ogni commit, daily checks

**Esempio**:

```bash
.windsurf/workflows/provider-validation.md
```

---

### 3. 📝 Naming Convention Audit Workflow
**File**: `naming-convention-audit.md`  
**Scopo**: Audit completo delle convenzioni di naming (file, classi, database, etc.)

**Caratteristiche**:
- Controllo naming file e directory
- Verifica convenzioni classi (PascalCase)
- Audit database (snake_case)
- Controllo namespace e import
- Correzioni automatiche per molti pattern

**Quando usare**: Settimanalmente, prima di release

**Esempio**:
```bash
.windsurf/workflows/naming-convention-audit.md
```

---

### 4. 📚 Documentation Sync Workflow
**File**: `documentation-sync.md`  
**Scopo**: Sincronizzazione e validazione della documentazione tra moduli e root

**Caratteristiche**:
- Controllo naming documentazione (lowercase)
- Verifica link bidirezionali
- Sincronizzazione .mdc tra .cursor e .windsurf
- Generazione indici automatici
- Fix automatico dei link rotti

**Quando usare**: Dopo modifiche alla documentazione, prima di release

**Esempio**:
```bash
.windsurf/workflows/documentation-sync.md
```

---

### 5. 🔍 Code Quality Check Workflow
**File**: `code-quality-check.md`  
**Scopo**: Controlli completi di qualità del codice (PHPStan, style, security, performance)

**Caratteristiche**:
- PHPStan livello 9+ analysis
- PSR-12 compliance check
- Security pattern analysis
- Performance issue detection
- Test coverage verification
- Automatic fixes disponibili

**Quando usare**: Prima di ogni commit, CI/CD pipeline

**Esempio**:
```bash
.windsurf/workflows/code-quality-check.md
```

---

### 6. 🏥 Project Health Check Workflow
**File**: `project-health-check.md`  
**Scopo**: Controllo completo dello stato di salute del progetto con dashboard unificato

**Caratteristiche**:
- Esecuzione di tutti gli altri workflow
- Calcolo Health Score (0-100)
- Dashboard con metriche chiave
- Action Plan prioritizzato
- Report unificato con raccomandazioni

**Quando usare**: Daily checks, prima di release, monitoring continuo

**Esempio**:
```bash
.windsurf/workflows/project-health-check.md
```

---

## 📊 Health Score Methodology

Il Project Health Check calcola un punteggio su 100 basato su:

- **Architettura** (25%): Conformità XotBase, struttura moduli
- **Qualità Codice** (25%): PHPStan, PSR-12, sicurezza
- **Naming Conventions** (20%): Convenzioni nomenclatura
- **Documentazione** (15%): Completezza e coerenza
- **Test Coverage** (15%): Presenza e copertura test

### Classificazione
- 🏆 **90-100**: ECCELLENTE
- ✅ **75-89**: BUONO
- ⚠️ **60-74**: SUFFICIENTE
- ❌ **40-59**: INSUFFICIENTE
- 🚨 **0-39**: CRITICO

---

## 🔄 Workflow di Utilizzo Raccomandato

### Daily Routine
```bash

# 1. Health check giornaliero
.windsurf/workflows/project-health-check.md

# 2. Se health score < 80, eseguire correzioni immediate
.windsurf/workflows/provider-validation.md
.windsurf/workflows/code-quality-check.md
```

### Before Commit
```bash

# 1. Provider validation
.windsurf/workflows/provider-validation.md

# 2. Code quality check
.windsurf/workflows/code-quality-check.md

# 3. Documentation sync se modificata
.windsurf/workflows/documentation-sync.md
```

### Weekly Maintenance
```bash

# 1. Naming convention audit
.windsurf/workflows/naming-convention-audit.md

# 2. Complete health check
.windsurf/workflows/project-health-check.md

# 3. Update documentation
.windsurf/workflows/documentation-sync.md
```

### New Module Creation
```bash

# 1. Setup nuovo modulo
.windsurf/workflows/module-setup.md

# 2. Validation immediata
.windsurf/workflows/provider-validation.md

# 3. Documentation update
.windsurf/workflows/documentation-sync.md
```

---

## 🔧 Configurazione Automazione

### GitHub Actions (Raccomandato)
```yaml
name: Laraxot Quality Gates
on: [push, pull_request]
jobs:
  quality-check:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      - uses: shivammathur/setup-php@v2
        with:
          php-version: '8.1'
      - run: composer install
      - run: .windsurf/workflows/provider-validation.md
      - run: .windsurf/workflows/code-quality-check.md
      - run: .windsurf/workflows/naming-convention-audit.md
```

### Pre-commit Hook
```bash
#!/bin/sh

# .git/hooks/pre-commit
.windsurf/workflows/provider-validation.md
.windsurf/workflows/code-quality-check.md
```

### Cron Jobs
```bash

# Daily health check
0 6 * * * /path/to/project/.windsurf/workflows/project-health-check.md

# Weekly full audit
0 6 * * 1 /path/to/project/.windsurf/workflows/naming-convention-audit.md
```

---

## 📋 Checklist Generale

### Setup Iniziale
- [ ] Tutti i workflow testati e funzionanti
- [ ] GitHub Actions configurate
- [ ] Pre-commit hooks installati
- [ ] Cron jobs configurati
- [ ] Team formato sull'utilizzo

### Utilizzo Quotidiano
- [ ] Health check eseguito
- [ ] Score > 80 mantenuto
- [ ] Errori critici risolti immediatamente
- [ ] Documentazione aggiornata

### Manutenzione Settimanale
- [ ] Naming audit eseguito
- [ ] Full health check completato
- [ ] Action plan rivisto e aggiornato
- [ ] Metriche di qualità monitorate

---

## 🔗 Risorse e Collegamenti

### File Workflow
- [📁 Module Setup](module-setup.md)
- [🔧 Provider Validation](provider-validation.md)
- [📝 Naming Convention Audit](naming-convention-audit.md)
- [📚 Documentation Sync](documentation-sync.md)
- [🔍 Code Quality Check](code-quality-check.md)
- [🏥 Project Health Check](project-health-check.md)

### Regole e Standards
- [Provider XotBase Philosophy](../rules/provider_xotbase_philosophy.mdc)
- [Naming Conventions](../rules/naming_conventions.mdc)
- [Laravel 12 Best Practices](../rules/laravel12.mdc)
- [Filament Best Practices](../rules/filament-best-practices.mdc)

### Documentazione Progetto
- [Project README](../../docs/README.md)
- [Architecture Overview](../../docs/architecture.md)
- [Development Guidelines](../../docs/development_guidelines.md)

---

## 🎉 Filosofia del Successo

> "L'automazione non sostituisce la competenza, la potenzia.  
> I workflow non sostituiscono il pensiero, lo guidano.  
> La qualità non è un'attività, è una cultura."

### Principi di Eccellenza
1. **Automazione Intelligente**: Automatizzare le attività ripetitive, non il pensiero creativo
2. **Feedback Continuo**: Ogni workflow fornisce insight actionable
3. **Miglioramento Continuo**: Ogni esecuzione porta a un codice migliore
4. **Team Empowerment**: Gli strumenti permettono al team di eccellere

### Risultati Attesi
- 🚀 **Produttività**: Riduzione 70% tempo per setup e controlli
- 🔒 **Qualità**: Mantenimento costante di standard elevati
- 😌 **Serenità**: Deploy senza paura, refactoring sicuro
- 👥 **Collaborazione**: Onboarding rapido, standard condivisi

---

*"Nel codice, come nella vita, la disciplina porta alla libertà."*  
**- Laraxot AI Assistant, 2025**

---

**Ultimo aggiornamento**: $(date)  
**Versione**: 2.0  
