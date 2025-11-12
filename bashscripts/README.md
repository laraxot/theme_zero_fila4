
>>>>>>> e0c964a3 (first)
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
chmod +x *.sh
>>>>>>> 574afe9e (.)
>>>>>>> e0c964a3 (first)
chmod +x scripts/**/*.sh
```

## 🚀 Utilizzo

### Sincronizzazione Subtree
```bash
./git_sync_subtree.sh <path> <remote_repo>
>>>>>>> 574afe9e (.)
>>>>>>> e0c964a3 (first)
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
./git_sync_subtree.sh modules/auth git@github.com:user/auth-module.git
```

## 📜 Script Disponibili

### 1. git_sync_subtree.sh
> 🎯 Script principale per la sincronizzazione dei subtree

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

### 2. git_push_subtree.sh
> 🔼 Gestisce le operazioni di push

**Funzionalità:**
- Push intelligente con fallback
- Gestione branch temporanei
- Rebase automatico

### 3. git_pull_subtree.sh
> 🔽 Gestisce le operazioni di pull

**Caratteristiche:**
- Pull con squash opzionale
- Gestione conflitti automatica
- Merge strategy personalizzabile

## 🎯 Esempi

### Sincronizzazione Modulo
```bash
>>>>>>> ea169dcc (.)

## Regola Fondamentale

**TUTTI gli script** (PHP, Bash, Python, etc.) devono essere posizionati **SEMPRE** in questa cartella `bashscripts`, **MAI** nella directory Laravel o in altre posizioni.

## Struttura Organizzativa

```bashscripts/
├── README.md                    # Questo file
├── database/                    # Script relativi al database
│   ├── seeding/                # Script per popolamento database
│   │   ├── saluteora-1000-records.php        # 🎯 PRINCIPALE: 1000 record per modello
│   │   ├── saluteora-20-studios-66010.php    # 🆕 NUOVO: 20 studi con postal_code 66010 + dottori
│   │   ├── saluteora-mass-seeding.php         # Popolamento massivo SaluteOra
│   │   ├── salutemo-database-seeding.php      # Popolamento SaluteMo
│   │   ├── tinker-commands.php                 # Comandi per Tinker
│   │   ├── tinker-1000-records.php            # Script Tinker per 1000 record
│   │   ├── tinker-20-studios-66010.php        # 🆕 Script Tinker per 20 studi + dottori
│   │   └── QUICK_START.md                     # Guida rapida all'utilizzo
│   ├── migration/              # Script per gestione migrazioni
│   └── backup/                 # Script per backup database
├── maintenance/                 # Script di manutenzione
│   ├── cleanup/                # Script di pulizia
│   └── optimization/           # Script di ottimizzazione
├── deployment/                  # Script di deployment
│   ├── staging/                # Script per ambiente staging
│   └── production/             # Script per ambiente produzione
└── utilities/                   # Script di utilità generale
    ├── monitoring/              # Script di monitoraggio
    └── reporting/               # Script di reporting
```

## Script di Seeding Database

### 🎯 **Script Principale: 1000 Record per Modello**
- **`saluteora-1000-records.php`**: Genera esattamente 1000 doctor, 1000 patients, 1000 studios e 500 appointments
- **`tinker-1000-records.php`**: Versione semplificata per Tinker

### 🆕 **Script Specializzato: 20 Studi con Postal Code 66010**
- **`saluteora-20-studios-66010.php`**: Crea 20 studi medici con postal_code = '66010' e **garantisce che ogni studio abbia almeno un dottore collegato**
- **`tinker-20-studios-66010.php`**: Versione Tinker per 20 studi + dottori

**Caratteristiche principali:**
- 🎯 **20 studi medici** con postal_code fisso 66010 (Chieti, Abruzzo)
- 👨‍⚕️ **Almeno 1 dottore** per ogni studio (garantito)
- 🏥 **Nomi specializzati** per ogni studio (Cardiologico, Ortopedico, etc.)
- 📍 **Indirizzi realistici** nella zona di Chieti
- 🔗 **Relazioni automatiche** tra studi e dottori
- ✅ **Verifica finale** che ogni studio abbia dottori

