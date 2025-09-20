# 🏥 Business Logic Consolidata - Progetto SaluteOra

## 📋 Panoramica del Sistema

SaluteOra è un sistema completo di gestione sanitaria modulare basato su Laravel 12, progettato per gestire studi medici, pazienti, appuntamenti e servizi sanitari. Il sistema utilizza un'architettura modulare con classi base condivise per garantire coerenza e riutilizzabilità.

## 🏗️ Architettura Modulare

### Moduli Principali

#### 1. **Xot** - Modulo Base
- **Scopo**: Fornisce classi base e funzionalità core per tutti gli altri moduli
- **Componenti**: 50+ classi base, 20+ service provider, 15+ trait
- **Funzionalità**: Autenticazione, autorizzazione, migrazioni, componenti Filament base
- **Posizione**: `Modules/Xot/`

#### 2. **SaluteOra** - Modulo Core Sanitario
- **Scopo**: Gestione completa del sistema sanitario
- **Modelli Principali**: User, Doctor, Patient, Admin, Studio, Appointment, Service
- **Funzionalità**: Gestione utenti sanitari, appuntamenti, servizi medici
- **Posizione**: `Modules/SaluteOra/`

#### 3. **User** - Gestione Utenti e Autenticazione
- **Scopo**: Gestione completa degli utenti e autenticazione
- **Modelli Principali**: User, BaseUser, Role, Permission, Team, Tenant
- **Funzionalità**: Autenticazione, autorizzazione, gestione ruoli e permessi
- **Posizione**: `Modules/User/`

#### 4. **Geo** - Gestione Dati Geografici
- **Scopo**: Gestione di indirizzi, comuni, province, regioni
- **Modelli Principali**: Address, Comune, Province, Region, County, Place
- **Funzionalità**: Geocoding, autocompletamento indirizzi, gestione territori
- **Posizione**: `Modules/Geo/`

#### 5. **Media** - Gestione File e Contenuti
- **Scopo**: Gestione di file, immagini e contenuti multimediali
- **Modelli Principali**: Media, MediaGroup, MediaCollection
- **Funzionalità**: Upload file, gestione immagini, organizzazione contenuti
- **Posizione**: `Modules/Media/`

#### 6. **UI** - Componenti Condivisi
- **Scopo**: Componenti UI riutilizzabili e condivisi
- **Componenti**: Button, Card, Form, Modal, Table
- **Funzionalità**: Componenti Blade, Livewire, Filament
- **Posizione**: `Modules/UI/`

## 🏥 Business Logic Sanitaria

### Gestione Utenti Sanitari

#### Sistema di Tipi Utente (STI - Single Table Inheritance)
- **User**: Classe base per tutti gli utenti
- **Doctor**: Medici che lavorano negli studi
- **Patient**: Pazienti che prenotano appuntamenti
- **Admin**: Amministratori del sistema

#### Relazioni e Dipendenze
```
User (base)
├── Doctor (estende User)
│   ├── belongsToMany(Studio) via DoctorStudio pivot
│   ├── hasMany(Appointment) as doctor
│   └── hasMany(Service) as provider
├── Patient (estende User)
│   ├── hasMany(Appointment) as patient
│   └── belongsToMany(Studio) via PatientStudio pivot
└── Admin (estende User)
    ├── hasMany(Studio) as managed_studios
    └── hasMany(User) as moderated_users
```

### Gestione Studi Medici

#### Studio Model
- **Funzionalità**: Gestione studi medici e cliniche
- **Relazioni**:
  - `hasMany(Doctor)` via DoctorStudio pivot
  - `hasMany(Patient)` via PatientStudio pivot
  - `hasMany(Appointment)` 
  - `hasMany(Service)`
  - `hasMany(Address)` per sedi multiple

#### Pivot Models
- **DoctorStudio**: Relazione molti-a-molti tra dottori e studi
  - Campi aggiuntivi: `role`, `specialization`, `working_hours`
- **PatientStudio**: Relazione molti-a-molti tra pazienti e studi
  - Campi aggiuntivi: `registration_date`, `status`

### Gestione Appuntamenti

#### Appointment Model
- **Funzionalità**: Gestione completa degli appuntamenti medici
- **Relazioni**:
  - `belongsTo(Doctor)` - medico che effettua la visita
  - `belongsTo(Patient)` - paziente che riceve la visita
  - `belongsTo(Studio)` - studio dove si svolge la visita
  - `belongsTo(Service)` - servizio medico richiesto
  - `belongsTo(AppointmentType)` - tipo di appuntamento

#### Stati e Tipi
- **Stati**: `scheduled`, `confirmed`, `in_progress`, `completed`, `cancelled`
- **Tipi**: `consultation`, `examination`, `treatment`, `follow_up`
- **Priorità**: `low`, `medium`, `high`, `emergency`

### Gestione Servizi Medici

#### Service Model
- **Funzionalità**: Catalogo servizi offerti dagli studi
- **Campi**: `name`, `description`, `duration`, `price`, `category`
- **Relazioni**:
  - `belongsTo(Studio)` - studio che offre il servizio
  - `belongsToMany(Doctor)` - medici che possono erogare il servizio
  - `hasMany(Appointment)` - appuntamenti per questo servizio

## 🌍 Business Logic Geografica

### Gestione Indirizzi

