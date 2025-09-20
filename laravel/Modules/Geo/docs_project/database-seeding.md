# Database Seeding - Moduli SaluteMo e SaluteOra

## Panoramica

Questa documentazione descrive il processo di popolamento del database per i moduli SaluteMo e SaluteOra, utilizzando i seeder e factory esistenti tramite script organizzati nella cartella `bashscripts`.

## Struttura Script

Gli script di seeding sono organizzati nella seguente struttura:

```bashscripts/
└── database/
    └── seeding/
        ├── saluteora-1000-records.php        # Popolamento esatto 1000 record per modello
        ├── saluteora-20-studios-66010.php    # 🎯 NUOVO: 20 studi con postal_code 66010 + dottori
        ├── saluteora-mass-seeding.php         # Popolamento massivo SaluteOra
        ├── salutemo-database-seeding.php      # Popolamento SaluteMo
        ├── tinker-commands.php                # Comandi diretti per Tinker
        ├── tinker-1000-records.php            # Script Tinker per 1000 record
        └── tinker-20-studios-66010.php       # 🆕 Script Tinker per 20 studi + dottori
```

## Script Principale: 1000 Record per Modello

### `saluteora-1000-records.php`

Script ottimizzato per generare esattamente:
- **1000 Doctor** (utenti con tipo 'doctor')
- **1000 Patient** (utenti con tipo 'patient') 
- **1000 Studio** (studi medici)
- **500 Appointment** (appuntamenti di esempio)

**Caratteristiche:**
- Generazione in batch per performance ottimali
- Relazioni automatiche tra modelli
- Dati realistici e variati
- Verifica finale con statistiche complete

## Script Specializzato: 20 Studi con Postal Code 66010

### `saluteora-20-studios-66010.php`

Script specifico per creare esattamente **20 studi medici** tutti con `postal_code = '66010'` e **garantire che ogni studio abbia almeno un dottore collegato**.

**Caratteristiche principali:**
- 🎯 **20 studi medici** con postal_code fisso 66010 (Chieti)
- 👨‍⚕️ **Almeno 1 dottore** per ogni studio (garantito)
- 🏥 **Nomi specializzati** per ogni studio (Cardiologico, Ortopedico, etc.)
- 📍 **Indirizzi realistici** nella zona di Chieti
- 🔗 **Relazioni automatiche** tra studi e dottori
- ✅ **Verifica finale** che ogni studio abbia dottori

**Fasi di esecuzione:**
1. **Verifica studi esistenti** con postal_code 66010
2. **Creazione 20 studi** con dati completi e specializzazioni
3. **Creazione dottori** collegati automaticamente agli studi
4. **Verifica finale** con statistiche e controllo relazioni

**Dati generati:**
- Studi con specializzazioni mediche specifiche
- Dottori con nomi reali e specializzazioni
- Indirizzi, contatti e orari di apertura
- Relazioni studio-dottore garantite

## Moduli e Factory Disponibili

### SaluteOra
- **UserFactory**: Generazione utenti (Patient, Doctor, Admin)
- **StudioFactory**: Generazione studi medici
- **AppointmentFactory**: Generazione appuntamenti

### SaluteMo
- **UserFactory**: Generazione utenti base
- **StudioFactory**: Generazione studi base

## Utilizzo degli Script

### Esecuzione Diretta

```bash
# Dalla root del progetto
cd ..

# Script per 20 studi con dottori (RACCOMANDATO)
php bashscripts/database/seeding/saluteora-20-studios-66010.php

# Script per 1000 record per modello
php bashscripts/database/seeding/saluteora-1000-records.php
```

### Esecuzione via Tinker

```bash
# Dalla directory Laravel
cd laravel

# Avvia Tinker
php artisan tinker

# Incolla il contenuto dello script desiderato
# Lo script si eseguirà automaticamente
```

## Caratteristiche degli Script

### Gestione Relazioni
- **Studio ↔ Doctor**: Ogni studio ha almeno un dottore
- **Doctor ↔ Appointment**: Appuntamenti collegati ai dottori
- **Patient ↔ Appointment**: Pazienti collegati agli appuntamenti

### Dati Realistici
- **Nomi italiani** per dottori e pazienti
- **Indirizzi reali** nella zona di Chieti
- **Specializzazioni mediche** specifiche
- **Contatti e orari** realistici

### Performance
- **Creazione in batch** per grandi volumi
- **Disabilitazione foreign key** durante il seeding
- **Transazioni ottimizzate** per consistenza

## Verifica e Controllo

### Controlli Automatici
- Verifica esistenza moduli e factory
- Controllo relazioni tra modelli
- Statistiche finali complete
- Validazione integrità dati

### Output Dettagliato
- Progress bar per ogni fase
- Statistiche in tempo reale
- Verifica finale con riepilogo
- Gestione errori completa

## Esempi di Utilizzo

### Creazione Rapida 20 Studi

```bash
# Esecuzione diretta
php bashscripts/database/seeding/saluteora-20-studios-66010.php

# Output atteso:
# 🏥 Creazione 20 studi medici con postal_code = 66010 e dottori collegati...
# ✅ Studio creato: Centro Medico Chieti Centro (ID: 1)
# 👨‍⚕️ Dottore creato: Dr. Mario Rossi - Cardiologia per studio Centro Medico Chieti Centro
# ✅ SUCCESSO: Tutti gli studi hanno almeno un dottore collegato!
```

### Popolamento Massivo

```bash
# Esecuzione diretta
php bashscripts/database/seeding/saluteora-1000-records.php

# Output atteso:
# 🚀 Inizializzazione seeding massivo SaluteOra - 1000 record per modello...
# 📊 RISULTATO FINALE:
#   - Studi creati: 1000
#   - Dottori totali: 1000
#   - Pazienti totali: 1000
#   - Appuntamenti totali: 500
```

## Troubleshooting

### Errori Comuni
1. **Modulo non trovato**: Verificare installazione modulo SaluteOra
2. **Factory non trovato**: Controllare esistenza factory nel modulo
3. **Errore database**: Verificare migrazioni e configurazione
4. **Memoria insufficiente**: Utilizzare script in batch più piccoli

### Soluzioni
1. **Eseguire migrazioni**: `php artisan migrate`
2. **Verificare autoload**: `composer dump-autoload`
3. **Controllare namespace**: Verificare struttura moduli
4. **Testare connessione**: Verificare configurazione database

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

## Collegamenti e Riferimenti

- [README BashScripts](../bashscripts/README.md)
- [Quick Start Seeding](../bashscripts/database/seeding/QUICK_START.md)
- [Documentazione Modulo SaluteOra](../laravel/Modules/SaluteOra/docs/)
- [Documentazione Modulo SaluteMo](../laravel/Modules/SaluteMo/docs/)

---

**Ultimo aggiornamento**: Gennaio 2025
**Versione**: 2.0
**Compatibilità**: Laravel 10+, Moduli SaluteOra/SaluteMo
