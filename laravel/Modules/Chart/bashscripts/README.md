
# 🚀 Toolkit di Automazione Git per Laraxot PTVX

[![PHPStan](https://img.shields.io/badge/PHPStan-Level%209-brightgreen.svg?style=for-the-badge&logo=php&logoColor=white)](../docs/phpstan/ANALISI_MODULI_PHPSTAN.md)
[![Bash Version](https://img.shields.io/badge/Bash-5.0%2B-brightgreen.svg)](https://www.gnu.org/software/bash/)
[![License](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)
[![Maintenance](https://img.shields.io/badge/Maintained%3F-yes-green.svg)](https://github.com/aurmich/bashscripts_fila3)
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg)](http://makeapullrequest.com)

<div align="center">
  <img src="https://raw.githubusercontent.com/odb/official-bash-logo/master/assets/Logos/Icons/PNG/512x512.png" width="200" alt="Bash Logo"/>
  <br/>
  <strong>Potenti script Bash per la gestione avanzata dei subtree Git 🌳</strong>
</div>

## 🌟 Caratteristiche Principali

- 🔄 **Sincronizzazione Automatica** dei subtree Git
- 🛡️ **Gestione Robusta degli Errori**
- 🔍 **Logging Dettagliato**
- 🚦 **Controlli di Sicurezza** integrati
- 🔧 **Manutenzione Semplificata**

## 📚 Indice

- [Installazione](#-installazione)
- [Utilizzo](#-utilizzo)
- [Organizzazione Script](#-organizzazione-script)
- [Script Disponibili](#-script-disponibili)
- [Esempi](#-esempi)
- [Risoluzione Problemi](#-risoluzione-problemi)
- [Contribuire](#-contribuire)

## 💻 Installazione

```bash
# Clona il repository
git clone git@github.com:aurmich/bashscripts_fila3.git

# Rendi gli script eseguibili
chmod +x scripts/**/*.sh
```

## 🚀 Utilizzo

### Sincronizzazione Subtree
```bash
./scripts/git/git_sync_subtree.sh <path> <remote_repo>
```

Esempio:
```bash
./scripts/git/git_sync_subtree.sh modules/auth git@github.com:user/auth-module.git
```

## 📁 Organizzazione Script

Tutti gli script sono organizzati in sottocartelle per categoria:

### 🔧 **scripts/git/** - Gestione Git e Subtree
- `git_sync_subtree.sh` - Sincronizzazione principale
- `resolve_git_conflict.sh` - Risoluzione conflitti
- `init-subtrees.sh` - Inizializzazione subtree
- `reset_subtrees.sh` - Reset subtree
- `sync_submodules.sh` - Sincronizzazione submodule
- `rebase_keep_last_commits.sh` - Rebase con mantenimento commit

### 📝 **scripts/docs/** - Gestione Documentazione
- `docs-audit-dry-kiss.sh` - Audit documentazione
- `docs-consolidation.sh` - Consolidamento docs
- `docs-final-optimization.sh` - Ottimizzazione finale
- `fix-docs-naming.sh` - Correzione naming
- `organize_docs_structure.sh` - Organizzazione struttura
- `update_docs.sh` - Aggiornamento documentazione

### 🔍 **scripts/phpstan/** - Analisi Statiche
- `check_before_phpstan.sh` - Controlli pre-PHPStan
- `create_phpstan_readme.sh` - Generazione README PHPStan
- `generate_phpstan_summary.sh` - Riassunto PHPStan
- `phpstan_docs_generator.sh` - Generatore documentazione
- `fix-translations.php` - Correzione traduzioni

### 💾 **scripts/backup/** - Backup e Sincronizzazione
- `backup.sh` - Script di backup
- `sync_to_disk.sh` - Sincronizzazione su disco
- `copy_to_mono.sh` - Copia in repository monolitico

### 🔧 **scripts/fix/** - Correzioni e Riparazioni
- `fix_errors.sh` - Correzione errori
- `fix_structure.sh` - Correzione struttura
- `fix_directory_structure.sh` - Correzione struttura directory
- `fix-psr4-autoloading-violations.sh` - Correzione PSR-4

### 🧪 **scripts/testing/** - Test e Validazione
- `check_form_schema.php` - Controllo schema form
- `check_mysql.sh` - Controllo MySQL
- `test_parse.sh` - Test parsing
- `phpunit.xml` - Configurazione PHPUnit

### ⚙️ **scripts/config/** - Configurazioni
- `package.json` - Configurazione Node.js
- `postcss.config.js` - Configurazione PostCSS
- `tailwind.config.js` - Configurazione Tailwind
- `rector.php` - Configurazione Rector
- `mysql-db-connector.js` - Connettore MySQL

### 🛠️ **scripts/utils/** - Utility e Helper
- `parse_gitmodules_ini.sh` - Parsing gitmodules
- `check_mcp_config.php` - Controllo configurazione MCP
- `tips.txt` - Suggerimenti e trucchi
- `prompt.txt` - Prompt e template
- `organize_files.sh` - Organizzazione file

## 📜 Script Disponibili

### 1. Git Management (scripts/git/)
> 🎯 Script per la gestione Git e subtree

**Caratteristiche:**
- Gestione automatica di push e pull
- Rimozione caratteri CR (^M)
- Gestione permessi automatica

### 2. Documentation Management (scripts/docs/)
> 📝 Script per la gestione della documentazione

**Funzionalità:**
- Audit automatico della documentazione
- Consolidamento e ottimizzazione
- Correzione naming conventions

### 3. PHPStan Analysis (scripts/phpstan/)
> 🔍 Script per analisi statiche

**Caratteristiche:**
- Controlli pre-PHPStan
- Generazione documentazione automatica
- Correzione traduzioni

### 4. Backup & Sync (scripts/backup/)
> 💾 Script per backup e sincronizzazione

**Funzionalità:**
- Backup automatico
- Sincronizzazione su disco
- Copia in repository monolitico

### 5. Fix & Repair (scripts/fix/)
> 🔧 Script per correzioni e riparazioni

**Caratteristiche:**
- Correzione errori automatica
- Riparazione struttura
- Correzione violazioni PSR-4

## 🎯 Esempi

### Sincronizzazione Modulo
```bash
# Sincronizza un modulo specifico
./scripts/git/git_sync_subtree.sh modules/users git@github.com:org/users.git

# Sincronizza con branch specifico
REMOTE_BRANCH=develop ./scripts/git/git_sync_subtree.sh modules/auth git@github.com:org/auth.git
```

### Audit Documentazione
```bash
# Esegui audit completo della documentazione
./scripts/docs/docs-audit-dry-kiss.sh

# Correggi naming conventions
./scripts/docs/fix-docs-naming.sh
```

### Analisi PHPStan
```bash
# Controlli pre-PHPStan
./scripts/phpstan/check_before_phpstan.sh

# Genera riassunto PHPStan
./scripts/phpstan/generate_phpstan_summary.sh
```

## ⚠️ Risoluzione Problemi

### Errori Comuni

1. **Prefix Option Mancante**
   ```bash
   fatal: you must provide the --prefix option
   ```
   **Soluzione**: Verifica che il path del subtree sia corretto

2. **Permessi Script**
   ```bash
   Permission denied
   ```
   **Soluzione**: Rendi eseguibili gli script
   ```bash
   chmod +x scripts/**/*.sh
   ```

3. **PHPStan Non Trovato**
   ```bash
   command not found: phpstan
   ```
   **Soluzione**: Installa PHPStan
   ```bash
   composer require --dev phpstan/phpstan
   ```

## 🔧 Manutenzione

### Aggiornamento Script
```bash
# Aggiorna tutti gli script
git pull origin main

# Rendi eseguibili i nuovi script
chmod +x scripts/**/*.sh
```

### Backup Configurazioni
```bash
# Backup configurazioni
./scripts/backup/backup.sh

# Sincronizza su disco
./scripts/backup/sync_to_disk.sh
```

## 📊 Statistiche

- **Script Git**: 7 script
- **Script Docs**: 15 script
- **Script PHPStan**: 6 script
- **Script Backup**: 3 script
- **Script Fix**: 5 script
- **Script Testing**: 4 script
- **Script Config**: 6 script
- **Script Utils**: 5 script

**Totale**: 51 script organizzati in 8 categorie

## 🤝 Contribuire

### Setup Sviluppo
1. Clona il repository
2. Installa le dipendenze
3. Configura l'ambiente
4. Esegui i test

### Convenzioni di Codice
- Seguire PSR-12 per script PHP
- Utilizzare shebang corretto per script Bash
- Documentare tutti gli script
- Testare prima del commit

### Processo di Pull Request
1. Crea un branch feature
2. Implementa le modifiche
3. Aggiungi i test
4. Aggiorna la documentazione
5. Crea la PR

## 📞 Supporto

- **Issues**: [GitHub Issues](https://github.com/aurmich/bashscripts_fila3/issues)
- **Documentazione**: [Wiki](https://github.com/aurmich/bashscripts_fila3/wiki)
- **Discussions**: [GitHub Discussions](https://github.com/aurmich/bashscripts_fila3/discussions)

## 📄 Licenza

Questo progetto è rilasciato sotto licenza MIT. Vedi il file [LICENSE](LICENSE) per i dettagli.

---

<div align="center">
  <strong>🚀 Potenzia il tuo workflow Git con questi script!</strong>
</div>