#### Address Model
- **Funzionalità**: Gestione completa degli indirizzi
- **Campi**: `street`, `number`, `postal_code`, `city`, `province`, `region`
- **Relazioni**:
  - `belongsTo(Comune)` - comune dell'indirizzo
  - `belongsTo(Province)` - provincia dell'indirizzo
  - `belongsTo(Region)` - regione dell'indirizzo
  - `morphTo(addressable)` - relazione polimorfica con altri modelli

#### Comune Model
- **Funzionalità**: Gestione comuni italiani
- **Campi**: `name`, `code`, `postal_code`, `latitude`, `longitude`
- **Relazioni**:
  - `belongsTo(Province)` - provincia di appartenenza
  - `hasMany(Address)` - indirizzi nel comune

### Geocoding e Localizzazione
- **Coordinate**: Latitudine e longitudine per ogni entità geografica
- **Distanze**: Calcolo automatico delle distanze tra indirizzi
- **Ricerca**: Autocompletamento indirizzi con fuzzy search

## 🔐 Business Logic di Sicurezza

### Autenticazione e Autorizzazione

#### Sistema di Ruoli e Permessi
- **Ruoli**: `admin`, `doctor`, `patient`, `staff`
- **Permessi**: `manage_users`, `manage_appointments`, `view_patient_data`
- **Implementazione**: Spatie Laravel Permission

#### Tenancy e Isolamento
- **Studio-based**: Ogni studio ha i propri dati isolati
- **User-based**: Ogni utente vede solo i dati del proprio studio
- **Admin**: Accesso globale per amministrazione

### Audit Trail
- **Logging**: Tutte le azioni critiche sono registrate
- **Implementazione**: Spatie Laravel Activitylog
- **Campi**: `user_id`, `action`, `model_type`, `model_id`, `changes`

## 📊 Business Logic di Business Intelligence

### Metriche e Statistiche
- **Appuntamenti**: Conteggio per periodo, stato, tipo
- **Utenti**: Crescita, attivazione, retention
- **Studi**: Performance, utilizzo servizi
- **Servizi**: Popolarità, revenue, durata media

### Reporting
- **Dashboard**: Metriche in tempo reale
- **Export**: Report in Excel, PDF, CSV
- **Scheduling**: Report automatici periodici

## 🔄 Business Logic di Workflow

### Flusso Appuntamenti
1. **Prenotazione**: Paziente seleziona servizio, data, ora
2. **Conferma**: Sistema verifica disponibilità e conferma
3. **Reminder**: Notifiche automatiche prima dell'appuntamento
4. **Esecuzione**: Medico marca appuntamento come in corso
5. **Completamento**: Appuntamento marcato come completato
6. **Follow-up**: Sistema programma eventuali controlli

### Gestione Emergenze
- **Priorità**: Appuntamenti di emergenza hanno priorità massima
- **Notifiche**: Alert immediati per personale medico
- **Rescheduling**: Riappuntamento automatico di appuntamenti spostati

## 📱 Business Logic di Notifiche

### Sistema di Notifiche
- **Email**: Conferme, reminder, aggiornamenti
- **SMS**: Reminder urgenti, conferme rapide
- **Push**: Notifiche in-app per aggiornamenti
- **In-app**: Messaggi e alert nel sistema

### Template e Personalizzazione
- **Lingue**: Italiano, Inglese, Tedesco
- **Studio-specific**: Personalizzazione per ogni studio
- **User-specific**: Preferenze di notifica per utente

## 🔧 Business Logic Tecnica

### Performance e Scalabilità
- **Caching**: Cache per dati geografici, configurazioni
- **Queue**: Elaborazione asincrona di notifiche e report
- **Database**: Ottimizzazioni per query complesse
- **API**: Rate limiting e throttling

### Integrazioni
- **Calendari**: FullCalendar per gestione appuntamenti
- **Mappe**: Integrazione servizi di geocoding
- **Pagamenti**: Gateway per pagamenti online
- **Telemedicina**: Video call e consultazioni remote

## 📈 Roadmap Business

### Fasi di Sviluppo
1. **Fase 1** (Completata): Core sistema, utenti, appuntamenti
2. **Fase 2** (In corso): Servizi avanzati, reporting
3. **Fase 3** (Pianificata): Telemedicina, integrazioni esterne
4. **Fase 4** (Futura): AI, machine learning, predizioni

### Priorità Business
1. **Stabilità**: Sistema robusto e affidabile
2. **Usabilità**: Interfaccia intuitiva per operatori sanitari
3. **Scalabilità**: Supporto per studi di diverse dimensioni
4. **Compliance**: Rispetto normative sanitarie e privacy

## 🔗 Collegamenti Documentazione

### Documentazione Moduli
- [SaluteOra](../Modules/SaluteOra/docs/README.md)
- [User](../Modules/User/docs/README.md)
- [Geo](../Modules/Geo/docs/README.md)
- [Media](../Modules/Media/docs/README.md)
- [UI](../Modules/UI/docs/README.md)
- [Xot](../Modules/Xot/docs/README.md)

### Documentazione Tecnica
- [Architettura](../laraxot-architecture-principles.md)
- [Testing](../testing-supreme-index.md)
- [PHPStan](../phpstan-critical-rule.md)
- [Factory e Seeder](../factory-best-practices.md)

---

**Ultimo aggiornamento**: Gennaio 2025
**Versione**: 2.0
**Autore**: AI Assistant
**Stato**: Consolidata e Rifattorizzata