### **Script Generali**
- **`saluteora-mass-seeding.php`**: Popolamento massivo generale
- **`salutemo-database-seeding.php`**: Popolamento modulo SaluteMo
- **`tinker-commands.php`**: Comandi generali per Tinker

## Utilizzo degli Script

### Esecuzione Diretta (Raccomandata)

```bash
# Dalla root del progetto
cd /var/www/html/_bases/base_saluteora

>>>>>>> ea169dcc (.)
# Script per 20 studi con dottori (RACCOMANDATO per iniziare)
php bashscripts/database/seeding/saluteora-20-studios-66010.php

# Script per 1000 record per modello
php bashscripts/database/seeding/saluteora-1000-records.php
# Rendi gli script eseguibili
chmod +x *.sh
>>>>>>> 574afe9e (.)
chmod +x scripts/**/*.sh
>>>>>>> 7de7063d (.)
```

### Esecuzione via Tinker

```bash
>>>>>>> ea169dcc (.)
# Dalla directory Laravel
cd laravel

# Avvia Tinker
php artisan tinker

# Incolla il contenuto dello script desiderato
# Lo script si eseguirà automaticamente
./git_sync_subtree.sh <path> <remote_repo>
>>>>>>> 574afe9e (.)
./scripts/git/git_sync_subtree.sh <path> <remote_repo>
>>>>>>> 7de7063d (.)
```

## Caratteristiche degli Script

### Gestione Relazioni Garantite
- **Studio ↔ Doctor**: Ogni studio ha almeno un dottore
- **Doctor ↔ Appointment**: Appuntamenti collegati ai dottori
- **Patient ↔ Appointment**: Pazienti collegati agli appuntamenti

### Dati Realistici e Specializzati
- **Nomi italiani** per dottori e pazienti
- **Indirizzi reali** nella zona di Chieti (66010)
- **Specializzazioni mediche** specifiche per ogni studio
- **Contatti e orari** realistici per studi medici

### Performance e Sicurezza
- **Creazione in batch** per grandi volumi
- **Disabilitazione foreign key** durante il seeding
- **Transazioni ottimizzate** per consistenza
- **Verifica automatica** dell'integrità dei dati

## Esempi di Output

### Script 20 Studi con Dottori

```bash
🏥 Creazione 20 studi medici con postal_code = 66010 e dottori collegati...
✅ Studio creato: Centro Medico Chieti Centro (ID: 1)
✅ Studio creato: Studio Dentistico Chieti Nord (ID: 2)
...
👨‍⚕️ Dottore creato: Dr. Mario Rossi - Cardiologia per studio Centro Medico Chieti Centro
👨‍⚕️ Dottore creato: Dr. Anna Bianchi - Dermatologia per studio Studio Dentistico Chieti Nord
...
✅ SUCCESSO: Tutti gli studi hanno almeno un dottore collegato!
```

### Script 1000 Record

```bash
>>>>>>> ea169dcc (.)
🚀 Inizializzazione seeding massivo SaluteOra - 1000 record per modello...
📊 RISULTATO FINALE:
  - Studi creati: 1000
  - Dottori totali: 1000
  - Pazienti totali: 1000
  - Appuntamenti totali: 500

## Regola Fondamentale

**TUTTI gli script** (PHP, Bash, Python, etc.) devono essere posizionati **SEMPRE** in questa cartella `bashscripts`, **MAI** nella directory Laravel o in altre posizioni.

## Struttura Organizzativa

```bashscripts/
├── README.md                    # Questo file
├── database/                    # Script relativi al database
│   ├── seeding/                # Script per popolamento database
│   │   ├── saluteora-1000-records.php        # 🎯 PRINCIPALE: 1000 record per modello
│   │   ├── saluteora-20-studios-66010.php    # 🆕 NUOVO: 20 studi con postal_code 66010 + dottori
│   │   ├── saluteora-mass-seeding.php         # Popolamento massivo SaluteOra
│   │   ├── salutemo-database-seeding.php      # Popolamento SaluteMo
│   │   ├── tinker-commands.php                 # Comandi per Tinker
│   │   ├── tinker-1000-records.php            # Script Tinker per 1000 record
│   │   ├── tinker-20-studios-66010.php        # 🆕 Script Tinker per 20 studi + dottori
│   │   └── QUICK_START.md                     # Guida rapida all'utilizzo
│   ├── migration/              # Script per gestione migrazioni
│   └── backup/                 # Script per backup database
├── maintenance/                 # Script di manutenzione
│   ├── cleanup/                # Script di pulizia
│   └── optimization/           # Script di ottimizzazione
├── deployment/                  # Script di deployment
│   ├── staging/                # Script per ambiente staging
│   └── production/             # Script per ambiente produzione
└── utilities/                   # Script di utilità generale
    ├── monitoring/              # Script di monitoraggio
    └── reporting/               # Script di reporting
```

## Script di Seeding Database

### 🎯 **Script Principale: 1000 Record per Modello**
- **`saluteora-1000-records.php`**: Genera esattamente 1000 doctor, 1000 patients, 1000 studios e 500 appointments
- **`tinker-1000-records.php`**: Versione semplificata per Tinker

### 🆕 **Script Specializzato: 20 Studi con Postal Code 66010**
- **`saluteora-20-studios-66010.php`**: Crea 20 studi medici con postal_code = '66010' e **garantisce che ogni studio abbia almeno un dottore collegato**
- **`tinker-20-studios-66010.php`**: Versione Tinker per 20 studi + dottori

**Caratteristiche principali:**
- 🎯 **20 studi medici** con postal_code fisso 66010 (Chieti, Abruzzo)
- 👨‍⚕️ **Almeno 1 dottore** per ogni studio (garantito)
- 🏥 **Nomi specializzati** per ogni studio (Cardiologico, Ortopedico, etc.)
- 📍 **Indirizzi realistici** nella zona di Chieti
- 🔗 **Relazioni automatiche** tra studi e dottori
- ✅ **Verifica finale** che ogni studio abbia dottori

### **Script Generali**
- **`saluteora-mass-seeding.php`**: Popolamento massivo generale
- **`salutemo-database-seeding.php`**: Popolamento modulo SaluteMo
- **`tinker-commands.php`**: Comandi generali per Tinker

## Utilizzo degli Script

### Esecuzione Diretta (Raccomandata)

```bash
# Dalla root del progetto
cd /var/www/html/_bases/base_saluteora

# Rendi gli script eseguibili
chmod +x *.sh
chmod +x scripts/**/*.sh
>>>>>>> develop
```

### Esecuzione via Tinker

```bash
./git_sync_subtree.sh <path> <remote_repo>
./scripts/git/git_sync_subtree.sh <path> <remote_repo>
>>>>>>> develop
```

## Caratteristiche degli Script

### Gestione Relazioni Garantite
- **Studio ↔ Doctor**: Ogni studio ha almeno un dottore
- **Doctor ↔ Appointment**: Appuntamenti collegati ai dottori
- **Patient ↔ Appointment**: Pazienti collegati agli appuntamenti

### Dati Realistici e Specializzati
- **Nomi italiani** per dottori e pazienti
- **Indirizzi reali** nella zona di Chieti (66010)
- **Specializzazioni mediche** specifiche per ogni studio
- **Contatti e orari** realistici per studi medici

### Performance e Sicurezza
- **Creazione in batch** per grandi volumi
- **Disabilitazione foreign key** durante il seeding
- **Transazioni ottimizzate** per consistenza
- **Verifica automatica** dell'integrità dei dati

## Esempi di Output

### Script 20 Studi con Dottori

```bash
🏥 Creazione 20 studi medici con postal_code = 66010 e dottori collegati...
✅ Studio creato: Centro Medico Chieti Centro (ID: 1)
✅ Studio creato: Studio Dentistico Chieti Nord (ID: 2)
...
👨‍⚕️ Dottore creato: Dr. Mario Rossi - Cardiologia per studio Centro Medico Chieti Centro
👨‍⚕️ Dottore creato: Dr. Anna Bianchi - Dermatologia per studio Studio Dentistico Chieti Nord
...
✅ SUCCESSO: Tutti gli studi hanno almeno un dottore collegato!
```

### Script 1000 Record

```bash
>>>>>>> 71ff9e32 (.)
>>>>>>> ec52a6b4 (.)

# Sincronizza un modulo specifico
./git_sync_subtree.sh modules/users git@github.com:org/users.git

# Sincronizza con branch specifico
REMOTE_BRANCH=develop ./git_sync_subtree.sh modules/auth git@github.com:org/auth.git
>>>>>>> f52d0712 (.)
>>>>>>> ec52a6b4 (.)
>>>>>>> e0c964a3 (first)
# Sincronizza un modulo specifico
./scripts/git/git_sync_subtree.sh modules/users git@github.com:org/users.git

# Sincronizza con branch specifico
REMOTE_BRANCH=develop ./scripts/phpstan/check_before_phpstan.sh

# Genera riassunto PHPStan
./scripts/phpstan/generate_phpstan_summary.sh
>>>>>>> e0c964a3 (first)
```

## ⚠️ Risoluzione Problemi

### Errori Comuni

>>>>>>> ea169dcc (.)
```

## Documentazione Correlata

- [Database Seeding](../docs/database-seeding.md) - Documentazione completa seeding
- [Organizzazione Script](../docs/script-organization.md) - Regole generali script
- [Quick Start Seeding](database/seeding/QUICK_START.md) - Guida rapida all'utilizzo

## Best Practices

### Prima dell'Esecuzione
- Backup del database esistente
- Verifica spazio disco disponibile
- Controllo configurazione ambiente
- Test su ambiente di sviluppo

### Durante l'Esecuzione
- Monitorare output e progressi
- Verificare statistiche intermedie
- Controllare utilizzo risorse
- Gestire eventuali errori

### Dopo l'Esecuzione
- Verificare integrità relazioni
- Controllare statistiche finali
- Testare funzionalità applicazione
- Documentare modifiche effettuate

## Troubleshooting

### Errori Comuni
1. **Modulo non trovato**: Verificare installazione modulo SaluteOra
2. **Factory non trovato**: Controllare esistenza factory nel modulo
3. **Errore database**: Verificare migrazioni e configurazione
4. **Memoria insufficiente**: Utilizzare script in batch più piccoli

>>>>>>> ea169dcc (.)
### Soluzioni
1. **Eseguire migrazioni**: `php artisan migrate`
2. **Verificare autoload**: `composer dump-autoload`
3. **Controllare namespace**: Verificare struttura moduli
4. **Testare connessione**: Verificare configurazione database
>>>>>>> 71ff9e32 (.)
```

## Documentazione Correlata

- [Database Seeding](../docs/database-seeding.md) - Documentazione completa seeding
- [Organizzazione Script](../docs/script-organization.md) - Regole generali script
- [Quick Start Seeding](database/seeding/QUICK_START.md) - Guida rapida all'utilizzo

## Best Practices

### Prima dell'Esecuzione
- Backup del database esistente
- Verifica spazio disco disponibile
- Controllo configurazione ambiente
- Test su ambiente di sviluppo

### Durante l'Esecuzione
- Monitorare output e progressi
- Verificare statistiche intermedie
- Controllare utilizzo risorse
- Gestire eventuali errori

### Dopo l'Esecuzione
- Verificare integrità relazioni
- Controllare statistiche finali
- Testare funzionalità applicazione
- Documentare modifiche effettuate

## Troubleshooting

### Errori Comuni
1. **Modulo non trovato**: Verificare installazione modulo SaluteOra
2. **Factory non trovato**: Controllare esistenza factory nel modulo
3. **Errore database**: Verificare migrazioni e configurazione
4. **Memoria insufficiente**: Utilizzare script in batch più piccoli

>>>>>>> 71ff9e32 (.)
>>>>>>> ec52a6b4 (.)
1. **Prefix Option Mancante**
   ```bash
   fatal: you must provide the --prefix option
   ```
>>>>>>> ec52a6b4 (.)
   ✅ **Soluzione:** Verifica il path del subtree

2. **Push Rejected**
   ```bash
   ! [rejected] dev -> dev (non-fast-forward)
   ```
   ✅ **Soluzione:** Esegui prima un pull
>>>>>>> 574afe9e (.)
>>>>>>> e0c964a3 (first)
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

>>>>>>> ea169dcc (.)

## Note Importanti

- **Regola fondamentale**: Script SEMPRE in `bashscripts/`, MAI in `laravel/`
- **Categorizzazione**: Organizzare script per funzionalità e modulo
- **Documentazione**: Aggiornare sempre docs e README
- **Testing**: Testare sempre in ambiente di sviluppo prima della produzione

---

**Ultimo aggiornamento**: Gennaio 2025
**Versione**: 2.0
**Compatibilità**: Laravel 10+, Moduli SaluteOra/SaluteMo
   **Soluzione**: Verifica che il path del subtree sia corretto
>>>>>>> develop

- **Regola fondamentale**: Script SEMPRE in `bashscripts/`, MAI in `laravel/`
- **Categorizzazione**: Organizzare script per funzionalità e modulo
- **Documentazione**: Aggiornare sempre docs e README
- **Testing**: Testare sempre in ambiente di sviluppo prima della produzione

---

>>>>>>> ec52a6b4 (.)
<div align="center">
  <strong>🚀 Potenzia il tuo workflow Git con questi script!</strong>
</div>

## 🛠️ Best Practices

1. **Prima dell'Esecuzione**
   - ✔️ Commit/stash delle modifiche pendenti
   - ✔️ Verifica branch corrente
   - ✔️ Controllo stato repository

2. **Durante l'Esecuzione**
   - 👀 Monitora l'output
   - ⏳ Non interrompere gli script
   - 📝 Controlla i log

## 🤝 Contribuire

Le contribuzioni sono sempre benvenute! Ecco come puoi aiutare:

1. 🍴 Forka il repository
2. 🔧 Crea un branch per le tue modifiche
3. 💻 Committa le tue migliorie
4. 📤 Pusha al branch
5. 🔄 Apri una Pull Request

## 📝 Note sulla Manutenzione

- 🔄 Aggiornamenti regolari
- 🐛 Fix bug tempestivi
- 📚 Documentazione sempre aggiornata

## 📜 Licenza

Questo progetto è sotto licenza MIT - vedi il file [LICENSE](LICENSE) per i dettagli.

## 👥 Autori

- **Marco Sottana** - *Lavoro Iniziale* - [aurmich](https://github.com/aurmich)

## 🙏 Ringraziamenti

- 🌟 Tutti i contributori
- 📚 La comunità Git
- 🔧 Gli utenti che segnalano bug

---

> **Nota**: Questo README è in continuo aggiornamento. Se trovi errori o hai suggerimenti, apri pure una issue!

<div align="center">
  <sub>Built with ❤️ by the development team</sub>
</div>

# 🚀 Git Automation Toolkit

[![PHPStan](https://img.shields.io/badge/PHPStan-Level%209-brightgreen.svg?style=for-the-badge&logo=php&logoColor=white)](docs/phpstan/ANALISI_MODULI_PHPSTAN.md)

## System Requirements
- PHP 8.2 or higher
- Composer
- Node.js 18+ and npm
- MySQL 8.0+
- Git

## Installation

### 1. Clone the Repository
```bash
git clone https://github.com/your-username/project.git
cd project
```

### 2. Install PHP Dependencies
```bash
composer install
```

### 3. Install Node.js Dependencies
```bash
npm install
```

### 4. Configure Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configure Database
Edit the `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=project
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Run Migrations
```bash
php artisan migrate
```

### 7. Install Modules
```bash

# Install Laravel Modules
composer require nwidart/laravel-modules

# Publish module configuration
php artisan vendor:publish --provider="Nwidart\Modules\LaravelModulesServiceProvider"

# Add Xot module
git remote add -f xot https://github.com/crud-lab/xot.git
git subtree add --prefix Modules/Xot xot main --squash
```

### 8. Compile Assets
```bash
npm run dev
```

### 9. Start Development Server
```bash
php artisan serve
```

## Project Structure

```
project/
├── app/
├── config/
├── database/
├── Modules/
│   ├── Core/
│   ├── Module1/
│   ├── Module2/
│   └── Xot/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
└── docs/
    ├── roadmap/
    └── packages/
```

## Core Modules

### Core
- User management and authentication
- System configuration
- Base functionality

### Module1
- Module 1 specific features
- Data management
- User interface

### Module2
- Module 2 specific features
- Process management
- Integrations

### Xot
- Base framework for modules
- Reusable components
- Common functionality

## Documentation

Complete documentation is available in the `docs/` directory:
- [Project Roadmap](docs/roadmap/README.md)
- [Packages Documentation](docs/packages/README.md)

## Development

### Useful Commands
```bash

# Create a new module
php artisan module:make ModuleName

# Generate module components
php artisan module:make-controller ControllerName ModuleName
php artisan module:make-model ModelName ModuleName
php artisan module:make-migration create_table ModuleName

# Run tests
php artisan test

# Update dependencies
composer update
npm update
```

### Best Practices
- Follow PSR-4 autoloading conventions
- Use proper namespaces for modules
- Document changes in CHANGELOG.md
- Keep tests updated
- Verify cross-browser compatibility

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

[![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com)
[![Bash](https://img.shields.io/badge/Bash-4EAA25?style=for-the-badge&logo=gnu-bash&logoColor=white)](https://www.gnu.org/software/bash/)
[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)

> **⚠️ WARNING: This toolkit is designed for experienced developers working with complex Git repositories and monorepo structures.**

## 🤔 Why this toolkit?

Developing a complex modular project presents unique challenges:

- **Managing dozens of interdependent modules** that need to stay synchronized
- **Collaboration needs** between teams distributed across different repositories
- **Maintaining code consistency** across multiple branches and organizations
- **Reducing the risk of manual errors** in complex Git operations
- **Automating repetitive processes** to increase productivity
- **Support for static analysis** with PHPStan Level 9

This toolkit addresses these challenges by providing automated tools that simplify workflow and ensure consistency and quality.

## Translations
- [Italiano](docs/README.it.md)
- [Español](docs/README.es.md)
 43df3e0 (.)

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
- [Script Disponibili](#-script-disponibili)
- [Esempi](#-esempi)
- [Risoluzione Problemi](#-risoluzione-problemi)
- [Contribuire](#-contribuire)

## 💻 Installazione

```bash

# Clona il repository
git clone git@github.com:aurmich/bashscripts_fila3.git

# Rendi gli script eseguibili
chmod +x *.sh
```

## 🚀 Utilizzo

### Sincronizzazione Subtree
```bash
./git_sync_subtree.sh <path> <remote_repo>
```

Esempio:
```bash
./git_sync_subtree.sh modules/auth git@github.com:user/auth-module.git
```

## 📜 Script Disponibili

### 1. git_sync_subtree.sh
> 🎯 Script principale per la sincronizzazione dei subtree

**Caratteristiche:**
- Gestione automatica di push e pull
- Rimozione caratteri CR (^M)
- Gestione permessi automatica

### 2. git_push_subtree.sh
> 🔼 Gestisce le operazioni di push

**Funzionalità:**
- Push intelligente con fallback
- Gestione branch temporanei
- Rebase automatico

### 3. git_pull_subtree.sh
> 🔽 Gestisce le operazioni di pull

**Caratteristiche:**
- Pull con squash opzionale
- Gestione conflitti automatica
- Merge strategy personalizzabile

## 🎯 Esempi

### Sincronizzazione Modulo
```bash

# Sincronizza un modulo specifico
./git_sync_subtree.sh modules/users git@github.com:org/users.git

# Sincronizza con branch specifico
REMOTE_BRANCH=develop ./git_sync_subtree.sh modules/auth git@github.com:org/auth.git
```

## ⚠️ Risoluzione Problemi

### Errori Comuni

1. **Prefix Option Mancante**
   ```bash
   fatal: you must provide the --prefix option
   ```
   ✅ **Soluzione:** Verifica il path del subtree

2. **Push Rejected**
   ```bash
   ! [rejected] dev -> dev (non-fast-forward)
   ```
   ✅ **Soluzione:** Esegui prima un pull

## 🛠️ Best Practices

1. **Prima dell'Esecuzione**
   - ✔️ Commit/stash delle modifiche pendenti
   - ✔️ Verifica branch corrente
   - ✔️ Controllo stato repository

2. **Durante l'Esecuzione**
   - 👀 Monitora l'output
   - ⏳ Non interrompere gli script
   - 📝 Controlla i log

## 🤝 Contribuire

Le contribuzioni sono sempre benvenute! Ecco come puoi aiutare:

1. 🍴 Forka il repository
2. 🔧 Crea un branch per le tue modifiche
3. 💻 Committa le tue migliorie
4. 📤 Pusha al branch
5. 🔄 Apri una Pull Request

## 📝 Note sulla Manutenzione

- 🔄 Aggiornamenti regolari
- 🐛 Fix bug tempestivi
- 📚 Documentazione sempre aggiornata

## 📜 Licenza

Questo progetto è sotto licenza MIT - vedi il file [LICENSE](LICENSE) per i dettagli.

## 👥 Autori

- **Marco Sottana** - *Lavoro Iniziale* - [aurmich](https://github.com/aurmich)

## 🙏 Ringraziamenti

- 🌟 Tutti i contributori
- 📚 La comunità Git
- 🔧 Gli utenti che segnalano bug

---

> **Nota**: Questo README è in continuo aggiornamento. Se trovi errori o hai suggerimenti, apri pure una issue!

<div align="center">
  <sub>Built with ❤️ by the development team</sub>
</div>

# 🚀 Git Automation Toolkit

[![PHPStan](https://img.shields.io/badge/PHPStan-Level%209-brightgreen.svg?style=for-the-badge&logo=php&logoColor=white)](docs/phpstan/ANALISI_MODULI_PHPSTAN.md)

## System Requirements
- PHP 8.2 or higher
- Composer
- Node.js 18+ and npm
- MySQL 8.0+
- Git

## Installation

### 1. Clone the Repository
```bash
git clone https://github.com/your-username/project.git
cd project
```

### 2. Install PHP Dependencies
```bash
composer install
```

### 3. Install Node.js Dependencies
```bash
npm install
```

### 4. Configure Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configure Database
Edit the `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=project
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Run Migrations
```bash
php artisan migrate
```

### 7. Install Modules
```bash

# Install Laravel Modules
composer require nwidart/laravel-modules

# Publish module configuration
php artisan vendor:publish --provider="Nwidart\Modules\LaravelModulesServiceProvider"

# Add Xot module
git remote add -f xot https://github.com/crud-lab/xot.git
git subtree add --prefix Modules/Xot xot main --squash
```

### 8. Compile Assets
```bash
npm run dev
```

### 9. Start Development Server
```bash
php artisan serve
```

## Project Structure

```
project/
├── app/
├── config/
├── database/
├── Modules/
│   ├── Core/
│   ├── Module1/
│   ├── Module2/
│   └── Xot/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
└── docs/
    ├── roadmap/
    └── packages/
```

## Core Modules

### Core
- User management and authentication
- System configuration
- Base functionality

### Module1
- Module 1 specific features
- Data management
- User interface

### Module2
- Module 2 specific features
- Process management
- Integrations

### Xot
- Base framework for modules
- Reusable components
- Common functionality

## Documentation

Complete documentation is available in the `docs/` directory:
- [Project Roadmap](docs/roadmap/README.md)
- [Packages Documentation](docs/packages/README.md)

## Development

### Useful Commands
```bash

# Create a new module
php artisan module:make ModuleName

# Generate module components
php artisan module:make-controller ControllerName ModuleName
php artisan module:make-model ModelName ModuleName
php artisan module:make-migration create_table ModuleName

# Run tests
php artisan test

# Update dependencies
composer update
npm update
```

### Best Practices
- Follow PSR-4 autoloading conventions
- Use proper namespaces for modules
- Document changes in CHANGELOG.md
- Keep tests updated
- Verify cross-browser compatibility

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

[![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com)
[![Bash](https://img.shields.io/badge/Bash-4EAA25?style=for-the-badge&logo=gnu-bash&logoColor=white)](https://www.gnu.org/software/bash/)
[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)

> **⚠️ WARNING: This toolkit is designed for experienced developers working with complex Git repositories and monorepo structures.**

## 🤔 Why this toolkit?

Developing a complex modular project presents unique challenges:

- **Managing dozens of interdependent modules** that need to stay synchronized
- **Collaboration needs** between teams distributed across different repositories
- **Maintaining code consistency** across multiple branches and organizations
- **Reducing the risk of manual errors** in complex Git operations
- **Automating repetitive processes** to increase productivity
- **Support for static analysis** with PHPStan Level 9

This toolkit addresses these challenges by providing automated tools that simplify workflow and ensure consistency and quality.

## Translations
- [Italiano](docs/README.it.md)
- [Español](docs/README.es.md)
 43df3e0 (.)
>>>>>>> 71ff9e32 (.)
>>>>>>> ec52a6b4 (.)
>>>>>>> e0c964a3 (first)
